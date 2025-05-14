<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function doLogin(Request $request)
    {
        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password, 'type' => 'admin'])) {
            Auth::guard('admin')->user();
            return redirect()->route('admin.dashboard');
        } else if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password, 'type' => 'agency'])) {
            Auth::guard('admin')->user();
            return redirect()->route('admin.dashboard');
        } else return redirect()->route('admin.login')->with('failed','نام کاربری یا رمز عبور اشتباه است!');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
