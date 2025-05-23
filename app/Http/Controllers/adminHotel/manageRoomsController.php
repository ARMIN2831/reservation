<?php

namespace App\Http\Controllers\adminHotel;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class manageRoomsController extends Controller
{
    public function index()
    {
        return view('adminHotel.manageRooms');
    }


    public function updateRoomStatus($roomId, $status)
    {
        // 0 = غیر قابل رزرو
        // 1 = موجود
        // 2 = تایید شد
        // 3 = رزرو شد

        Room::where('id',$roomId)->update(['status'=>$status]);
        return redirect()->route('hotel.manageRooms');
    }


    public function deleteRooms(Request $request)
    {
        $roomsId = explode(',',$request->selected_room);
        Room::whereIn('id',$roomsId)->delete();
        return redirect()->route('hotel.manageRooms');
    }
}
