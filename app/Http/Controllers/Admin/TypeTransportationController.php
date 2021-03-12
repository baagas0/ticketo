<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypeTransportationController extends Controller
{
    public function getIndex() {
        return view('admin.home');
    }
}
