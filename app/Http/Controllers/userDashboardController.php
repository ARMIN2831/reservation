<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class userDashboardController extends Controller
{
    public function index()
    {
        return view('user.userDashboard');
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
