<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Booking;
use App\Schedulle;
use App\Payment;
use Facades\Services\TripayService;
use PDF;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();

        return view('user.main.booking.index', compact('bookings'));
    }

    public function detail($id)
    {
        $booking = Booking::with('schedulle')->findOrFail($id);
        $tripay = TripayService::detail($booking->reference);

        $type = $booking->type;

        switch ($type) {
            case 'Economy':
                $price = $booking->schedulle->economy_price;
                break;
            case 'Bussiness':
                $price = $booking->schedulle->bussiness_price;
                break;
            case 'First':
                $price = $booking->schedulle->first_price;
                break;
            default:
                $price = $booking->schedulle->economy_price;
                break;
        }

        return view('user.main.booking.detail', compact('booking', 'tripay', 'price'));
    }

    public function checkout(Request $request, $schedule)
    {
        $schedule = Schedulle::findOrFail($schedule);
        $person = $request->get('number_of_person');
        $type = $request->get('type');
        // dd($person);
        switch ($type) {
            case 'Economy':
                $price = $schedule->economy_price;
                break;
            case 'Bussiness':
                $price = $schedule->bussiness_price;
                break;
            case 'First':
                $price = $schedule->first_price;
                break;
            default:
                $price = $schedule->economy_price;
                break;
        }

        $total = ($person * $price);
        $payments = Payment::whereNull('deactived_at')->get();

        return view('user.main.booking.checkout', compact('schedule', 'person', 'price', 'total', 'type', 'payments'));
    }

    public function pay(Request $request, $schedule)
    {
        $payment = Payment::findOrFail($request->payment_id);
        $schedule = Schedulle::findOrFail($schedule);
        // dd($schedule);
        switch ($request->type) {
            case 'Economy':
                $price = $schedule->economy_price;
                break;
            case 'Bussiness':
                $price = $schedule->bussiness_price;
                break;
            case 'First':
                $price = $schedule->first_price;
                break;
            default:
                $price = $schedule->economy_price;
                break;
        }

        $total = $request->number_of_person * $price;

        $booking = Booking::create([
            'user_id' => auth()->id(),
            'schedulle_id' => $schedule->id,
            'payment_id' => $payment->id,
            'type' => $request->type,
            'number_of_person' => $request->number_of_person,
            'total' => $total,
            'status' => 0,
        ]);

        $tripay = TripayService::request([
            'method' => $payment->code,
            'merchant_ref' => $booking->code,
            'amount' => $total,
            'customer_name' => auth()->user()->name,
            'customer_email' => auth()->user()->email,
            'order_items'    => [
                [
                    'sku'      => $schedule->id,
                    'name'     => $schedule->destination_code,
                    'price'    => $price,
                    'quantity' => $request->number_of_person,
                    'subtotal' => $total,
                ],
            ],
        ]);

        Booking::find($booking->id)->update(['reference' => $tripay['reference']]);

        return redirect()->route('user.booking.detail', $booking->id);
    }

    public function boarding($id)
    {
        $booking = Booking::with('schedulle')->findOrFail($id);
        $tripay = TripayService::detail($booking->reference);

        $type = $booking->type;

        switch ($type) {
            case 'Economy':
                $price = $booking->schedulle->economy_price;
                break;
            case 'Bussiness':
                $price = $booking->schedulle->bussiness_price;
                break;
            case 'First':
                $price = $booking->schedulle->first_price;
                break;
            default:
                $price = $booking->schedulle->economy_price;
                break;
        }

        return view('user.main.booking.boarding-pass', compact('booking', 'tripay', 'price'));
    }
}
