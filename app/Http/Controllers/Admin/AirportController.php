<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Airport;

class AirportController extends Controller
{
    public function getIndex() {
    	return view('admin.airport.main');
    }
    
}
