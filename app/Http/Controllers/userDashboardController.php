<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Models\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class userDashboardController extends Controller
{
    public function index(Request $request)
    {
        $reserves = Reserve::query()->where('user_id',Auth::guard('user')->user()->id);
        if ($request->code) $reserves->where('code',$request->code);
        if ($request->type) $reserves->where('type',$request->type);
        if ($request->entry_date) $reserves->where('entry_date',$request->entry_date);
        if ($request->exit_date) $reserves->where('exit_date',$request->exit_date);
        $reserves = $reserves->with('people.room')->get();
        return view('user.userDashboard',compact('reserves'));
    }


    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed|different:current_password',
            'new_password_confirmation' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        if (!Hash::check($request->current_password, Auth::guard('user')->user()->password)) {
            return back()->withErrors(['current_password' => 'رمز عبور فعلی نادرست است']);
        }
        Auth::guard('user')->user()->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->back()->with('status', 'رمز عبور با موفقیت تغییر یافت');
    }


    public function showProfile()
    {
        $user = Auth::guard('user')->user();

        return response()->json([
            'firstName' => $user->firstName,
            'lastName' => $user->lastName,
            'mobile' => $user->mobile,
            'email' => $user->email,
            'birth' => $user->birth,
            'nationalCode' => $user->nationalCode,
        ]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::guard('user')->user();

        $request->validate([
            'firstName' => 'nullable|string|max:255',
            'lastName' => 'nullable|string|max:255',
            'mobile' => 'nullable|string|max:11',
            'email' => 'nullable|email|unique:users,email,'.$user->id,
            'birth' => 'nullable|date',
            'nationalCode' => 'nullable|string|max:10|unique:people,nationalCode,'.$user->people_id,
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $filePath = $user->image;
        if ($request->hasFile('avatar')) {
            $filePath = $this->uploadFile($request->file('avatar'));
        }
        People::where('id',$user->people_id)->update([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'nationalCode' => $request->nationalCode,
            'birth' => $request->birth,
        ]);
        $user->update([
            'mobile' => $request->mobile,
            'email' => $request->email,
            'image' => $filePath,
        ]);



        return response()->json(['message' => 'Profile updated successfully']);
    }
}
