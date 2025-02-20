<?php

namespace App\Http\Middleware;

use App\Models\Hotel;
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
            })->with('files','facilities','rooms.files','reserves')->first();
            View::share('sharedData', $hotel);
        }

        return $next($request);
    }
}
