<?php

namespace App\Http\Controllers\adminHotel;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\RoomOption;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class pricingANDcapacitiesController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->input('date') ? Carbon::parse($request->input('date')) : Carbon::now();
        $jalaliDate = Jalalian::fromCarbon($date);
        $firstDay = $jalaliDate->getFirstDayOfMonth();
        $lastDay = $jalaliDate->getEndDayOfMonth();
        $daysOfMonth = [];
        $currentDay = $firstDay;
        while ($currentDay->toCarbon()->lessThanOrEqualTo($lastDay->toCarbon())) {
            $daysOfMonth[] = $currentDay->format('Y/m/d');
            $currentDay = $currentDay->addDays(1);
        }

        $user = auth()->user();
        $hotel = Hotel::whereHas('users', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->first();

        $options = RoomOption::whereHas('room', function ($query) use ($hotel) {
            $query->where('hotel_id', $hotel->id);
        })->where('date', '>=', $firstDay->format('Y/m/d'))->where('date', '<=', $lastDay->format('Y/m/d'))->get();

        // دریافت تمام اتاق‌های هتل
        $rooms = Room::where('hotel_id', $hotel->id)->get();

        // سازماندهی داده‌ها برای نمایش در فرانت‌اند
        $organizedData = [];
        foreach ($options as $option) {
            $dateData = [
                'option' => $option,
                'rooms' => []
            ];
            if (isset($organizedData[$option->date])){
                $dateData['rooms'] = $organizedData[$option->date]['rooms'];
            }
            foreach ($rooms as $room) {
                $o = RoomOption::where('room_id', $room->id)
                    ->where('date', $option->date)
                    ->first();
                $dateData['rooms'][$room->id] = $o ? $o : null;
            }
            $organizedData[$option->date] = $dateData;
        }
        ksort($organizedData);
        return view('adminHotel.pricingANDcapacities', [
            'currentDate' => $date,
            'options' => $organizedData,
        ]);
    }



    public function setPrice(Request $request)
    {
        $targetDays = [];
        if ($request->zero) $targetDays[] = 6;
        if ($request->one) $targetDays[] = 0;
        if ($request->two) $targetDays[] = 1;
        if ($request->three) $targetDays[] = 2;
        if ($request->four) $targetDays[] = 3;
        if ($request->five) $targetDays[] = 4;
        if ($request->six) $targetDays[] = 5;
        $filteredDates = [];
        if ($request->entry and $request->exit){
            try {
                $startDate = Jalalian::fromFormat('Y/m/d', $request->entry)->toCarbon();
                $endDate = Jalalian::fromFormat('Y/m/d', $request->exit)->toCarbon();
                while ($startDate->lte($endDate)) {
                    if (in_array($startDate->dayOfWeek, $targetDays)) {
                        $filteredDates[] = Jalalian::fromCarbon($startDate)->format('Y/m/d');
                    }
                    $startDate->addDay();
                }
            }catch (Exception $e){}
        }
        $rooms = [];
        if ($request->room_id) $rooms[] = $request->room_id;

        if ($request->selected_option) $filteredDates = array_unique(array_merge($filteredDates,explode(',',$request->selected_option)));
        if ($request->selected_room) $rooms = array_unique(array_merge($rooms,explode(',',$request->selected_room)));

        foreach ($filteredDates as $date) {
            foreach ($rooms as $roomId) {
                print_r([$date,$roomId]);
                $room = RoomOption::updateOrCreate(
                    ['date' => $date, 'room_id' => $roomId],
                    [
                        'room_id' => $roomId,
                        'date' => $date,
                        'bord' => $request->bord,
                        'ajax' => $request->ajax,
                    ]
                );
            }
        }
        return redirect()->route('hotel.pricingANDcapacities');
    }


    public function removePricing(Request $request)
    {
        $optionIds = explode(',',$request->selected_option);
        $roomIds = explode(',',$request->selected_room);
        if ($request->selected_option){
            RoomOption::whereIn('id',$optionIds)->update([
                'bord' => null,
                'ajax' => null,
            ]);
        }
        if ($request->selected_room){
            RoomOption::whereIn('room_id',$roomIds)->update([
                'bord' => null,
                'ajax' => null,
            ]);
        }
        return redirect()->route('hotel.pricingANDcapacities');
    }



    public function setCapacity(Request $request)
    {
        $targetDays = [];
        if ($request->zero) $targetDays[] = 6;
        if ($request->one) $targetDays[] = 0;
        if ($request->two) $targetDays[] = 1;
        if ($request->three) $targetDays[] = 2;
        if ($request->four) $targetDays[] = 3;
        if ($request->five) $targetDays[] = 4;
        if ($request->six) $targetDays[] = 5;
        $filteredDates = [];
        if ($request->entry and $request->exit){
            try {
                $startDate = Jalalian::fromFormat('Y/m/d', $request->entry)->toCarbon();
                $endDate = Jalalian::fromFormat('Y/m/d', $request->exit)->toCarbon();
                while ($startDate->lte($endDate)) {
                    if (in_array($startDate->dayOfWeek, $targetDays)) {
                        $filteredDates[] = Jalalian::fromCarbon($startDate)->format('Y/m/d');
                    }
                    $startDate->addDay();
                }
            }catch (Exception $e){}
        }
        $rooms = [];
        if ($request->room_id) $rooms[] = $request->room_id;

        if ($request->selected_option) $filteredDates = array_unique(array_merge($filteredDates,explode(',',$request->selected_option)));
        if ($request->selected_room) $rooms = array_unique(array_merge($rooms,explode(',',$request->selected_room)));

        foreach ($filteredDates as $date) {
            foreach ($rooms as $roomId) {
                $room = RoomOption::updateOrCreate(
                    ['date' => $date, 'room_id' => $roomId],
                    [
                        'room_id' => $roomId,
                        'date' => $date,
                        'capacity' => $request->capacity,
                    ]
                );
            }
        }
        return redirect()->route('hotel.pricingANDcapacities');
    }


    public function removeCapacity(Request $request)
    {
        $optionIds = explode(',',$request->selected_option);
        $roomIds = explode(',',$request->selected_room);
        if ($request->selected_option){
            RoomOption::whereIn('id',$optionIds)->update([
                'capacity' => null,
            ]);
        }
        if ($request->selected_room){
            RoomOption::whereIn('room_id',$roomIds)->update([
                'capacity' => null,
            ]);
        }
        return redirect()->route('hotel.pricingANDcapacities');
    }



    public function setLimit(Request $request)
    {
        $targetDays = [];
        if ($request->zero) $targetDays[] = 6;
        if ($request->one) $targetDays[] = 0;
        if ($request->two) $targetDays[] = 1;
        if ($request->three) $targetDays[] = 2;
        if ($request->four) $targetDays[] = 3;
        if ($request->five) $targetDays[] = 4;
        if ($request->six) $targetDays[] = 5;
        $filteredDates = [];
        if ($request->entry and $request->exit){
            try {
                $startDate = Jalalian::fromFormat('Y/m/d', $request->entry)->toCarbon();
                $endDate = Jalalian::fromFormat('Y/m/d', $request->exit)->toCarbon();
                while ($startDate->lte($endDate)) {
                    if (in_array($startDate->dayOfWeek, $targetDays)) {
                        $filteredDates[] = Jalalian::fromCarbon($startDate)->format('Y/m/d');
                    }
                    $startDate->addDay();
                }
            }catch (Exception $e){}
        }
        foreach ($filteredDates as $date) {
            foreach ($request->room as $roomId => $room) {
                $room = RoomOption::updateOrCreate(
                    ['date' => $date, 'room_id' => $roomId],
                    [
                        'min' => $room['min'],
                        'max' => $room['max'],
                        'entry' => $room['entry'],
                        'exit' => $room['exit'],
                        'status' => $room['status'],
                    ]
                );
            }
        }
        return redirect()->route('hotel.pricingANDcapacities');
    }
}
