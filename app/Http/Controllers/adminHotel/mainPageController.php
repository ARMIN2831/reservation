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
        return view('adminHotel.mainPage');
    }
    public function updateHotel(Request $request,$id)
    {
        $validatedData = $request->validate([
            'address' => 'required',
            'description' => 'required',
            'mapAddress' => 'required',
        ]);

        $map = explode(',',$validatedData['mapAddress']);
        $lat = explode('[',$map[0])[1];
        $lon = explode(']',$map[1])[0];
        $url = "https://nominatim.openstreetmap.org/reverse?lat={$lat}&lon={$lon}&format=json";
        $client = new \GuzzleHttp\Client();
        $response = $client->get($url, ['headers' => ['User-Agent' => 'LaravelApp']]);
        $data = json_decode($response->getBody(), true);
        $validatedData['city'] = $data['address']['city'];
        $validatedData['province'] = $data['address']['state'];
        $validatedData['country'] = $data['address']['country'];

        Hotel::whereId($id)->update($validatedData);
        return redirect()->route('hotel.mainPage');
    }


    public function updateFacility(Request $request,$id)
    {
        foreach ($request->facilities as $facility){
            if ($facility['isNew'] == 'true'){
                $f = Facility::updateOrCreate(
                    ['title' => $facility['title'], 'type' => $facility['type'],],
                    ['title' => $facility['title'], 'type' => $facility['type'],]
                );

                HotelFacility::updateOrCreate(
                    ['facility_id' => $f->id, 'hotel_id' => $id,],
                    ['status' => (isset($facility['status']) and $facility['status'] == 'on') ? 1 : 0,]
                );
            }else{
                HotelFacility::where('facility_id', $facility['isNew'])->where('hotel_id', $id)->update([
                    'status' => (isset($facility['status']) and $facility['status'] == 'on') ? 1 : 0,
                ]);
            }
        }
        return redirect()->route('hotel.mainPage');
    }


    public function addPhotoGallery(Request $request,$id)
    {
        $validatedData = $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png',
        ]);
        $filePath = $validatedData['file']->store('uploads', 'public');
        File::create([
            'model_type' => 'App\Models\Hotel',
            'type' => 'image',
            'model_id' => $id,
            'address' => $filePath,
        ]);
        return redirect()->route('hotel.mainPage');
    }


    public function deleteGallery(Request $request,$id)
    {
        $ids = $request->input('ids');
        File::whereIn('id', $ids)->delete();
        return response()->json(['success' => true]);
    }
}
