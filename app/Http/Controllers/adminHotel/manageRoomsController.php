<?php

namespace App\Http\Controllers\adminHotel;

use App\Http\Controllers\Controller;

class manageRoomsController extends Controller
{
    public function index()
    {
        return view('adminHotel.manageRooms');
    }
}
