<?php

namespace App\Http\Controllers;

class userDashboardController extends Controller
{
    public function index()
    {
        return view('user.userDashboard');
    }
}
