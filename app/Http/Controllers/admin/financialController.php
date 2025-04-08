<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class financialController extends Controller
{
    public function index()
    {
        $reserves = Reserve::where('model_type','App\Models\Hotel')->with('hotel')->get();

        return view('admin.financial.index',compact('reserves'));
    }


    public function financialChangeStatus(Request $request, $reserveId)
    {
        $status = 'رد شده';
        if ($request->status == 1) $status = 'پرداخت شده';
        Reserve::where('id',$reserveId)->update(['factorStatus' => $status]);
        return redirect()->route('admin.financial');
    }
}
