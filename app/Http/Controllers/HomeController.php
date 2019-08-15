<?php

namespace App\Http\Controllers;

use App\Follow;
use App\Http\Resources\Ink\FollowerToUser;
use App\Http\Resources\Ink\UserToInk;
use App\Ink;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $access;
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
        return view('home');
    }
    
}
