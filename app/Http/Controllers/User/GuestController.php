<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Page;
use App\Models\User;

class GuestController extends Controller
{
    public function showPage(User $user){

        if($user->page){
        
        $user->load('page');

            if($user->page->theme){
                $themePath = $user->page->theme->path;
            return view('page.guest',compact('themePath','user'));
            }else{
                $themePath = "style6.css";
                return view('page.guest',compact('themePath','user'));

            }

        }
            abort(404);
        

    }

}
