<?php

namespace App\Http\Controllers;

use App\Jobs\ClearTempSpace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        ClearTempSpace::dispatch();
        return Storage::disk('public')->allDirectories('storage/items/image/');
//        return view('user.dashboard');
    }

    /**
     * Show Registered user payments.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function payment()
    {
        return view('user.payment');
    }

    /**
     * Show Registered user added items.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function items()
    {
        return view('user.items');
    }
}
