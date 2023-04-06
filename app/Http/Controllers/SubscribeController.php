<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('subscribe');
    }
}
