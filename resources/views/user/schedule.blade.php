@extends('user.layouts.main')
@section('content')
<!--************************************
				Inner Banner Start
		*************************************-->
<div class="tg-parallax tg-innerbanner" data-appear-top-offset="600" data-parallax="scroll"
    data-image-src="{{ asset($schedule->image) }}">
    <div class="tg-sectionspace tg-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
            </div>
        </div>
    </div>
</div>
<!--************************************
				Inner Banner End
		*************************************-->
<!--************************************
				Main Start
		*************************************-->
<main id="tg-main" class="tg-main tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="tg-content" class="tg-content">
                    <div class="tg-tourbookingdetail">
                        <div class="tg-bookinginfo">
                            <h2>
                                {{ $schedule->from->name }} 
                                    <i class="icon-arrow-right3"></i> 
                                {{ $schedule->destination->name }}</h2>
                            <div class="tg-pricearea">
                                <span>From</span>
                                <h4>IDR {{ number_format($schedule->economy_price) }}<sub>/
                                        person</sub></h4>
                            </div>
                            <div class="tg-description">
                                <p>There’s only 5 spot left. Join 19 others at Travelu’s experience this Saturday.</p>
                            </div>
                            <form name="checkout" id="checkout" class="tg-formtheme tg-formbookingdetail float-right" method="GET"
                                action="{{ route('user.booking.checkout', $schedule->id) }}">
                                <fieldset>
                                    <div class="form-group">
                                        <div class="tg-formicon"><i class="icon-users"></i></div>
                                        <span class="tg-select">
                                            <select name="type" class="selectpicker" data-live-search="true" data-width="100%" required="">
                                                <option disabled selected>Type</option>
                                                <option data-tokens="Economy">Economy</option>
                                                <option data-tokens="Bussiness">Bussiness</option>
                                                <option data-tokens="Bussiness">First</option>
                                            </select>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <div class="tg-formicon"><i class="icon-users"></i></div>
                                        <span class="tg-select">
                                            <select name="number_of_person" class="selectpicker" data-live-search="true" data-width="100%" required="">
                                                <option disabled selected>Number of Person</option>
                                                <option data-tokens="1">1</option>
                                                <option data-tokens="2">2</option>
                                                <option data-tokens="4">4</option>
                                                <option data-tokens="5">5</option>
                                                <option data-tokens="6">6</option>
                                                <option data-tokens="10">10</option>
                                            </select>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="tg-btn tg-btn-lg"><span>proceed
                                                boking</span></button>
                                    </div>
                                </fieldset>
                            </form>
                            <ul class="tg-tripinfo">
                                <li><span class="tg-tourduration">{{ \Carbon\Carbon::parse($schedule->date)->format('d M Y H:i') }}</span></li>
                                <li><span class="tg-tourduration tg-availabilty">Economy:
                                        IDR {{ number_format($schedule->economy_price, 2) }}</span>
                                </li>
                                <li><span class="tg-tourduration tg-location">Bussiness:
                                        IDR {{ number_format($schedule->bussiness_price, 2) }}</span></span>
                                </li>
                                <li><span class="tg-tourduration tg-peoples">First:
                                        IDR {{ number_format($schedule->first_price, 2) }}</span></span>
                                </li>
                            </ul>
                            <div class="tg-refundshare">
                                <div class="tg-refund">
                                    <figure><img src="/images/img-03.jpg" alt="image description"></figure>
                                    <div class="tg-refundinfo">
                                        <h3>100% refundable</h3>
                                        <div class="tg-description">
                                            <p>Cancel up to 12 days before your trip and get a full refund, including
                                                service fees.</p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="tg-sectionspace tg-haslayout">
                            <div class="tg-themetabs tg-bookingtabs">
                                <ul class="tg-themetabnav" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#overview" aria-controls="overview" role="tab" data-toggle="tab">
                                            <span>Overview</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content tg-themetabcontent">
                                    <div role="tabpanel" class="tab-pane active tg-overviewtab" id="overview">
                                        <div class="tg-bookingdetail">
                                            <div class="tg-box">
                                                <h2>About this listing</h2>
                                                <div class="tg-description">
                                                    <p>Get cheap airfare for round-trip flights to your favorite destinations. The Smart Trip feature from tiket.com makes it easier for you to find PP flight ticket combinations without having to search twice.</p>
                                                    <p>Apart from being a mainstay for you to order cheap flight tickets and promo flight tickets, tiket.com's Simple Reschedule feature can also make it easier for you to make rescheduling requests for the flight of your choice.</p>
                                                </div>
                                            </div>
                                            <div class="tg-box">
                                                <h2>Guest access</h2>
                                                <div class="tg-description">
                                                    <p>Enjoy free services that we provide just for you.</p>
                                                    <p>To get extra services while traveling, you can order gold tickets on our platform.</p>
                                                    <ul class="tg-liststyle">
                                                        <li><span>Luggage 7kg</span></li>
                                                        <li><span>Free appetizers</span></li>
                                                        <li><span>1x Drink (Coffee, Lemon Tea, Green Tea, Nutrisari)</span></li>
                                                        <li><span>Free live view from above</span></li>
                                                        <li><span>Accident insurance (Max 25 million / person)</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tg-bookingdetail tg-bookingdetailstyle">
                                            <div class="tg-box tg-amentities">
                                                <h3>Amenities</h3>
                                                <div class="tg-content">
                                                    <ul class="tg-liststyle">
                                                        <li><span>Pets allowed</span></li>
                                                        <li><span>Internet</span></li>
                                                        <li><span>Gym</span></li>
                                                        <li><span>Hot tub</span></li>
                                                        <li><span>Doorman</span></li>
                                                        <li><span>Wheelchair accessible</span></li>
                                                        <li><span>Pool</span></li>
                                                    </ul>
                                                    <ul class="tg-liststyle">
                                                        <li><span>Kitchen</span></li>
                                                        <li><span>Suitable for events</span></li>
                                                        <li><span>Dryer</span></li>
                                                        <li><span>Family/kid friendly</span></li>
                                                        <li><span>Cable TV</span></li>
                                                        <li><span>Wireless Internet</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tg-bookingdetail tg-bookingdetailstyle">
                                            <div class="tg-box tg-priceinclude">
                                                <h3>Price Includes</h3>
                                                <div class="tg-content">
                                                    <ul class="tg-liststyle">
                                                        <li><span>PPN Tax 10%</span></li>
                                                        <li><span>soft footwear</span></li>
                                                        <li><span>Pramugari Service</span></li>
                                                        <li><span>comfortable seating</span></li>
                                                        <li><span>the latest news magazine</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tg-bookingdetail tg-bookingdetailstyle">
                                            <div class="tg-box tg-amentities">
                                                <h3>Tour Rules</h3>
                                                <div class="tg-content">
                                                    <div class="tg-description">
                                                        <p>Passengers are prohibited from turning off airplane mode in their respective devices, are prohibited from taking pictures or taking pictures while in the air or on the plane.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!--************************************
				Main End
		*************************************-->
@endsection
