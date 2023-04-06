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
        return view('subscribe.subscribe');
    }

    public function payment($planID){
        if($planID == 1){
            $price = 0;
            $planID = 1;
        }else{
            $price = 99.99;
            $planID = 2;
        }
        return view('subscribe.payment',compact('price','planID'));
    }

    public function pay(){
        return view('subscribe.subscribe');
    }


    
}
