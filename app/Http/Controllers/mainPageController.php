<?php

namespace App\Http\Controllers;

use App\Models\Hotel;

class mainPageController extends Controller
{
    public function index()
    {
        return view('user.mainPage');
    }


    public function hotelSearchDestination($search)
    {
        $hotels = Hotel::get();
        $hotels = [$hotels[0],$hotels[0]];
        $result = [
            'hotels' => [],
            'cities' => [],
        ];

        foreach ($hotels as $hotel) {
            $map = explode(',',$hotel->mapAddress);
            $lat = explode('[',$map[0])[1];
            $lon = explode(']',$map[1])[0];
            $city = $this->getCityName($lat, $lon);
            $result['hotels'][] = $hotel;
            $result['cities'][] = $city;
        }
        $result['cities'] = array_unique($result['cities']);
        return response()->json($result, 200);
    }

    function getCityName($lat, $lon)
    {
        $url = "https://nominatim.openstreetmap.org/reverse?lat={$lat}&lon={$lon}&format=json";

        $client = new \GuzzleHttp\Client();
        $response = $client->get($url, ['headers' => ['User-Agent' => 'LaravelApp']]);
        $data = json_decode($response->getBody(), true);

        return $data['address']['city'] ?? $data['address']['town'] ?? $data['address']['village'] ?? null;
    }
}
