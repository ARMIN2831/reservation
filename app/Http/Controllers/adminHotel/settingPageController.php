<?php

namespace App\Http\Controllers\adminHotel;

use App\Http\Controllers\Controller;

class settingPageController extends Controller
{
    public function index()
    {
        return view('adminHotel.settingPage');
    }
}
