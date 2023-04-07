<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use LucasDotVin\Soulbscription\Models\Plan;
use App\Http\Requests\PayRequest;
use Auth;
class SubscribeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
            
        return view('subscribe.subscribe');
        
    }

    public function payment($plan){
        $plan = Plan::where('name', $plan)->firstOrFail();
       
        if($plan->price > 0){
            return view('subscribe.payment',compact('plan'));
        }else{
            if(auth()->user()->subscription == null){
            Auth::user()->subscribeTo($plan);
            }else{
            Auth::user()->switchTo($plan);
            }

            return redirect()->route('home');
    
        }


    }

    public function pay(PayRequest $request){
        $plan = Plan::where('name', $request->plan)->firstOrFail();

        # Payment process goes here

        # if payment is successfull then..
        if(auth()->user()->subscription == null){
        Auth::user()->subscribeTo($plan);
        }else{
        Auth::user()->switchTo($plan);
        }

        return redirect()->route('home');
    }


    
}
