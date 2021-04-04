<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gravatar;

class DashboardController extends Controller
{
    public function index()
    {
    	// dd(Gravatar::get('email@example.com'));
        return view('user.main.dashboard');
    }
}
