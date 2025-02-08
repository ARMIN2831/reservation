<?php

namespace App\Http\Controllers\adminHotel;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;

class mainPageController extends Controller
{
    public function index()
    {
        return view('adminHotel.mainPage');
    }
    public function updateHotel(Request $request,$id)
    {
        $validatedData = $request->validate([
            'address' => 'required',
            'description' => 'required',
            'mapAddress' => 'required',
        ]);
        Hotel::whereId($id)->update($validatedData);
        return redirect()->route('hotel.mainPage');
    }
}
