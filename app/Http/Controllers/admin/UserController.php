<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\People;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('people')->get();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('type','user')->with('people')->get();
        return view('admin.users.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'nationalCode' => 'required',
            'mobile' => [
                'nullable',
                Rule::unique('users', 'mobile')->where(function ($query) use ($request) {
                    if (in_array($request->type, ['admin', 'agency'])) return $query->whereIn('type', ['admin', 'agency']);
                    return $query->where('type', $request->type);
                }),
            ],
            'email' => [
                Rule::unique('users', 'email')->where(function ($query) use ($request) {
                    if (in_array($request->type, ['admin', 'agency'])) return $query->whereIn('type', ['admin', 'agency']);
                    return $query->where('type', $request->type);
                }),
            ],
            'username' => [
                'nullable',
                Rule::unique('users', 'username')->where(function ($query) use ($request) {
                    if (in_array($request->type, ['admin', 'agency'])) return $query->whereIn('type', ['admin', 'agency']);
                    return $query->where('type', $request->type);
                }),
            ],
            'password' => 'required',
            'type' => 'required',
            'agencyType' => 'required',
            'discount' => 'nullable',
        ]);
        $people = People::firstOrCreate(
            ['nationalCode' => $validatedData['nationalCode']],
            [
                'firstName' => $validatedData['firstName'],
                'lastName' => $validatedData['lastName'],
                'nationalCode' => $validatedData['nationalCode'],
            ]
        );
        User::create([
            'people_id' => $people->id,
            'mobile' => @$validatedData['mobile'],
            'email' => @$validatedData['email'],
            'username' => @$validatedData['username'],
            'password' => bcrypt($validatedData['password']),
            'type' => $validatedData['type'],
            'agencyType' => $validatedData['agencyType'],
            'discount' => $validatedData['discount'],
        ]);



        return redirect()->route('admin.users.index')->with('success', 'کاربر با موفقیت ایجاد شد.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::where('id',$id)->with('people')->first();
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'nationalCode' => 'required',
            'mobile' => [
                'nullable',
                Rule::unique('users', 'mobile')->ignore($id)->where(function ($query) use ($request) {
                    if (in_array($request->type, ['admin', 'agency'])) return $query->whereIn('type', ['admin', 'agency']);
                    return $query->where('type', $request->type);
                }),
            ],
            'email' => [
                'nullable', 'email',
                Rule::unique('users', 'email')->ignore($id)->where(function ($query) use ($request) {
                    if (in_array($request->type, ['admin', 'agency'])) return $query->whereIn('type', ['admin', 'agency']);
                    return $query->where('type', $request->type);
                }),
            ],
            'username' => [
                'nullable',
                Rule::unique('users', 'username')->ignore($id)->where(function ($query) use ($request) {
                    if (in_array($request->type, ['admin', 'agency'])) return $query->whereIn('type', ['admin', 'agency']);
                    return $query->where('type', $request->type);
                }),
            ],
            'type' => 'required',
            'agencyType' => 'required',
            'discount' => 'nullable',
        ]);
        if ($request->password) $validatedData['password'] = bcrypt($request->password);
        $people = People::updateOrCreate(
            ['nationalCode' => $validatedData['nationalCode']],
            [
                'firstName' => $validatedData['firstName'],
                'lastName' => $validatedData['lastName'],
                'nationalCode' => $validatedData['nationalCode'],
            ]
        );
        unset($validatedData['firstName']);
        unset($validatedData['lastName']);
        unset($validatedData['nationalCode']);
        $validatedData['people_id'] = $people->id;
        User::where('id',$id)->update($validatedData);
        return redirect()->route('admin.users.index')->with('success', 'کاربر با موفقیت اپدیت شد.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::whereId($id)->delete();
        return redirect()->route('admin.users.index')->with('success', 'کاربر با موفقیت حذف شد.');
    }
}

