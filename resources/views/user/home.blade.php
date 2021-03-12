@extends('user.layouts.main')

@section('content')
<div id="tg-homebannerslider" class="tg-homebannerslider tg-haslayout">
    <div id="tg-homeslider" class="tg-homeslider tg-homeslidervtwo owl-carousel tg-haslayout">
        @foreach($sliders as $row)
        <figure class="item" data-vide-bg="poster: {{ asset($row->image) }}" data-vide-options="position: 0% 50%">
            <figcaption>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                            <div class="tg-slidercontent">
                                <h1>{{ $row->title }}</h1>
                                <h2>{{ $row->description }}</h2>
                                @if(!empty($row->url))
                                <a class="tg-btn" href="{{ $row->url }}"><span>Explore Tour</span></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </figcaption>
        </figure>
        @endforeach
    </div>
    <div class="tg-findtour">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <form class="tg-formtheme tg-formtrip">
                        <fieldset>
                            <div class="form-group">
                                <div class="tg-select">
                                    <select class="selectpicker" data-live-search="true" data-width="100%" name="from_code">
                                        <option data-tokens="Destinations">Destinations</option>
                                        @foreach($airport as $row)
                                        <option value="{{ $row->id }}" data-tokens="{{ $row->name.', '.$row->city }}">{{ $row->name.', '.$row->city }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="tg-select">
                                    <select class="selectpicker" data-live-search="true" data-width="100%" name="destination_code">
                                        <option data-tokens="Destinations">Destinations</option>
                                        @foreach($airport as $row)
                                        <option value="{{ $row->id }}" data-tokens="{{ $row->name.', '.$row->city }}">{{ $row->name.', '.$row->city }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="tg-select">
                                    <select class="selectpicker" data-live-search="true" data-width="100%">
                                        <option data-tokens="Travel Month">Travel Month</option>
                                        <option data-tokens="January">January</option>
                                        <option data-tokens="February">February</option>
                                        <option data-tokens="March">March</option>
                                        <option data-tokens="April">April</option>
                                        <option data-tokens="May">May</option>
                                        <option data-tokens="June">June</option>
                                        <option data-tokens="July">July</option>
                                        <option data-tokens="August">August</option>
                                        <option data-tokens="September">September</option>
                                        <option data-tokens="October">October</option>
                                        <option data-tokens="November">November</option>
                                        <option data-tokens="December">December</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="tg-select">
                                    <select class="selectpicker" data-live-search="true" data-width="100%">
                                        <option data-tokens="Duration">Duration</option>
                                        <option data-tokens="2 weeks">2 weeks</option>
                                        <option data-tokens="3 weeks">3 weeks</option>
                                        <option data-tokens="4 weeks">4 weeks</option>
                                        <option data-tokens="5 weeks">5 weeks</option>
                                        <option data-tokens="6 weeks">6 weeks</option>
                                        <option data-tokens="7 weeks">7 weeks</option>
                                        <option data-tokens="8 weeks">8 weeks</option>
                                        <option data-tokens="9 weeks">9 weeks</option>
                                        <option data-tokens="10 weeks">10 weeks</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="tg-btn" type="submit"><span>find tours</span></button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<main id="tg-main" class="tg-main tg-haslayout">
   <section class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="tg-sectionhead tg-sectionheadvtwo">
                    <div class="tg-sectiontitle">
                        <h2>Popular Tours</h2>
                    </div>
                    <div class="tg-description">
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam consectetuer</p>
                    </div>
                </div>
                <div id="tg-populartoursslider" class="tg-populartoursslider tg-populartours owl-carousel">
                    @foreach($tours as $row)
                    <div class="item tg-populartour">
                        <figure>
                            <a href="javascript:void(0);"><img src="{{ asset($row->image) }}"
                                alt="image destinations">
                            </a>
                            @if($loop->iteration <= 2)
                            <span class="tg-descount">Best Deal</span>
                            @endif
                        </figure>
                        <div class="tg-populartourcontent">
                            <div class="tg-populartourtitle">
                                <h3><a href="javascript:void(0);">{{ $row->title }}</a></h3>
                            </div>
                            <div class="tg-description">
                                <p>{{ $row->description }}</p>
                            </div>
                            <div class="tg-populartourfoot">
                                <div class="tg-durationrating">
                                    <span class="tg-tourduration">7 Days</span>
                                </div>
                                <div class="tg-pricearea">
                                    {{-- <del>$2,800</del> --}}
                                    <h4>IDR {{ number_format($row->schedulle->economy_price) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="tg-parallax" data-appear-top-offset="600" data-parallax="scroll"
    data-image-src="{{ asset(Setting('bg-feature-image')->image) }}">
        <div class="tg-sectionspace tg-zerobottompadding tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="tg-sectionhead tg-sectionheadvtwo">
                            <div class="tg-sectiontitle">
                                <h2>What makes these trips different?</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-push-2">
                        <figure class="tg-videobox">
                            <img src="{{ asset(Setting('feature-image')->image) }}" alt="image description">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tg-sectionspace tg-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-sectionhead tg-sectionheadvtwo">
                        <div class="tg-sectiontitle">
                            <h2>Top Destinations</h2>
                        </div>
                        <div class="tg-description">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam consectetuer.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-themetabs">
                        <ul class="tg-themetabnav">
                            <li>
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('images/countrysign/img-01.png') }}" alt="image description">
                                    <strong>America</strong>
                                    <span>Statue of Liberty</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('images/countrysign/img-02.png') }}" alt="image description">
                                    <strong>Australia</strong>
                                    <span>Sydney Opera House</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('images/countrysign/img-03.png') }}" alt="image description">
                                    <strong>Italy</strong>
                                    <span>Colosseum</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('images/countrysign/img-04.png') }}" alt="image description">
                                    <strong>London</strong>
                                    <span>Gib Ben</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('images/countrysign/img-05.png') }}" alt="image description">
                                    <strong>India</strong>
                                    <span>Great Taj Mahal</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('images/countrysign/img-06.png') }}" alt="image description">
                                    <strong>Russia</strong>
                                    <span>Saint Basil's Cathedral</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tg-themetabcontent">
                            <div class="tg-topdestinations">
                                <div class="row">
                                    @foreach($tours as $row)
                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                        <div class="tg-topdestination">
                                            <figure>
                                                <a href="javascript:void(0);" class="tg-btnviewall">View All Tours</a>
                                                <a href="javascript:void(0);"><img src="{{ asset($row->image) }}"
                                                    alt="image description"></a>
                                                <figcaption>
                                                    <h2><a href="javascript:void(0);">{{ $row->schedulle->destination->name }}</a></h2>
                                                    <span class="tg-totaltours">{{ $row->schedulle->transportation->name }}</span>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tg-parallax" data-appear-top-offset="600" data-parallax="scroll"
        data-image-src="{{ asset(Setting('bg-step-image')->image) }}">
        <div class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="tg-features">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="tg-feature">
                                <div class="tg-featuretitle">
                                    <h2><span>01</span><a href="javascript:void(0);">Find Ticket</a></h2>
                                </div>
                                <div class="tg-description">
                                    <p>Search for flight tickets very easily on the website and in our android app.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="tg-feature">
                                <div class="tg-featuretitle">
                                    <h2><span>02</span><a href="javascript:void(0);">Pay</a></h2>
                                </div>
                                <div class="tg-description">
                                    <p>Pay according to nominal to continue booking air tickets temporarily.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="tg-feature">
                                <div class="tg-featuretitle">
                                    <h2><span>03</span><a href="javascript:void(0);">Scan</a></h2>
                                </div>
                                <div class="tg-description">
                                    <p>Scan your temporary flight ticket at the airport and will be replaced with the actual flight ticket.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@section('css')
@endsection
@section('js')
<script src="{{ asset('js/main.js') }}"></script>
@endsection