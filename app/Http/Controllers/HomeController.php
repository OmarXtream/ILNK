<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home',[
            'currentSubscription' => auth()->user()->subscription
        ]);
    }

    public function profile()
    {
        $link = secure_url("/".auth()->user()->username);
    
        return view('user.profile',compact('link'));
    }

    
}
