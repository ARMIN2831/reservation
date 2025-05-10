<?php

namespace App\Http\Controllers\userHotel;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;

class mainPageController extends Controller
{
    public function index()
    {
        return view('user.mainPage');
    }
}
