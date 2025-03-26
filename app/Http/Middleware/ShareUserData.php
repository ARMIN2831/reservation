<?php

namespace App\Http\Middleware;

use App\Models\Hotel;
use App\Models\People;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class ShareUserData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('user')->check()) {
            $user = User::where('id',Auth::guard('user')->user()->id)->with('people')->first();
            View::share('userSharedData', $user);
        }
        return $next($request);
    }
}
