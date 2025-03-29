<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\HotelUser;
use App\Models\User;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::get();
        return view('admin.hotels.index',compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('type','hotel')->with('people')->get();
        return view('admin.hotels.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'mobile' => 'nullable',
            'star' => 'nullable',
            'logo' => 'nullable',
            'banner' => 'nullable',
            'email' => 'nullable|email|unique:hotels,email',
            'website' => 'nullable',
            'description' => 'nullable',
            'address' => 'nullable',
            'mapAddress' => 'nullable',
            'password' => 'nullable',
            'user_id' => 'required',
            'profit' => 'required',
        ]);

        if ($request->logo) $arr ['logo'] = $validatedData['logo']->store('uploads', 'public');
        if ($request->banner) $arr ['banner'] = $validatedData['banner']->store('uploads', 'public');

        $hotel = Hotel::create([
            'title' => @$validatedData['title'],
            'mobile' => @$validatedData['mobile'],
            'star' => @$validatedData['star'],
            'email' => @$validatedData['email'],
            'website' => @$validatedData['website'],
            'description' => @@$validatedData['description'],
            'address' => @$validatedData['address'],
            'mapAddress' => @$validatedData['mapAddress'],
            'password' => @$validatedData['password'],
            'profit' => @$validatedData['profit'],
        ]);
        HotelUser::create([
            'user_id' => $validatedData['user_id'],
            'hotel_id' => $hotel->id,
            'role' => 'admin',
        ]);
        if ($request->mapAddress){
            $map = explode(',',$validatedData['mapAddress']);
            $lat = explode('[',$map[0])[1];
            $lon = explode(']',$map[1])[0];
            $url = "https://nominatim.openstreetmap.org/reverse?lat={$lat}&lon={$lon}&format=json";
            $client = new \GuzzleHttp\Client();
            $response = $client->get($url, ['headers' => ['User-Agent' => 'LaravelApp']]);
            $data = json_decode($response->getBody(), true);
            $hotel->update([
                'city' => $data['address']['city'],
                'province' => $data['address']['state'],
                'country' => $data['address']['country'],
            ]);
        }



        return redirect()->route('admin.hotels.index')->with('success', 'هتل با موفقیت ایجاد شد.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $hotel = Hotel::where('id',$id)->with('rooms')->first();
        $users = User::where('type','hotel')->with('people')->get();
        $selectedUser = HotelUser::where('hotel_id',$id)->where('role','admin')->first()->id;
        return view('admin.hotels.edit',compact('hotel','users','selectedUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'mobile' => 'nullable',
            'star' => 'nullable',
            'logo' => 'nullable',
            'banner' => 'nullable',
            'email' => 'nullable|email|unique:hotels,email,'.$id,
            'website' => 'nullable',
            'description' => 'nullable',
            'address' => 'nullable',
            'mapAddress' => 'nullable',
            'password' => 'nullable',
            'profit' => 'nullable',
        ]);

        if ($request->logo) $arr ['logo'] = $validatedData['logo']->store('uploads', 'public');
        if ($request->banner) $arr ['banner'] = $validatedData['banner']->store('uploads', 'public');

        if ($request->mapAddress) {
            $map = explode(',', $validatedData['mapAddress']);
            $lat = explode('[', $map[0])[1];
            $lon = explode(']', $map[1])[0];
            $url = "https://nominatim.openstreetmap.org/reverse?lat={$lat}&lon={$lon}&format=json";
            $client = new \GuzzleHttp\Client();
            $response = $client->get($url, ['headers' => ['User-Agent' => 'LaravelApp']]);
            $data = json_decode($response->getBody(), true);
            $validatedData['city'] = $data['address']['city'];
            $validatedData['province'] = $data['address']['state'];
            $validatedData['country'] = $data['address']['country'];
        }
        $hotel = Hotel::where('id',$id)->update($validatedData);
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

