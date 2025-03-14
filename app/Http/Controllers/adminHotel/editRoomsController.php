<?php

namespace App\Http\Controllers\adminHotel;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\File;
use App\Models\RoomFacility;
use App\Models\Room;
use Illuminate\Http\Request;

class editRoomsController extends Controller
{
    public function index()
    {
        return view('adminHotel.editRooms');
    }

    public function storeRoom(Request $request,$hotelId)
    {
        $validatedData = $request->validate([
            'files' => 'required',
            'title' => 'required',
            'description' => 'required',
            'single_beds' => 'required',
            'double_beds' => 'required',
            'room-type' => 'required',
        ]);
        $room = Room::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'single' => $validatedData['single_beds'],
            'double' => $validatedData['double_beds'],
            'type' => $validatedData['room-type'],
            'hotel_id' => $hotelId,
            'status' => 1,
        ]);
        foreach ($validatedData['files'] as $file){
            $filePath = $file->store('uploads', 'public');
            File::create([
                'model_type' => 'App\Models\Room',
                'type' => 'image',
                'model_id' => $room->id,
                'address' => $filePath,
            ]);
        }
        return redirect()->route('hotel.manageRooms');
    }
}
