<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )

    ->withMiddleware(function (Middleware $middleware) {
        $middleware->appendToGroup('web', [
            \App\Http\Middleware\ShareAdminHotelData::class,
        ]);
        $middleware->alias([
            'logged' => \App\Http\Middleware\logged::class,
            'checkLogin' => \App\Http\Middleware\checkLogin::class,

            'UserLogged' => \App\Http\Middleware\UserLogged::class,
            'UserCheckLogin' => \App\Http\Middleware\UserCheckLogin::class,

            'share.admin.hotel.data' => \App\Http\Middleware\ShareAdminHotelData::class,
            'share.user.data' => \App\Http\Middleware\ShareUserData::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
