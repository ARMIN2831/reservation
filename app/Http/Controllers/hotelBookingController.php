<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class hotelBookingController extends Controller
{
    public function index($id)
    {
        return view('user.hotelBooking.hotelBookingPage-'.$id);
    }



    public function results(Request $request)
    {
        $hotels = Hotel::query();
        if ($request->hotel_id == 0){
            $hotels->where('city',$request->destination);
        }else{
            $hotels->where('id',$request->hotel_id);
        }

        return view('user.hotelBooking.hotelBookingPage-1');
    }
}
