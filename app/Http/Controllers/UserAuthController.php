<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Builder\Property;

class UserAuthController extends Controller
{
    public function login()
    {
        return view('user.auth.login');
    }

    public function doLogin(Request $request)
    {
        if (Auth::attempt(['mobile' => $request->mobile, 'password' => $request->password, 'type' => 'user'])) {
            Auth::user();
            return response()->json(['success' => 'success'],200);
        } else return response()->json(['message' => 'موبایل یا رمز عبور اشتباه است!'],429);
    }

    public function doRegister(Request $request)
    {
        if (!$request->firstName or !$request->lastName) return response()->json(['message' => 'نام و نام خانوادگی خود را وارد کنید!'],429);
        if (!$request->mobile) return response()->json(['message' => 'شماره موبایل خود را وارد کنید!'],429);
        if (!$request->nationalCode) return response()->json(['message' => 'کدملی خود را وارد کنید!'],429);
        if (User::where('type','user')->where('mobile',$request->mobile)->first()) return response()->json(['message' => 'شماره موبایل قبلا ثبت شده است.'],429);
        if ($request->password != $request->confirm) return response()->json(['message' => 'پسورد با تایید پسورد یکسان نیست!'],429);

        $people = People::firstOrCreate(
            ['nationalCode' => $request->nationalCode],
            [
                'nationalCode' => $request->nationalCode,
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
            ]
        );
        User::create([
            'people_id' => $people->id,
            'mobile' => $request->mobile,
            'password' => bcrypt($request->password),
            'type' => 'user',
        ]);
        Auth::attempt(['mobile' => $request->mobile, 'password' => $request->password, 'type' => 'user']);
        Auth::user();
        return response()->json(['success' => 'success'],200);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

