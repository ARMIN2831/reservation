<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Gateway;
use App\Models\Hotel;
use App\Models\PeopleReserve;
use App\Models\Reserve;
use App\Models\Room;
use App\Models\RoomOption;
use Carbon\Carbon;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\Jalalian;

class hotelBookingController extends Controller
{
    public function index($id)
    {
        return view('user.hotelBooking.hotelBookingPage-'.$id);
    }



    public function results(Request $request)
    {
        //dd($request->input());
        // دریافت داده‌های ورودی
        $destination = $request->destination;
        $hotelId = $request->hotel_id;

        $roomsData = [];

        if ($request->rooms_data) $roomsData = json_decode($request->rooms_data, true);

        $numberOfDays = 0;
        if ($request->dates){
            $dates = explode(' تا ', $request->dates);
            $entryDate = Carbon::createFromFormat('Y/m/d', $dates[0]); // تبدیل تاریخ ورودی به شی Carbon
            $exitDate = Carbon::createFromFormat('Y/m/d', $dates[1]); // تبدیل تاریخ ورودی به شی Carbon
            // محاسبه تعداد روزها
            $numberOfDays = $entryDate->diffInDays($exitDate)+1;
        }



        // محاسبه تعداد کل نفرات
        $personCount = 0;
        foreach ($roomsData as $roomData) {
            $personCount += $roomData['persons'];
        }

        // شروع کوئری برای هتل‌ها
        $hotels = Hotel::query();

        // اگر hotel_id برابر با 0 باشد، جستجو بر اساس شهر انجام می‌شود
        if ($destination or $hotelId) {
            if ($hotelId == 0) {
                $hotels->where('city', $destination);
            } else {
                $hotels->where('id', $hotelId);
                $q = request()->query();$q['hotelId'] = $hotelId;
                return redirect()->route('hotelBooking.showDescription',$q);
            }
        }
        $stars = [];
        if ($request->hotelStar){
            foreach ($request->hotelStar as $star){
                if ($star == 5) $stars [] = 5;
                if ($star == 4) $stars [] = 4;
                if ($star == 3) {
                    $stars [] = 3;
                    $stars [] = 2;
                    $stars [] = 1;
                    $stars [] = 0;
                }
            }
            $hotels->whereIn('star',$stars);
        }

        if ($request->facilities){
            $facilities = $request->facilities;
            $hotels->whereHas('facilities', function ($query) use ($facilities) {
                $query->whereIn('facility_id', $facilities)->where('status', 1);
            }, '=', count($facilities));
        }


        $hotels = $hotels->pluck('id');
        $totalPrices = [];
        $totalRooms = [];

        $rooms = Room::whereIn('hotel_id',$hotels)->where('status','تایید شده')->get()->groupBy('hotel_id');
        if ($request->rooms_data and $request->dates){
            foreach ($rooms as $hotelId => $hotelRooms){
                $prices = [];
                foreach ($roomsData as $needCount){
                    foreach ($hotelRooms as $room){
                        $count = $room->single + $room->double * 2;
                        if ($count < $needCount['persons']) continue;
                        $options = RoomOption::where('room_id',$room->id)->whereBetween('date', [$dates[0], $dates[1]])->get();
                        if (count($options) < $numberOfDays) continue;
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
                    $p = 0;
                    foreach ($prices as $row){
                        $min = 9999999999999999999999999999999999999999;
                        foreach ($row as $roomPrice){
                            if ($min > $roomPrice) $min = $roomPrice;
                        }
                        $p += $min;
                    }
                    $totalPrices[$hotelId] = $p;
                    $totalRooms[$hotelId] = $prices;
                }
            }
        }
        $totalPrices [2] = 100;
        $sorting = $request->sorting;
        if ($sorting){
            if ($sorting == 'minPrice') asort($totalPrices);
            if ($sorting == 'maxPrice') arsort($totalPrices);
        }
        $minRange = $request->minRange;
        $maxRange = $request->maxRange;
        if ($minRange and $maxRange){
            foreach ($totalPrices as $key => $row){
                if ($row > $maxRange or $row < $minRange) unset($totalPrices[$key]);
            }
        }

        $hotels = Hotel::whereIn('id',array_keys($totalPrices))->get();
        $facilities = Facility::whereIn('type',[1,2])->get();
        // ارسال نتایج به ویو
        return view('user.hotelBooking.hotelBookingPage-1', compact('hotels', 'personCount', 'numberOfDays','totalPrices','totalRooms','facilities'));
    }

    public function showDescription(Request $request)
    {
        $hotel = Hotel::where('id', $request->hotelId)->with('facilities', 'comments', 'files')->first();

        $roomsData = [];
        if ($request->rooms_data) {
            $roomsData = json_decode($request->rooms_data, true);
        }

        $numberOfDays = 0;
        $dates = [];
        if ($request->dates) {
            $dates = explode(' تا ', $request->dates);
            $entryDate = Carbon::createFromFormat('Y/m/d', $dates[0]);
            $exitDate = Carbon::createFromFormat('Y/m/d', $dates[1]);
            $numberOfDays = $entryDate->diffInDays($exitDate) + 1;
        }

        $rooms = Room::where('hotel_id', $hotel->id)->where('status', 'تایید شده')->get();

        $availableRoomsForNeeds = [];
        $roomPrices = [];

        $results = [];
        if ($request->rooms_data && $request->dates) {
            // Step 1: Find all suitable rooms for each need
            foreach ($roomsData as $need) {
                $availableRoomsForNeeds[$need['persons']] = [];

                foreach ($rooms as $room) {
                    $count = $room->single + $room->double * 2;
                    if ($count < $need['persons']) continue;

                    $options = RoomOption::where('room_id', $room->id)
                        ->whereBetween('date', [$dates[0], $dates[1]])
                        ->get();

                    if (count($options) < $numberOfDays) continue;

                    $reserves = Reserve::where('room_id', $room->id)
                        ->where(function ($query) use ($dates) {
                            $query->where('entry_date', '<=', $dates[0])
                                ->where('exit_date', '>=', $dates[1]);
                        })->get();

                    $isAvailable = true;
                    foreach ($options as $option) {
                        if (count($reserves) >= $option->capacity) {
                            $isAvailable = false;
                            break;
                        }
                        if ($option->entry == 'بسته' || $option->exit == 'بسته' || $option->status == 'بسته') {
                            $isAvailable = false;
                            break;
                        }
                    }

                    if (!$isAvailable) continue;

                    // Calculate total price for this room for the period
                    $totalPrice = 0;
                    foreach ($options as $option) {
                        $totalPrice += $numberOfDays * $option->bord;
                    }
                    $room->price = $totalPrice;
                    $availableRoomsForNeeds[$need['persons']][$room->id] = $room;

                    $roomPrices[$room->id] = $totalPrice;
                }
            }
            // Step 2: Generate all possible combinations
            $combinations = [];
            $needs = array_column($roomsData, 'persons');

            // This function will generate all possible combinations recursively
            function generateCombinations($availableRoomsForNeeds, $needs, $current = [], $index = 0, &$result = [])
            {
                if ($index == count($needs)) {
                    $result[] = $current;
                    return;
                }

                $currentNeed = $needs[$index];
                foreach ($availableRoomsForNeeds[$currentNeed] as $roomId => $roomData) {
                    $newCurrent = $current;
                    $newCurrent[$currentNeed] = $roomData;
                    generateCombinations($availableRoomsForNeeds, $needs, $newCurrent, $index + 1, $result);
                }
            }
            generateCombinations($availableRoomsForNeeds, $needs, [], 0, $combinations);
            //step 3:remove combinations
            $saver = [];
            foreach ($combinations as $key => $combination){
                $equal = false;
                $ch = true;
                $arr = [];

                $totalPrice = 0;
                $roomsInCombination = [];
                foreach ($combination as $needCount => $roomData) {
                    $totalPrice += $roomData->price;
                    $roomsInCombination[$needCount] = [
                        'room_info' => $roomData,
                        'price_for_period' => $roomData->price,
                    ];
                    $arr[] = $roomData->id;
                } // make this combination array
                foreach ($saver as $row) if ($this->areArraysEqualOptimized($row,$arr)) $equal = true; //check equal array
                if (!$equal) {
                    $requireCountIds = array_count_values($arr);
                    foreach ($requireCountIds as $roomId => $requireCountId){
                        if (!$this->isRoomAvailableForDates($roomId,$dates,$requireCountId)) $ch = false;
                    }
                    if ($ch) {
                        $saver[$key] = $arr;
                        $results[] = [
                            'rooms' => $roomsInCombination,
                            'total_price' => $totalPrice
                        ];
                    }
                }
            }
        }
        // Now $results contains all possible combinations with their total prices
        return view('user.hotelBooking.hotelBookingPage-2',compact('hotel','results','numberOfDays'));
    }

    protected function areArraysEqualOptimized($a, $b) {
        if (count($a) !== count($b)) {
            return false;
        }

        $countValues = function($array) {
            $result = [];
            foreach ($array as $value) {
                $result[$value] = ($result[$value] ?? 0) + 1;
            }
            return $result;
        };

        return $countValues($a) == $countValues($b);
    }

    protected function isRoomAvailableForDates($roomId, $dates, $requiredCount)
    {
        $entryDate = $dates[0];
        $exitDate = $dates[1];

        // Get all options for this room in date range
        $options = RoomOption::where('room_id', $roomId)
            ->whereBetween('date', [$entryDate, $exitDate])
            ->get();

        // Get all reserves for this room in date range
        $reservedCount = Reserve::where('room_id', $roomId)
            ->where(function($query) use ($entryDate, $exitDate) {
                $query->where('entry_date', '<=', $exitDate)
                    ->where('exit_date', '>=', $entryDate);
            })->count();

        // Check each day's availability
        foreach ($options as $option) {
            $available = $option->capacity - $reservedCount;
            if ($available < $requiredCount) {
                return false;
            }

            // Also check if room is not blocked
            if ($option->entry == 'بسته' || $option->exit == 'بسته' || $option->status == 'بسته') {
                return false;
            }
        }

        return true;
    }

    public function choosePeople(Request $request)
    {
        $numberOfDays = 0;
        $dates = [];
        if ($request->dates) {
            $dates = explode(' تا ', $request->dates);
            $entryDate = Carbon::createFromFormat('Y/m/d', $dates[0]);
            $exitDate = Carbon::createFromFormat('Y/m/d', $dates[1]);
            $numberOfDays = $entryDate->diffInDays($exitDate) + 1;
        }


        $rooms = [];
        $totalPrice = 0;
        foreach ($request->rooms as $needCount => $roomId){
            $room = Room::where('id',$roomId)->first();
            $room->needCount = $needCount;
            $rooms[] = $room;

            $options = RoomOption::where('room_id', $room->id)
                ->whereBetween('date', [$dates[0], $dates[1]])
                ->get();
            foreach ($options as $option) $totalPrice += $numberOfDays * $option->bord;
        }
        $hotel = Hotel::where('id', $request->hotelId)->with('facilities')->first();
        return view('user.hotelBooking.hotelBookingPage-3',compact('rooms','hotel','dates','totalPrice'));
    }

    public function showPeople(Request $request)
    {
        $numberOfDays = 0;
        $dates = [];
        if ($request->dates) {
            $dates = explode(' تا ', $request->dates);
            $entryDate = Carbon::createFromFormat('Y/m/d', $dates[0]);
            $exitDate = Carbon::createFromFormat('Y/m/d', $dates[1]);
            $numberOfDays = $entryDate->diffInDays($exitDate) + 1;
        }


        $rooms = [];
        $totalPrice = 0;
        $peoples = $request->peoples;
        foreach ($request->rooms as $needCount => $roomId){
            $room = Room::where('id',$roomId)->first();
            $room->needCount = $needCount;
            $rooms[] = $room;
            foreach ($peoples as $key => $peopleRoom)
                foreach ($peopleRoom as $key2 => $people)
                    if ($room->id == $people['room_id']) $peoples[$key][$key2]['title'] = $room->title;



            $options = RoomOption::where('room_id', $room->id)
                ->whereBetween('date', [$dates[0], $dates[1]])
                ->get();
            foreach ($options as $option) $totalPrice += $numberOfDays * $option->bord;
        }
        $request->merge(['peoples' => $peoples]);
        $hotel = Hotel::where('id', $request->hotelId)->with('facilities')->first();
        return view('user.hotelBooking.hotelBookingPage-4',compact('rooms','hotel','dates','totalPrice'));
    }


    public function selectPricing(Request $request)
    {
        $numberOfDays = 0;
        $dates = [];
        if ($request->dates) {
            $dates = explode(' تا ', $request->dates);
            $entryDate = Carbon::createFromFormat('Y/m/d', $dates[0]);
            $exitDate = Carbon::createFromFormat('Y/m/d', $dates[1]);
            $numberOfDays = $entryDate->diffInDays($exitDate) + 1;
        }
        $totalPrice = 0;
        foreach ($request->rooms as $needCount => $roomId){
            $room = Room::where('id',$roomId)->first();
            $room->needCount = $needCount;

            $options = RoomOption::where('room_id', $room->id)
                ->whereBetween('date', [$dates[0], $dates[1]])
                ->get();
            foreach ($options as $option) $totalPrice += $numberOfDays * $option->bord;
        }
        $gateways = Gateway::get();
        return view('user.hotelBooking.hotelBookingPage-5',compact('gateways','totalPrice'));
    }


    public function reserveHotel(Request $request)
    {
        $numberOfDays = 0;
        $dates = [];
        if ($request->dates) {
            $dates = explode(' تا ', $request->dates);
            $entryDate = Carbon::createFromFormat('Y/m/d', $dates[0]);
            $exitDate = Carbon::createFromFormat('Y/m/d', $dates[1]);
            $numberOfDays = $entryDate->diffInDays($exitDate) + 1;
        }
        $totalPrice = 0;
        foreach ($request->rooms as $needCount => $roomId){
            $room = Room::where('id',$roomId)->first();
            $room->needCount = $needCount;

            $options = RoomOption::where('room_id', $room->id)
                ->whereBetween('date', [$dates[0], $dates[1]])
                ->get();
            foreach ($options as $option) $totalPrice += $numberOfDays * $option->bord;
        }

        $response = zarinpal()
            ->merchantId(Gateway::where('id',$request->pmo)->first()->api)
            ->amount($totalPrice)
            ->request()
            ->description("reserve Hotel")
            ->callbackUrl(route('hotelBooking.paymentRedirect'))
            ->send();

        if (!$response->success()) {
            return $response->error()->message();
        }
        $reserve = Reserve::create([
            'entry_date' => $dates[0],
            'exit_date' => $dates[1],
            'paymentStatus' => 'درحال انجام',
            'paymentCode' => $response->authority(),
            'price' => $totalPrice,
            'model_type' => 'App\Models\Hotel',
            'model_id' => $request->hotelId,
            'type' => 'hotel',
            'date' => Jalalian::now()->format('Y-m-d'),
            'user_id' => Auth::guard('user')->user()->id,
        ]);
        foreach ($request->peoples as $key => $peopleRoom) {
            $peopleRoom = unserialize($peopleRoom);
            foreach ($peopleRoom as $key2 => $people){
                PeopleReserve::create([
                    'reserve_id' => $reserve->id,
                    'sex' => @$people['sex'],
                    'firstName' => @$people['firstName'],
                    'lastName' => @$people['lastName'],
                    'nationalCode' => @$people['nationalCode'],
                    'mobile' => @$people['mobile'],
                ]);
            }
        }
        return $response->redirect();
    }


    public function paymentRedirect(Request $request)
    {
        $authority = $request->query('Authority');
        $status = $request->query('Status');
        if ($status != 'OK') {
            return redirect()->route('wallet')->with(['failed' => "پرداخت توسط کاربر لغو شد."]);
        }
        dd($authority,$status);
        /*$order = Order::where('code', $authority)->firstOrFail();
        $response = zarinpal()
            ->merchantId(Gateway::where('id',1)->first()->api)
            ->amount($order->price)
            ->verification()
            ->authority($authority)
            ->send();
        if ($response->success()) {
            $order->update([
                'status' => 'پرداخت شده',
                'card' => $response->cardPan(),
                'ref_id' => $response->referenceId(),
            ]);
            User::where('id',auth()->user()->id)->update(['wallet' => auth()->user()->wallet + $order->price]);
            return redirect()->route('wallet')->with(['message' => "پرداخت با موفقیت انجام شد. شماره تراکنش: " . $response->referenceId()]);
        } else {
            $order->update([
                'status' => 'ناموفق',
            ]);
            return redirect()->route('wallet')->with(['failed' => "پرداخت ناموفق بود: " . $response->error()->message()]);
        }*/
    }

/*
    public function payment(Request $request)
    {
        $response = zarinpal()
            ->merchantId($this->loadSetting(['zarin_api'])['zarin_api'][0])
            ->amount($request->price)
            ->request()
            ->description("charge wallet")
            ->callbackUrl(route('paymentRedirect'))
            ->send();

        if (!$response->success()) {
            return $response->error()->message();
        }
        Order::create([
            'user_id' => auth()->user()->id,
            'price' => $request->price,
            'status' => 'درحال انجام',
            'code' => $response->authority(),
            'date' => Jalalian::now()->format('Y-m-d'),
        ]);
        return $response->redirect();
    }


    public function paymentRedirect(Request $request)
    {
        $authority = $request->query('Authority');
        $status = $request->query('Status');
        if ($status != 'OK') {
            return redirect()->route('wallet')->with(['failed' => "پرداخت توسط کاربر لغو شد."]);
        }
        $order = Order::where('code', $authority)->firstOrFail();
        $response = zarinpal()
            ->merchantId($this->loadSetting(['zarin_api'])['zarin_api'][0])
            ->amount($order->price)
            ->verification()
            ->authority($authority)
            ->send();

        if ($response->success()) {
            $order->update([
                'status' => 'پرداخت شده',
                'card' => $response->cardPan(),
                'ref_id' => $response->referenceId(),
            ]);
            User::where('id',auth()->user()->id)->update(['wallet' => auth()->user()->wallet + $order->price]);
            return redirect()->route('wallet')->with(['message' => "پرداخت با موفقیت انجام شد. شماره تراکنش: " . $response->referenceId()]);
        } else {
            $order->update([
                'status' => 'ناموفق',
            ]);
            return redirect()->route('wallet')->with(['failed' => "پرداخت ناموفق بود: " . $response->error()->message()]);
        }
    }*/
}
