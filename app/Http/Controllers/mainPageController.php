<?php

namespace App\Http\Controllers;

class mainPageController extends Controller
{
    public function index()
    {
        return view('user.mainPage');
    }
}
