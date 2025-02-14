<?php

namespace App\Http\Controllers\adminHotel;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\HotelUser;
use App\Models\User;
use Illuminate\Http\Request;
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
        if ($request->logo) $arr ['logo'] = $validatedData['logo']->store('uploads', 'public');
        if ($request->banner) $arr ['banner'] = $validatedData['banner']->store('uploads', 'public');

        Hotel::where('id',$hotelId)->update($arr);
        return redirect()->route('hotel.settingPage');
    }


    public function updateHotelSettingPassword(Request $request, $hotelId)
    {
        $validatedData = $request->validate([
            'LastPassword' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $hotel = Hotel::find($hotelId);
        if (!Hash::check($validatedData['LastPassword'], $hotel->password)) {
            return redirect()->route('hotel.settingPage')->with(['error'=>'password is wrong']);
        }
        $hotel->update([
            'password' => Hash::make($validatedData['password']),
        ]);
        return redirect()->route('hotel.settingPage');
    }


    public function addUserAccess(Request $request, $hotelId)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|min:3|max:50|unique:users,username',
            'email' => 'required|email|max:100|unique:users,email',
            'firstName' => 'required|string|min:2|max:50',
            'lastName' => 'required|string|min:2|max:50',
            'password' => 'required|string|min:8',
            'role' => 'required',
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        $user = User::createOrUpdate(
            ['username' => $validatedData['username']],
            $validatedData
        );
        HotelUser::createOrUpdate(
            ['user_id' => $user->id, 'hotel_id' => $hotelId],
            ['user_id' => $user->id, 'hotel_id' => $hotelId, 'role' => $validatedData['role'],]
        );
        return redirect()->route('hotel.settingPage');
    }


    public function deleteUser($userId)
    {
        User::where('id',$userId)->delete();
        return redirect()->route('hotel.settingPage');
    }
}
