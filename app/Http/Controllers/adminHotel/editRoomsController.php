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
            'files' => 'nullable',
            'title' => 'required',
            'description' => 'required',
            'single' => 'required',
            'double' => 'required',
            'room-type' => 'required',
        ]);
        $room = Room::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'single' => $validatedData['single'],
            'double' => $validatedData['double'],
            'type' => $validatedData['room-type'],
            'hotel_id' => $hotelId,
            'status' => 'در انتظار تایید',
        ]);
        if (isset($validatedData['files'])){
            foreach ($validatedData['files'] as $file){
                $filePath = $this->uploadFile($file);
                File::create([
                    'model_type' => 'App\Models\Room',
                    'type' => 'image',
                    'model_id' => $room->id,
                    'address' => $filePath,
                ]);
            }
        }

        return redirect()->route('hotel.manageRooms');
    }


    public function editRooms(Request $request)
    {
        $roomsId = explode(',',$request->selected_room);
        $rooms = Room::whereIn('id',$roomsId)->get();
        return view('adminHotel.editRooms',compact('rooms'));
    }


    public function updateRoom(Request $request,$roomId)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'single' => 'required',
            'double' => 'required',
            'room-type' => 'required',
        ]);
        $room = Room::where('id')->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'single' => $validatedData['single'],
            'double' => $validatedData['double'],
            'type' => $validatedData['room-type'],
        ]);
        if($request->file){
            foreach ($request->file as $file){
                $filePath = $this->uploadFile($file);
                File::create([
                    'model_type' => 'App\Models\Room',
                    'type' => 'image',
                    'model_id' => $room->id,
                    'address' => $filePath,
                ]);
            }
        }

        return redirect()->route('hotel.manageRooms');
    }
}
