<?php

namespace App\Http\Controllers\adminHotel;

use App\Http\Controllers\Controller;

class reservationController extends Controller
{
    public function index()
    {
        return view('adminHotel.reservation');
    }
}
