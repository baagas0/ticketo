<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Payment;

class PaymentController extends Controller
{
    public function getIndex()
    {
        $data['payments'] = Payment::all();

        return view('admin.payment.index', $data);
    }
}
