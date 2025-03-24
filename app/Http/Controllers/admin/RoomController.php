<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\HotelUser;
use App\Models\Message;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $room = Room::where('id',$id)->with('files')->first();
        return view('admin.rooms.edit',compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'nullable',
            'type' => 'nullable',
            'single' => 'nullable',
            'double' => 'nullable',
            'description' => 'nullable',
            'status' => 'nullable',
        ]);
        $room = Room::where('id',$id)->first();
        if ($request->status != $room->status or $request->changeStatus){
            Message::create([
                'text' => $request->changeStatus ?: 'تغییر وضعیت اتاق (پیام خودکار سیستم)',
                'type' => 'admin',
                'sender_id' => Auth::guard('admin')->user()->id,
                'sender_model' => 'App\Models\User',
                'receiver_id' => $room->hotel_id,
                'receiver_model' => 'App\Models\Hotel',
                'status' => 0,
            ]);
        }
        $room->update($validatedData);
        return redirect()->route('admin.hotels.index')->with('success', 'هتل با موفقیت اپدیت شد.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Hotel::whereId($id)->delete();
        return redirect()->route('admin.hotels.index')->with('success', 'هتل با موفقیت حذف شد.');
    }
}

