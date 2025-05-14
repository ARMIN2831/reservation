<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Hotel;
use App\Models\MainPageSetting;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class mainPageController extends Controller
{
    public function index()
    {
        $suggestionsOne = MainPageSetting::where('type',0)->with('hotel')->get();
        $suggestionsTwo = MainPageSetting::where('type',1)->with('hotel')->get();
        $today = Jalalian::now();
        $tomorrow = Jalalian::now()->addDays(1);
        $blogs = Blog::get();
        return view('user.mainPage',compact('suggestionsOne','suggestionsTwo','today','tomorrow','blogs'));
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


    public function blog($id)
    {
        $blog = Blog::find($id);
        return view('user.blogs',compact('blog'));
    }
}
