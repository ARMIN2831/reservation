<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Reserve;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
   {
       $users = User::where('type','user')->count();
       $reserves = Reserve::where('type','hotel')->get();
       $countReserve = $reserves->count();
       $priceReserve = $reserves->where('paymentStatus','پرداخت شده')->sum('price');
       return view('admin.content',compact('users','countReserve','priceReserve'));
   }
}
