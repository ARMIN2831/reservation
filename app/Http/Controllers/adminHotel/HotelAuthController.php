<?php

namespace App\Http\Controllers\adminHotel;

use App\Http\Controllers\Controller;
use App\Models\HotelUser;
use App\Models\User;
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
        $user = User::where('username',$request->username)->where('type','hotel')->first();
        $hotelUser = HotelUser::where('user_id',$user->id)->first();
        if ($hotelUser) {
            if (Auth::guard('hotel')->attempt(['username' => $request->username, 'password' => $request->password, 'type' => 'hotel'])) {
                Auth::guard('hotel')->user();
                return redirect()->route('hotel.dashboard');
            }
        }
        return redirect()->route('hotel.login')->with('failed','نام کاربری یا رمز عبور اشتباه است!');
    }

    public function logout()
    {
        Auth::guard('hotel')->logout();
        return redirect()->route('hotel.login');
    }
}
