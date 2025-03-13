<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class mainPageController extends Controller
{
    public function index()
    {
        return view('user.mainPage');
    }


    public function hotelSearchDestination($search)
    {
        $hotels = Hotel::select(['id', 'title', 'city', 'province', 'country'])
            ->where('title', 'LIKE', "%$search%")
            ->orWhere('city', 'LIKE', "%$search%")
            ->orWhere('province', 'LIKE', "%$search%")
            ->orWhere('country', 'LIKE', "%$search%")
            ->get();

        $result = [
            'hotels' => $hotels,
            'cities' => $hotels->map(fn($hotel) => [
                'province' => $hotel->province,
                'city' => $hotel->city
            ])->unique()->values(),
        ];
        return response()->json($result, 200);
    }
}
