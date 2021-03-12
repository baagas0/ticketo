<?php

namespace App\Http\Controllers\Pessenger;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('pessenger.auth:pessenger');
    }

    /**
     * Show the Pessenger dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('pessenger.home');
    }
}
