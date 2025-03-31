<?php

namespace App\Http\Controllers\adminHotel;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class reservationController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::guard('hotel')->user();
        $hotel = Hotel::whereHas('users', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->first();
        $reserves = Reserve::query()->where('model_type','App\Models\Hotel')->where('model_id',$hotel->id);
        if ($request->entry_date) $reserves->where('entry_date','>=',$request->entry_date);
        if ($request->exit_date) $reserves->where('exit_date','<=',$request->exit_date);

        if ($request->reserve_id) $reserves->where('id',$request->reserve_id);
        $reserves = $reserves->with('people.room')->get();
        return view('adminHotel.reservation',compact('reserves'));
    }
}
