<?php

namespace App\Http\Controllers;

use App\Models\AgencyUser;
use App\Models\People;
use App\Models\SmsNotification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Kavenegar\KavenegarApi;
use PhpParser\Builder\Property;

class UserAuthController extends Controller
{
    public function login()
    {
        return view('user.auth.login');
    }


    public function sendOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required|regex:/^09\d{9}$/'
        ]);
        $user = User::firstOrCreate(
            ['mobile' => $request->mobile, 'type' => 'user'],
            ['mobile' => $request->mobile, 'type' => 'user']
        );
        // بررسی وجود کد فعال برای این کاربر
        $existingOtp = SmsNotification::where('user_id', $user->id)
            ->where('type', 'otp')
            ->where('expires_at', '>', Carbon::now())
            ->first();

        if ($existingOtp) {
            $remainingTime = Carbon::now()->diffInSeconds($existingOtp->expires_at);
            return response()->json([
                'success' => true,
                'message' => 'کد تایید قبلی هنوز معتبر است',
                'remaining_time' => round($remainingTime)
            ], 429);
        }

        $otpCode = rand(10000, 99999);
        SmsNotification::updateOrCreate(
            ['user_id' => $user->id,'type' => 'otp'],
            [
                'message' => $otpCode,
                'type' => 'otp',
                'user_id' => $user->id,
                'status' => 0,
                'expires_at' => Carbon::now()->addMinutes(2),
            ]
        );

        /*$sender = "2000660110";
        $receptor = $request->mobile;
        $message = "وب سرویس پیام کوتاه کاوه نگار";
        $api = new KavenegarApi("31677968536844656F526C5278476E6D49502F62706D3134744363752F3573766C6C5238444232687431383D");
        $api -> Send ($sender,$receptor,$message);*/

        return response()->json([
            'success' => true,
            'message' => 'کد تایید ارسال شد',
            'expires_in' => 120 // زمان انقضا به ثانیه
        ]);
    }

    // تایید کد OTP
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required|regex:/^09\d{9}$/',
            'otp' => 'required|digits:5',
        ]);

        $user = User::where('mobile',$request->mobile)->where('type','user')->firstOrFail();

        $otpRecord = SmsNotification::where('user_id', $user->id)->where('type','otp')->first();

        if (!$otpRecord) {
            return response()->json([
                'success' => false,
                'message' => 'کد تایید برای این شماره یافت نشد'
            ], 404);
        }

        // بررسی انقضا
        if (Carbon::now()->gt($otpRecord->expires_at)) {
            return response()->json([
                'success' => false,
                'message' => 'کد تایید منقضی شده است',
                'error' => 'expired'
            ], 400);
        }

        // بررسی صحت کد
        if ($request->otp != $otpRecord->message) {

            return response()->json([
                'success' => false,
                'message' => 'کد تایید نامعتبر است',
                'error' => 'invalid',
            ], 400);
        }

        $otpRecord->delete();
        Auth::guard('user')->login($user);

        return response()->json([
            'success' => true,
            'message' => 'ورود با موفقیت انجام شد',
            'redirect' => false,
        ]);
    }


    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect()->route('login');
    }
}

