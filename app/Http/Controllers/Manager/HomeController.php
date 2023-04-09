<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Page;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('is.manager');
    }

    public function index()
    {
        $userCount = User::count();
        $SubCount = User::has('subscription')->count();
        $PageCount = Page::count();

        return view('manager.home', compact('userCount','SubCount','PageCount'));
    }

    public function users()
    {
        $users = User::paginate(20);
        return view('manager.users', compact('users'));
    }
}
