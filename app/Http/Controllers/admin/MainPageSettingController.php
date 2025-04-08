<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\MainPageSetting;
use Illuminate\Http\Request;

class MainPageSettingController extends Controller
{
    public function mainPageSettings()
    {
        $hotels = Hotel::get();
        $selectedHotelsOne = MainPageSetting::where('type',0)->pluck('hotel_id')->toArray();
        $selectedHotelsTwo = MainPageSetting::where('type',1)->pluck('hotel_id')->toArray();
        return view('admin.mainPageSettings.index',compact('hotels','selectedHotelsOne','selectedHotelsTwo'));
    }


    public function updatePageSettings(Request $request)
    {
        MainPageSetting::whereIn('type',[0,1])->delete();
        if (!empty($request->hotels)) {
            foreach ($request->hotels['one'] as $hotelId) {
                MainPageSetting::create([
                    'hotel_id' => $hotelId,
                    'type' => 0,
                ]);
            }
            foreach ($request->hotels['two'] as $hotelId) {
                MainPageSetting::create([
                    'hotel_id' => $hotelId,
                    'type' => 1,
                ]);
            }
        }
        return redirect()->route('admin.mainPageSettings');
    }
}
