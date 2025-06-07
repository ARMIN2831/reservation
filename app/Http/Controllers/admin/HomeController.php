<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AgencyUser;
use App\Models\Reserve;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
   {
       $user = Auth::guard('admin')->user();
       $data = [];
       if ($user->type == 'admin'){
           $users = User::where('type','user')->count();
           $reserves = Reserve::where('type','hotel')->get();
           $countReserve = $reserves->count();
           $priceReserve = $reserves->where('paymentStatus','پرداخت شده')->sum('price');
           $data = [
               'users' => $users,
               'countReserve' => $countReserve,
               'priceReserve' => $priceReserve,
           ];
       }else if ($user->type == 'agency') {
           $agencyUsers = AgencyUser::where('agency_id',$user->id)->get();
           $agencyPrices = 0;
           foreach ($agencyUsers->whereNotNull('reserve_id') as $item){
               if (isset($item->reserve->agencyPrice)) $agencyPrices += $item->reserve->agencyPrice;
           }
           $data = [
               'agencyUsers' => $agencyUsers,
               'agencyReserves' => $agencyUsers->whereNotNull('reserve_id')->count(),
               'agencyPrices' => $agencyPrices,
           ];
       }
       return view('admin.content',compact('data'));
   }
}
