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


    public function updateRoom(Request $request)
    {
        $validatedData = $request->validate([
            'rooms' => 'required|array',
            'rooms.*.title' => 'required|string',
            'rooms.*.description' => 'required|string',
            'rooms.*.single' => 'required|integer',
            'rooms.*.double' => 'required|integer',
            'rooms.*.room-type' => 'required|string',
            'rooms.*.id' => 'required|exists:rooms,id',
            'files' => 'nullable|array',
            'files.*' => 'image',
            'files_room_id' => 'nullable|array',
            'files_title' => 'nullable|array',
        ]);
        // پردازش اتاق‌ها
        foreach ($validatedData['rooms'] as $roomData) {
            $room = Room::find($roomData['id']);
            $room->update([
                'title' => $roomData['title'],
                'description' => $roomData['description'],
                'single' => $roomData['single'],
                'double' => $roomData['double'],
                'type' => $roomData['room-type'],
            ]);
        }

        // پردازش فایل‌های آپلود شده
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $index => $file) {
                $roomId = $request->input("files_room_id.{$index}");
                $title = $request->input("files_title.{$index}", '');

                $filePath = $this->uploadFile($file);

                File::create([
                    'model_type' => 'App\Models\Room',
                    'type' => 'image',
                    'model_id' => $roomId,
                    'address' => $filePath,
                    'title' => $title,
                ]);
            }
        }

        return redirect()->route('hotel.manageRooms')->with('success', 'اتاق‌ها با موفقیت به‌روزرسانی شدند.');
    }
}
