@extends('user.layouts.authed')
@section('title', 'Booking: #' . $booking->code)
@section('body')
<div id="tg-content" class="tg-content">
    <div class="tg-dashboard">
        <div class="tg-fulltourdetail">
            <div class="tg-box tg-tourname">
                <div class="tg-dashboardcontent">
                    <h3>Tour Name</h3>
                    <div class="tg-content">
                        <ul class="tg-liststyle">
                            <li><span>Booking Code:</span></li>
                            <li><span>#{{ $booking->code }}</span></li>
                            <li><span>Booking Date</span></li>
                            <li><span>{{ $booking->created_at->format('d F Y H:i') }}</span></li>
                            <li><span>Tour</span></li>
                            <li><span>{{ $booking->schedulle->destination_code }}</span></li>
                            <li><span>Travel Date</span></li>
                            <li><span>{{ $booking->schedulle->date }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tg-box tg-contactdetail">
                <div class="tg-dashboardcontent">
                    <h3>Contact Detail</h3>
                    <div class="tg-content">
                        <ul class="tg-liststyle">
                            <li><span>Name</span></li>
                            <li><span>{{ auth()->user()->name }}</span></li>
                            <li><span>Email Address</span></li>
                            <li><span>{{ auth()->user()->email }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tg-box tg-billingdetail">
                <div class="tg-dashboardcontent">
                    <h3>Instructions</h3>
                    <div class="tg-content">
                        @if(isset($tripay['qr_url']))
                            <center><img src="{{ $tripay['qr_url'] }}" width="180px" class="align-items-center"></center>
                        @endif
                        <ul>
                            @foreach($tripay['instructions'][0]['steps'] as $step)
                            <li>{!! $step !!}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tg-box tg-travellerprice">
                <div class="tg-dashboardcontent">
                    <div class="tg-widgetpersonprice">
                        <div class="tg-widgetcontent">
                            <ul>
                                <li class="tg-personprice">
                                    <div class="tg-perperson"><span>Price {{ $booking->type }}</span><em>Rp{{ number_format($price, 2) }}</em>
                                    </div>
                                </li>
                                <li><span>Number of Person</span><em>{{ number_format($booking->number_of_person) }}</em></li>
                                <li class="tg-totalprice">
                                    <div class="tg-totalpayment"><span>Total
                                            Price</span><em>{{ number_format($booking->total, 2) }}</em></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
