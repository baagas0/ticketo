@extends('user.layouts.authed')
@section('title', 'Bookings')
@section('body')
<div id="tg-content" class="tg-content">
    <div class="tg-dashboard">

        <div class="tg-box tg-mybooking">
            <div class="tg-heading">
                <h3>My Booking</h3>
            </div>
            <div class="tg-dashboardcontent">
                <div class="tg-content">
                    <table class="table table-responsive">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Code</th>
                            <th scope="col">Schedule</th>
                            <th scope="col">Type</th>
                            <th scope="col">Payment</th>
                            <th scope="col">Status</th>
                            <th scope="col">Detail</th>
                        </tr>
                        <tbody>
                            @foreach($bookings as $booking)
                            <tr>
                                <td data-title="number">{{ $loop->iteration }}</td>
                                <td data-title="code">{{ $booking->code }}</td>
                                <td data-title="schedule"><strong>{{ $booking->schedulle->id }}</strong></td>
                                <td class="type" data-title="type">{{ $booking->type }}</td>
                                <td class="type" data-title="payment">{{ $booking->payment->name }}</td>
                                <td class="type" data-title="approval">{{ $booking->approval }}</td>
                                <td data-title="detail"><a class="tg-btnview" href="{{ route('user.booking.detail', $booking->id) }}">view</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
