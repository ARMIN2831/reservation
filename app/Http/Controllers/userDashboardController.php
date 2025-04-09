<?php

namespace App\Http\Controllers;

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
}
