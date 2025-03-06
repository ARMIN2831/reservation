<?php

namespace App\Http\Controllers\userHotel;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;

class hotelBookingController extends Controller
{
    public function index($id)
    {
        return view('user.hotelBooking.hotelBookingPage-'.$id);
    }
}
