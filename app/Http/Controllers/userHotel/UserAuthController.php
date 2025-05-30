<?php

namespace App\Http\Controllers\adminHotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelAuthController extends Controller
{
    public function login()
    {
        return view('adminHotel.auth.login');
    }

    public function doLogin(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            Auth::user();
            return redirect()->route('hotel.dashboard');
        } else return redirect()->route('hotel.login')->with('failed','نام کاربری یا رمز عبور اشتباه است!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('hotel.login');
    }
}
