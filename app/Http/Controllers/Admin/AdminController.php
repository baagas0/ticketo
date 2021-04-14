<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Booking;
use App\Schedulle;
use Carbon\Carbon;

class AdminController extends Controller
{
	public function __construct()
    {
    	Carbon::setWeekStartsAt(Carbon::SUNDAY);
    	Carbon::setWeekEndsAt(Carbon::SATURDAY);
    }

    public function getIndex() {
    	$data['numberOfSales'] = Booking::count();
    	$data['salesRevenue'] = Booking::sum('total');
    	$data['averageRevenue'] = Booking::all()->avg('total') / $data['numberOfSales'];

    	$data['weeklyEarning'] = Booking::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('total');
    	$data['monthEarning'] = Booking::whereMonth('created_at', Carbon::parse('now')->format('m'))->sum('total');

    	$data['yearRevenue'] = Booking::sum('total');

    	$data['tickets'] = Booking::limit(4)->get();
    	$data['schedulles'] = Schedulle::orderBy('id', 'desc')->limit(4)->get();
    	return view('admin.dashboard', $data);
    }

    
}
