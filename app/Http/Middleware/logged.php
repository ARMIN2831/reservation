<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class logged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard = null): Response
    {
        $route = $guard.'.dashboard';
        if ($guard == 'user') {
            $route = 'userDashboard.index';
        }

        if (!Auth::guard($guard)->check()) return $next($request);
        else return redirect()->route($route);
    }
}
