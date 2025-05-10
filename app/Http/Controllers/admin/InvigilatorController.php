<?php

namespace App\Http\Controllers;

use App\Models\Invigilator;
use Illuminate\Http\Request;

class InvigilatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invigilators = Invigilator::get();
        return view('admin.invigilators.index',compact('invigilators'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.invigilators.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'email' => 'required|email|unique:invigilators,email',
            'mobile' => 'required|string|max:15',
            'nationalCode' => 'required|string|max:10',
        ]);

        Invigilator::create([
            'firstName' => $validatedData['firstName'],
            'lastName' => $validatedData['lastName'],
            'city' => $validatedData['city'],
            'email' => $validatedData['email'],
            'mobile' => $validatedData['mobile'],
            'nationalCode' => $validatedData['nationalCode'],
        ]);

        return redirect()->route('invigilators.index')->with('success', 'مراقب با موفقیت ایجاد شد.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $invigilator = Invigilator::where('id',$id)->first();
        return view('admin.invigilators.edit',compact('invigilator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'email' => 'required|email|unique:invigilators,email,'.$id,
            'mobile' => 'required|string|max:15',
            'nationalCode' => 'required|string|max:10',
        ]);

        Invigilator::where('id',$id)->update([
            'firstName' => $validatedData['firstName'],
            'lastName' => $validatedData['lastName'],
            'city' => $validatedData['city'],
            'email' => $validatedData['email'],
            'mobile' => $validatedData['mobile'],
            'nationalCode' => $validatedData['nationalCode'],
        ]);
        return redirect()->route('invigilators.index')->with('success', 'مراقب با موفقیت اپدیت شد.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Invigilator::whereId($id)->delete();
        return redirect()->route('invigilators.index')->with('success', 'مراقب با موفقیت حذف شد.');
    }
}
