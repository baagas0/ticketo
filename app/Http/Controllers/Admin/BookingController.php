<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Booking;

class BookingController extends Controller
{
    public function getIndex()
    {
        $data['bookings'] = Booking::all();

        return view('admin.booking.index', $data);
    }

    public function getApprove($id)
    {
        Booking::find($id)->update(['status' => 1]);

        return back();
    }

    public function getReject($id)
    {
        Booking::find($id)->update(['status' => 2]);

        return back();
    }
}
