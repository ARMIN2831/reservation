<?php

namespace App\Http\Middleware;

use App\Models\Hotel;
use App\Models\Message;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class ShareAdminHotelData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            $user = auth()->user();
            $hotel = Hotel::whereHas('users', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->with('files','facilities','rooms.files','reserves.people.room')->first();
            if ($hotel){
                $hotel->messages = Message::where('receiver_id',$hotel->id)
                    ->where('type','admin')
                    ->where('receiver_model','App\Models\Hotel')
                    ->where('sender_model','App\Models\User')
                    ->where('status',0)
                    ->get();
            }
            /*foreach ($hotel->reserves as $reserve){
                foreach ($reserve->people as $people){
                    $people->update([
                        'firstName' => 'آرمین',
                        'lastName' => 'اسلامی',
                        'nationalCode' => '5790103911',
                        'mobile' => '09192008773',
                        'model_type' => '09192008773',
                        'model_id' => '09192008773',
                    ]);
                }
            }*/
            View::share('sharedData', $hotel);
        }

        return $next($request);
    }
}
