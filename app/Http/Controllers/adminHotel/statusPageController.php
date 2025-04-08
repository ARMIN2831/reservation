<?php

namespace App\Http\Controllers\adminHotel;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Support\Facades\Auth;

class statusPageController extends Controller
{
    public function index()
    {
        $user = Auth::guard('hotel')->user();

        $hotel = Hotel::whereHas('users', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->with('reserves.people.room')->first();

        $today = now()->format('Y-m-d');
        $currentMonth = now()->month;
        $currentYear = now()->year;

        $incomes = [
            'daily' => $hotel->reserves
                ->where('paymentStatus', 'پرداخت شده')
                ->filter(function ($reserve) use ($today) {
                    return $reserve->created_at->format('Y-m-d') == $today;
                })
                ->sum('hotelPrice'),

            'monthly' => $hotel->reserves
                ->where('paymentStatus', 'پرداخت شده')
                ->filter(function ($reserve) use ($currentMonth, $currentYear) {
                    return $reserve->created_at->month == $currentMonth &&
                        $reserve->created_at->year == $currentYear;
                })
                ->sum('hotelPrice'),

            'yearly' => $hotel->reserves
                ->where('paymentStatus', 'پرداخت شده')
                ->filter(function ($reserve) use ($currentYear) {
                    return $reserve->created_at->year == $currentYear;
                })
                ->sum('hotelPrice')
        ];
        $roomsArr = [];
        foreach ($hotel->reserves as $reserve) {
            $last = 1000;
            foreach ($reserve->people as $person) {

                if ($last != $person->model_number) {
                    if (isset($roomsArr[$person->model_id])) {
                        $roomsArr[$person->model_id]++;
                    } else {
                        $roomsArr[$person->model_id] = 1;
                    }
                }
                $last = $person->model_number;
            }
        }

        return view('adminHotel.statusPage', compact('incomes'));
    }
}
