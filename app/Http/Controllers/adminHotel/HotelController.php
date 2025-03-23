<?php

namespace App\Http\Controllers\adminHotel;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Message;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function changeMessageStatus(Request $request)
    {
        Message::where('id',$request->id)->update(['status' => 1]);
        return response()->json(['success' => 'success']);
    }
}
