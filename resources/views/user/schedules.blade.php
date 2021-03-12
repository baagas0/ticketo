@extends('user.layouts.main')
@section('content')
<!--************************************
				Inner Banner Start
		*************************************-->
<section class="tg-parallax tg-innerbanner" data-appear-top-offset="600" data-parallax="scroll"
    data-image-src="{{ Setting('feature-image')->image }}">
    <div class="tg-sectionspace tg-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h1>Schedule List</h1>
                    <ol class="tg-breadcrumb">
                        <li><a href="javascript:void(0);">Home</a></li>
                        <li class="tg-active">Schedule</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="tg-findtour">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <form class="tg-formtheme tg-formtrip">
                        <fieldset>
                            <div class="form-group">
                                <div class="tg-select">
                                    <select class="selectpicker" data-live-search="true" data-width="100%" name="from_code" required="">
                                        <option disabled selected data-tokens="Destinations">Destinations</option>
                                        @foreach($airport as $row)
                                        <option {{ (request()->get('from_code') == $row->id ) ? 'selected' : '' }} value="{{ $row->id }}" data-tokens="{{ $row->name.', '.$row->city }}">{{ $row->name.', '.$row->city }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="tg-select">
                                    <select class="selectpicker" data-live-search="true" data-width="100%" name="destination_code" required="">
                                        <option disabled selected data-tokens="Destinations">Destinations</option>
                                        @foreach($airport as $row)
                                        <option {{ (request()->get('destination_code') == $row->id ) ? 'selected' : '' }} value="{{ $row->id }}" data-tokens="{{ $row->name.', '.$row->city }}">{{ $row->name.', '.$row->city }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="tg-select">
                                    <select class="selectpicker" data-live-search="true" data-width="100%" name="transportation">
                                        <option value="" data-tokens="Destinations">Transportation</option>
                                        @foreach($transportation as $row)
                                        <option {{ (request()->get('destination_code') == $row->id ) ? 'selected' : '' }} value="{{ $row->id }}" data-tokens="{{ $row->name }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="date" style="height: 50px!important" placeholder="Date">
                            </div>
                            <div class="form-group">
                                <button class="tg-btn" type="submit"><span>find ticket</span></button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--************************************
				Inner Banner End
		*************************************-->
<!--************************************
				Main Start
		*************************************-->
<main id="tg-main" class="tg-main tg-haslayout" style="padding: 80px 0">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="tg-content" class="tg-content">
                    <div class="tg-listing tg-listingvtwo">
                        <div class="tg-sectiontitle">
                            <h2>Schedule</h2>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            @foreach ($schedules as $schedule)
                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                <div class="tg-trendingtrip">
                                    <figure>
                                        <a href="{{ route('schedule', $schedule->id) }}">
                                            <img src="{{ asset($schedule->image) }}" alt="image destinations" class="image-responsive" style="width: 400px; height: 200px">
                                            <div class="tg-hover">
                                                <span class="tg-tourduration"> {{ \Carbon\Carbon::parse($schedule->date)->format('d M Y H:i') }} </span>
                                                <span class="tg-locationname">{{ $schedule->transportation->name }}</span>
                                                <div class="tg-pricearea">
                                                    <span>from</span>
                                                    <h4>{{ number_format($schedule->economy_price) }}</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </figure>
                                    <div class="tg-populartourcontent">
                                        <div class="tg-populartourtitle">
                                            <h3><a href="{{ route('schedule', $schedule->id) }}">{{ $schedule->from->city }} 
                                    <i class="icon-arrow-right3"></i> 
                                {{ $schedule->destination->city }}</h2></a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="clearfix"></div>
                            {{ $schedules->links('vendor.pagination.custom') }}
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
