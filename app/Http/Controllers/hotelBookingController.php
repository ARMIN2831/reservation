<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Reserve;
use App\Models\Room;
use App\Models\RoomOption;
use Carbon\Carbon;
use Illuminate\Http\Request;

class hotelBookingController extends Controller
{
    public function index($id)
    {
        return view('user.hotelBooking.hotelBookingPage-'.$id);
    }



    public function results(Request $request)
    {
        // دریافت داده‌های ورودی
        $destination = $request->destination;
        $hotelId = $request->hotel_id;
        $roomsData = json_decode($request->rooms_data, true);
        $dates = explode(' تا ', $request->dates);
        $entryDate = Carbon::createFromFormat('Y/m/d', $dates[0]); // تبدیل تاریخ ورودی به شی Carbon
        $exitDate = Carbon::createFromFormat('Y/m/d', $dates[1]); // تبدیل تاریخ ورودی به شی Carbon

        // محاسبه تعداد روزها
        $numberOfDays = $entryDate->diffInDays($exitDate);

        // محاسبه تعداد کل نفرات
        $personCount = 0;
        foreach ($roomsData as $roomData) {
            $personCount += $roomData['persons'];
        }

        // شروع کوئری برای هتل‌ها
        $hotels = Hotel::query();

        // اگر hotel_id برابر با 0 باشد، جستجو بر اساس شهر انجام می‌شود
        if ($hotelId == 0) {
            $hotels->where('city', $destination);
        } else {
            $hotels->where('id', $hotelId);
        }


        $hotels = $hotels->pluck('id');
        $hotelIds = [];
        $totalPrices = [];

        $rooms = Room::whereIn('hotel_id',$hotels)->get()->groupBy('hotel_id');
        foreach ($rooms as $hotelId => $hotelRooms){
            $prices = [];
            foreach ($roomsData as $needCount){
                foreach ($hotelRooms as $room){
                    $count = $room->single + $room->double * 2;
                    if ($count < $needCount['persons']) continue;
                    $options = RoomOption::where('room_id',$room->id)->whereBetween('date', [$dates[0], $dates[1]])->get();
                    $reserves = Reserve::where('room_id',$room->id)->where(function($query) use ($dates) {
                        $query->where('entry_date', '<=', $dates[0])
                            ->where('exit_date', '>=', $dates[1]);
                    })->get();
                    $ch = false;
                    foreach ($options as $option) {
                        if (count($reserves) >= $option->capacity) {$ch = true; continue;}
                        if ($option->entry == 'بسته') {$ch = true; continue;}
                        if ($option->exit == 'بسته') {$ch = true; continue;}
                        if ($option->status == 'بسته') {$ch = true; continue;}
                    }
                    if ($ch) continue;
                    $p = 0;
                    foreach ($options as $option) $p += $numberOfDays * $option->bord;
                    $prices[$needCount['persons']][$room->id] = $p;
                }
            }

            if (count($prices) == count($roomsData)) {
                $hotelIds[] = $hotelId;
                $p = 0;
                foreach ($prices as $row){
                    $min = 9999999999999999999999999999999999999999;
                    foreach ($row as $roomPrice){
                        if ($min > $roomPrice) $min = $roomPrice;
                    }
                    $p += $min;
                }
                $totalPrices[$hotelId] = $p;
            }
        }
        $hotels = Hotel::whereIn('id',$hotelIds)->get();
        // ارسال نتایج به ویو
        return view('user.hotelBooking.hotelBookingPage-1', compact('hotels', 'personCount', 'numberOfDays','totalPrices'));
    }
}
