<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Gateway;
use App\Models\Hotel;
use App\Models\HotelUser;
use App\Models\Message;
use App\Models\PeopleReserve;
use App\Models\Reserve;
use App\Models\Room;
use App\Models\RoomOption;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\Jalalian;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::get();
        $rooms = Room::get();
        $facilities = Facility::get();
        return view('admin.hotels.index',compact('hotels','rooms', 'facilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('type','hotel')->with('people')->get();
        return view('admin.hotels.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'mobile' => 'nullable',
            'star' => 'nullable',
            'logo' => 'nullable',
            'banner' => 'nullable',
            'email' => 'nullable|email|unique:hotels,email',
            'website' => 'nullable',
            'description' => 'nullable',
            'address' => 'nullable',
            'mapAddress' => 'nullable',
            'password' => 'nullable',
            'user_id' => 'required',
            'profit' => 'required',
        ]);

        if ($request->logo) $arr ['logo'] = $this->uploadFile($validatedData['logo']);
        if ($request->banner) $arr ['banner'] = $this->uploadFile($validatedData['banner']);

        $hotel = Hotel::create([
            'title' => @$validatedData['title'],
            'mobile' => @$validatedData['mobile'],
            'star' => @$validatedData['star'],
            'email' => @$validatedData['email'],
            'website' => @$validatedData['website'],
            'description' => @@$validatedData['description'],
            'address' => @$validatedData['address'],
            'mapAddress' => @$validatedData['mapAddress'],
            'password' => @$validatedData['password'],
            'profit' => @$validatedData['profit'],
        ]);
        HotelUser::create([
            'user_id' => $validatedData['user_id'],
            'hotel_id' => $hotel->id,
            'role' => 'admin',
        ]);
        if ($request->mapAddress){
            $map = explode(',',$validatedData['mapAddress']);
            $lat = explode('[',$map[0])[1];
            $lon = explode(']',$map[1])[0];
            $url = "https://nominatim.openstreetmap.org/reverse?lat={$lat}&lon={$lon}&format=json";
            $client = new \GuzzleHttp\Client();
            $response = $client->get($url, ['headers' => ['User-Agent' => 'LaravelApp']]);
            $data = json_decode($response->getBody(), true);
            $hotel->update([
                'city' => $data['address']['city'],
                'province' => $data['address']['state'],
                'country' => $data['address']['country'],
            ]);
        }



        return redirect()->route('admin.hotels.index')->with('success', 'هتل با موفقیت ایجاد شد.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $hotel = Hotel::where('id',$id)->with('rooms')->first();
        $users = User::where('type','hotel')->with('people')->get();
        $selectedUser = HotelUser::where('hotel_id', $id)
                ->where('role', 'admin')
                ->value('user_id') ?? 0;
        return view('admin.hotels.edit',compact('hotel','users','selectedUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'mobile' => 'nullable',
            'star' => 'nullable',
            'logo' => 'nullable',
            'banner' => 'nullable',
            'email' => 'nullable|email|unique:hotels,email,'.$id,
            'website' => 'nullable',
            'description' => 'nullable',
            'address' => 'nullable',
            'mapAddress' => 'nullable',
            'password' => 'nullable',
            'profit' => 'nullable',
            'status' => 'nullable',
        ]);

        if ($request->user_id){
            HotelUser::where('hotel_id',$id)->update([
                'user_id' => $request->user_id,
            ]);
        }

        if ($request->logo) $arr ['logo'] = $this->uploadFile($validatedData['logo']);
        if ($request->banner) $arr ['banner'] = $this->uploadFile($validatedData['banner']);

        if ($request->mapAddress) {
            $map = explode(',', $validatedData['mapAddress']);
            $lat = explode('[', $map[0])[1];
            $lon = explode(']', $map[1])[0];
            $url = "https://nominatim.openstreetmap.org/reverse?lat={$lat}&lon={$lon}&format=json";
            $client = new \GuzzleHttp\Client();
            $response = $client->get($url, ['headers' => ['User-Agent' => 'LaravelApp']]);
            $data = json_decode($response->getBody(), true);
            $validatedData['city'] = $data['address']['city'];
            $validatedData['province'] = $data['address']['state'];
            $validatedData['country'] = $data['address']['country'];
        }
        $hotel = Hotel::where('id',$id)->first();
        if ($request->status != $hotel->status or $request->changeStatus){
            Message::create([
                'text' => $request->changeStatus ?: 'تغییر وضعیت هتل (پیام خودکار سیستم)',
                'type' => 'admin',
                'sender_id' => Auth::guard('admin')->user()->id,
                'sender_model' => 'App\Models\User',
                'receiver_id' => $id,
                'receiver_model' => 'App\Models\Hotel',
                'status' => 0,
            ]);
        }
        $hotel->update($validatedData);
        return redirect()->route('admin.hotels.index')->with('success', 'هتل با موفقیت اپدیت شد.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Hotel::whereId($id)->delete();
        return redirect()->route('admin.hotels.index')->with('success', 'هتل با موفقیت حذف شد.');
    }


    public function editReserve($id)
    {
        $reserve = Reserve::where('id',$id)->firstOrFail();
        return view('admin.hotels.editReserve',compact('reserve'));
    }


    public function updateReserve(Request $request, $id)
    {
        $reserve = Reserve::where('id',$id)->first();

        $dates = [$request->entry_date,$request->exit_date];
        $entryDate = Carbon::createFromFormat('Y/m/d', $request->entry_date);
        $exitDate = Carbon::createFromFormat('Y/m/d', $request->exit_date)->subDay();
        $numberOfDays = $entryDate->diffInDays($exitDate)+1;
        $dates[1] = $exitDate->format('Y/m/d');

        $hotel = Hotel::where('id', $reserve->model_id)->first();

        $rooms = Room::where('hotel_id', $hotel->id)->where('status', 'تایید شده')->get();

        $availableRoomsForNeeds = [];
        $roomPrices = [];
        $results = [];

        // Step 1: Find all suitable rooms for each need
        foreach ($request->rooms as $key => $people) {
            $availableRoomsForNeeds[count($people['people']) * ($key + 1) * 10] = [];
            foreach ($rooms as $room) {
                $count = $room->single + $room->double * 2;
                if ($count < count($people['people'])) continue;
                $options = RoomOption::where('room_id', $room->id)
                    ->whereBetween('date', $dates)
                    ->get();
                if (count($options) < $numberOfDays) continue;
                $countReserve = $this->getRoomReserveCount($hotel->id,$dates,$room->id);

                $isAvailable = true;
                foreach ($options as $option) {
                    if ($countReserve >= $option->capacity) {
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
                $totalPriceBord = 0;
                foreach ($options as $option) {
                    $totalPrice += $option->ajax;
                    $totalPriceBord += $option->bord;
                }
                $room->price = ((100 + $hotel->profit) * $totalPrice) / 100;
                $room->priceBord = ((100 + $hotel->profit) * $totalPriceBord) / 100;
                $room->priceHotel = $totalPrice;
                $availableRoomsForNeeds[count($people['people']) * ($key + 1) * 10][$room->id] = $room;

                $roomPrices[$room->id]['ajax'] = $totalPrice;
                $roomPrices[$room->id]['bord'] = $totalPriceBord;
            }
        }
        // Step 2: Generate all possible combinations
        $combinations = [];
        $needs = [];
        foreach ($request->rooms as $room)
            $needs [] = count($room['people']);
        // This function will generate all possible combinations recursively
        function generateCombinations($availableRoomsForNeeds, $needs, $current = [], $index = 0, &$result = [])
        {
            if ($index == count($needs)) {
                $result[] = $current;
                return;
            }

            $currentNeed = $needs[$index] * ($index + 1) * 10;
            foreach ($availableRoomsForNeeds[$currentNeed] as $roomId => $roomData) {
                $newCurrent = $current;
                $newCurrent[$currentNeed] = $roomData;
                generateCombinations($availableRoomsForNeeds, $needs, $newCurrent, $index + 1, $result);
            }
        }
        $s = $request->input(['rooms']);
        generateCombinations($availableRoomsForNeeds, $needs, [], 0, $combinations);
        //step 3:remove combinations
        $saver = [];
        $price = 0;
        foreach ($combinations as $key => $combination){
            $equal = false;
            $ch = true;
            $arr = [];

            $totalPrice = 0;
            $totalPriceBord = 0;
            $totalPriceHotel = 0;
            $roomsInCombination = [];
            foreach ($combination as $needCount => $roomData) {

                $totalPrice += $roomData->price;
                $totalPriceBord += $roomData->priceBord;
                $totalPriceHotel += $roomData->priceHotel;
                $roomsInCombination[$needCount] = [
                    'room_info' => $roomData,
                    'price_for_period' => $roomData->price,
                    'price_bord' => $roomData->priceBord,
                    'price_hotel' => $roomData->priceHotel,
                ];

                foreach ($s as $k => $row){
                    $c = count($row['people']) * ($k + 1) * 10;
                    if ($c == $needCount) $s[$k]['room'] = $roomData;
                }
                $arr[] = $roomData->id;
            } // make this combination array
            foreach ($saver as $row) if ($this->areArraysEqualOptimized($row,$arr)) $equal = true; //check equal array
            if (!$equal) {
                $requireCountIds = array_count_values($arr);
                foreach ($requireCountIds as $roomId => $requireCountId){
                    if (!$this->isRoomAvailableForDates($roomId,$dates,$requireCountId,$hotel->id)) $ch = false;
                }
                if ($ch) {
                    $saver[$key] = $arr;
                    if ($totalPrice < $price || $price == 0){
                        $results = [
                            'rooms' => $roomsInCombination,
                            'total_price' => $totalPrice,
                            'total_priceBord' => $totalPriceBord,
                            'total_priceHotel' => $totalPriceHotel,
                        ];
                    }

                }
            }
        }
        $response = zarinpal()
            ->merchantId(Gateway::where('id',1)->first()->api)
            ->amount($results['total_price']-$reserve->price)
            ->request()
            ->description("reserve Hotel")
            ->callbackUrl(route('hotelBooking.paymentRedirect'))
            ->email(Auth::guard('user')->user()->email ?? 'example@gmail.com')
            ->mobile(Auth::guard('user')->user()->mobile ?? '09123456789')
            ->send();

        if ($response->success()) {



            Reserve::where('id',$reserve->id)->update([
                'entry_date' => $dates[0],
                'exit_date' => $dates[1],
                'paymentStatus' => 'درحال انجام',
                'paymentCode' => $response->authority(),
                'bordPrice' => $results['total_priceBord'],
                'price' => $results['total_price'],
                'hotelPrice' => $results['total_priceHotel'],
                'editDate' => Jalalian::now()->format('Y-m-d'),
            ]);
            PeopleReserve::where('reserve_id',$reserve->id)->delete();
            foreach ($s as $key => $room) {
                foreach ($room['people'] as $key2 => $people){
                    PeopleReserve::create([
                        'reserve_id' => $reserve->id,
                        'sex' => @$people['sex'],
                        'firstName' => @$people['firstName'],
                        'lastName' => @$people['lastName'],
                        'nationalCode' => @$people['nationalCode'],
                        'mobile' => @$people['mobile'],
                        'model_number' => $key,
                        'people_number' => $key2,
                        'model_type' => 'App\Models\Room',
                        'model_id' => $room['room']->id,
                    ]);
                }
            }

            $paymentUrl = "https://www.zarinpal.com/pg/StartPay/" . $response->authority();
            return response()->json([
                'success' => true,
                'message' => 'رزرو با موفقیت ایجاد شد. لطفا پرداخت را انجام دهید.',
                'payment_url' => $paymentUrl,
                'reserve_code' => $reserve->code
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'خطا در ارتباط با درگاه پرداخت: ' . $response->error()->message()
            ], 500);
        }
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


    protected function isRoomAvailableForDates($roomId, $dates, $requiredCount,$hotelId)
    {
        $entryDate = $dates[0];
        $exitDate = $dates[1];

        // Get all options for this room in date range
        $options = RoomOption::where('room_id', $roomId)
            ->whereBetween('date', [$entryDate, $exitDate])
            ->get();

        // Get all reserves for this room in date range
        $reservedCount = $this->getRoomReserveCount($hotelId,$dates,$roomId);

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


    public function getRoomReserveCount($hotelId,$dates,$roomId)
    {
        $reserves = Reserve::where('model_id',$hotelId)->where('model_type','App\Models\Hotel')->where(function($query) use ($dates) {
            $query->where('entry_date', '<=', $dates[0])
                ->where('exit_date', '>=', $dates[1]);
        })->with('people')->get();
        $num = 0;
        foreach ($reserves as $reserve) $num += $reserve->people->max('model_number')+1;
        return $num;
    }


    public function facilitiesDestroy($id)
    {
        Facility::where('id',$id)->delete();
        return redirect()->route('admin.hotels.index');
    }


    public function facilitiesUpdate(Request $request, $id)
    {
        Facility::where('id',$id)->update([
            'title' => $request->title,
            'icon' => $request->icon,
            'type' => $request->type,
        ]);
        return redirect()->route('admin.hotels.index');
    }


    public function facilitiesStore(Request $request)
    {
        Facility::create([
            'title' => $request->title,
            'icon' => $request->icon,
            'type' => $request->type,
        ]);

        return redirect()->route('admin.hotels.index');
    }
}

