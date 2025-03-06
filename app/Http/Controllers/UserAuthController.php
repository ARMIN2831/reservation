<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function login()
    {
        return view('user.auth.login');
    }

    public function doLogin(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'type' => 'user'])) {
            Auth::user();
            return redirect()->route('userDashboard.index');
        } else return redirect()->route('login')->with('failed','نام کاربری یا رمز عبور اشتباه است!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

