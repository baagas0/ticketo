@extends('user.layouts.main')
@section('title', 'Booking')
@section('content')
<section class="tg-parallax tg-innerbanner" data-appear-top-offset="600" data-parallax="scroll"
    data-image-src="{{ asset($schedule->image) }}">
    <div class="tg-sectionspace tg-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h1>Billing Details</h1>
                    <h2>With Automatic Payment Validation</h2>
                    <ol class="tg-breadcrumb">
                        <li><a href="javascript:void(0);">Home</a></li>
                        <li class="tg-active">Billing Detail</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<main id="tg-main" class="tg-main tg-haslayout">
    <div class="tg-sectionspace tg-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div id="tg-content" class="tg-content">
                        <div class="tg-billingdetail">
                            <form class="tg-formtheme tg-formbillingdetail" method="POST" action="{{ route('user.booking.pay', $schedule->id) }}">
                                @csrf

                                <fieldset>
                                    <div class="tg-bookingdetail">
                                        <div class="tg-box">
                                            <div class="tg-heading">
                                                <h3>Billing Details</h3>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="form-group">
                                                        <label>Name <sup>*</sup></label>
                                                        <input type="text" value="{{ auth()->user()->name }}" disabled
                                                            class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label>Phone <sup>*</sup></label>
                                                                <input type="text" disabled
                                                                value="{{ auth()->user()->phone }}" class="form-control"
                                                                placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label>Email <sup>*</sup></label>
                                                                <input type="text" disabled
                                                                value="{{ auth()->user()->email }}" class="form-control"
                                                                placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label>From <sup>*</sup></label>
                                                                <input type="text" disabled
                                                                    value="{{ $schedule->from->name.', '.$schedule->from->city }}" class="form-control"
                                                                    placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label>Destination <sup>*</sup></label>
                                                                <input type="text" disabled
                                                                    value="{{ $schedule->destination->name.', '.$schedule->destination->city }}" class="form-control"
                                                                    placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tg-bookingdetail">
                                        <div class="tg-box tg-addtionalinfo">
                                            <div class="tg-heading">
                                                <h3>Additional Information</h3>
                                            </div>
                                            <div class="tg-widgetpersonprice">
                                                <div class="tg-widgetcontent">
                                                    <ul>
                                                        <li class="tg-personprice">
                                                            <div class="tg-perperson"><span>Price {{ $type }}</span><em>IDR {{ number_format($price, 2) }}</em>
                                                            </div>
                                                        </li>
                                                        <li><span>Number of Person</span><em>{{ number_format($person) }} Person</em></li>
                                                        <li class="tg-totalprice">
                                                            <div class="tg-totalpayment"><span>Total
                                                                    Price</span><em>IDR {{ number_format($total, 2) }}</em></div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="tg-paymentarea">
                                    <h3>Payment Method</h3>
                                    <div id="tg-accordion" class="tg-accordion" role="tablist"
                                        aria-multiselectable="true">
                                        @foreach($payments as $payment)
                                        <div class="tg-panel">
                                            <h4 class="tg-radio">
                                                <input type="radio" id="{{ Str::snake($payment->name) }}" name="payment_id" value="{{ $payment->id }}">
                                                <label for="{{ Str::snake($payment->name) }}">{{ $payment->name }}</label>
                                            </h4>
                                        </div>
                                        @endforeach
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <input type="hidden" name="type" value="{{ $type }}">
                                    <input type="hidden" name="number_of_person" value="{{ $person }}">
                                    <input type="hidden" name="total" value="{{ $total }}">
                                    <button class="tg-btn" type="submit"><span>place order</span></button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
