<?php

namespace App\Http\Controllers\adminHotel;

use App\Http\Controllers\Controller;

class editRoomsController extends Controller
{
    public function index()
    {
        return view('adminHotel.editRooms');
    }
}
