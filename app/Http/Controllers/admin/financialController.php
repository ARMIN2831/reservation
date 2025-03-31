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


    public function requestFactor(Request $request, $reserveId)
    {
        Reserve::where('id',$reserveId)->update(['factorStatus' => 'در حال برسی']);
        return redirect()->route('hotel.manageFinancial');
    }
}
