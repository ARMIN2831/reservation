<?php

namespace App\Http\Controllers\adminHotel;

use App\Http\Controllers\Controller;

class financialController extends Controller
{
    public function index()
    {
        return view('adminHotel.financial');
    }
}
