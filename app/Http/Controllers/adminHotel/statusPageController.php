<?php

namespace App\Http\Controllers\adminHotel;

use App\Http\Controllers\Controller;

class statusPageController extends Controller
{
    public function index()
    {
        return view('adminHotel.statusPage');
    }
}
