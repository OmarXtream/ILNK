<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Page;
use App\Models\User;

class GuestController extends Controller
{
    public function showPage(User $user){

        if($user->page && $user->page->status == 1){
        
        $user->load('page');
        
        return view('page.guest',compact('user'));

        }
            abort(404);
        

    }

}
