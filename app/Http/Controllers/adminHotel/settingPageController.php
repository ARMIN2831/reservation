<?php

namespace App\Http\Controllers\adminHotel;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\HotelUser;
use App\Models\People;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class settingPageController extends Controller
{
    public function index()
    {
        return view('adminHotel.settingPage');
    }


    public function updateHotelSetting(Request $request, $hotelId)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'mobile' => 'required',
            'star' => 'required',
            'email' => 'required',
            'website' => 'nullable',
            'description' => 'required',
            'logo' => 'nullable|file',
            'banner' => 'nullable|file',
        ]);
        $arr = [
            'title' => $validatedData['title'],
            'mobile' => $validatedData['mobile'],
            'star' => $validatedData['star'],
            'email' => $validatedData['email'],
            'website' => $validatedData['website'],
            'description' => $validatedData['description'],
        ];
        if ($request->logo) $arr ['logo'] = $this->uploadFile($validatedData['logo']);
        if ($request->banner) $arr ['banner'] = $this->uploadFile($validatedData['banner']);

        Hotel::where('id',$hotelId)->update($arr);
        return redirect()->route('hotel.mainPage');
    }


    public function updateHotelSettingPassword(Request $request, $hotelId)
    {
        $validatedData = $request->validate([
            'LastPassword' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = Auth::guard('hotel')->user();
        if (!Hash::check($validatedData['LastPassword'], $user->password)) {
            return redirect()->route('hotel.settingPage')->with(['error'=>'password is wrong']);
        }
        $user->update([
            'password' => Hash::make($validatedData['password']),
        ]);
        return redirect()->route('hotel.mainPage');
    }


    public function addUserAccess(Request $request, $hotelId)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|min:3|max:50',
            'email' => 'required|email|max:100',
            'firstName' => 'required|string|min:2|max:50',
            'lastName' => 'required|string|min:2|max:50',
            'role' => 'required',
        ]);
        $user = User::where('id',$request->userId)->first();
        if ($user){
            if (User::where('type', 'hotel')
                ->where('id', '!=', $request->userId)
                ->where(function($query) use ($validatedData) {
                    $query->where('username', $validatedData['username'])
                        ->orWhere('email', $validatedData['email']);
                })
                ->exists()) {
                return redirect()->route('hotel.settingPage')
                    ->with(['error' => 'The username or email has already been taken']);
            }
            if ($request->password){
                $validatedData['password'] = bcrypt($validatedData['password']);
            }
            People::where('id',$user->people_id)->update([
                'firstName' => $validatedData['firstName'],
                'lastName' => $validatedData['lastName']
            ]);
        }else{
            $people = People::create([
                'firstName' => $validatedData['firstName'],
                'lastName' => $validatedData['lastName']
            ]);
            $validatedData['password'] = bcrypt($request->password);
            $validatedData['people_id'] = $people->id;
        }
        $user = User::updateOrCreate(
            ['username' => $validatedData['username']],
            $validatedData
        );
        HotelUser::updateOrCreate(
            ['user_id' => $user->id, 'hotel_id' => $hotelId],
            ['user_id' => $user->id, 'hotel_id' => $hotelId, 'role' => $validatedData['role'],]
        );
        return redirect()->route('hotel.mainPage');
    }


    public function deleteUser($userId)
    {
        User::where('id',$userId)->delete();
        return redirect()->route('hotel.mainPage');
    }
}
