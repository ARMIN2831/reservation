<?php

namespace App\Http\Controllers\adminHotel;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\File;
use App\Models\Hotel;
use App\Models\HotelFacility;
use Illuminate\Http\Request;

class mainPageController extends Controller
{
    public function index()
    {
        $facilities = Facility::get();
        return view('adminHotel.mainPage',compact('facilities'));
    }
    public function updateHotel(Request $request,$id)
    {
        $validatedData = $request->validate([
            'address' => 'required',
            'description' => 'required',
            'mapAddress' => 'nullable',
        ]);

        if ($validatedData['mapAddress']){
            $map = explode(',',$validatedData['mapAddress']);
            $lat = explode('[',$map[0])[1];
            $lon = explode(']',$map[1])[0];
            $url = "https://nominatim.openstreetmap.org/reverse?lat={$lat}&lon={$lon}&format=json";
            $client = new \GuzzleHttp\Client();
            $response = $client->get($url, ['headers' => ['User-Agent' => 'LaravelApp']]);
            $data = json_decode($response->getBody(), true);
            $validatedData['city'] = $data['address']['city'];
            $validatedData['province'] = isset($data['address']['province']) ? $data['address']['province'] : $data['address']['state'];
            $validatedData['country'] = $data['address']['country'];
        }

        Hotel::whereId($id)->update($validatedData);
        return redirect()->route('hotel.mainPage');
    }


    public function updateFacility(Request $request,$id)
    {
        HotelFacility::where('hotel_id',$id)->delete();
        foreach ($request->facilities as $facility){
            if (isset($facility['status'])){
                HotelFacility::create([
                    'facility_id' => $facility['id'],
                    'hotel_id' => $id,
                    'status' => 1,
                ]);
            }
        }
        return redirect()->route('hotel.mainPage');
    }


    public function addPhotoGallery(Request $request, $id)
    {
        $validatedData = $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png',
        ]);

        $filePath = $this->uploadFile($validatedData['file']);

        $file = File::create([
            'model_type' => 'App\Models\Hotel',
            'type' => 'image',
            'model_id' => $id,
            'address' => $filePath,
        ]);

        return response()->json([
            'success' => true,
            'file' => [
                'id' => $file->id,
                'url' => asset('storage/' . $filePath),
            ],
        ]);
    }


    public function deleteGallery(Request $request,$id)
    {
        $ids = $request->input('ids');
        File::whereIn('id', $ids)->delete();
        return response()->json(['success' => true]);
    }
}
