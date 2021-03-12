<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="zxx">
<!--<![endif]-->

<head>
    @include('user.layouts.partials.head')
</head>

<body class="tg-home tg-homevfour">
    {{-- [if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif] --}}
    <!--************************************
				Loader Start
	*************************************-->
    {{-- <div class="loader">
        <div class="span">
            <div class="location_indicator"></div>
        </div>
    </div> --}}
    <!--************************************
				Loader End
	*************************************-->
    <!--************************************
			Mobile Menu Start
	*************************************-->
    @include('user.layouts.partials.mobile-menu')
    <!--************************************
			Mobile Menu End
	*************************************-->
    <!--************************************
			Wrapper Start
	*************************************-->
    <div id="tg-wrapper" class="tg-wrapper tg-haslayout">
        <!--************************************
				Header Start
		*************************************-->
        @include('user.layouts.partials.header')
        <!--************************************
				Header End
		*************************************-->
        @yield('content')
        <!--************************************
				Footer Start
		*************************************-->
        @include('user.layouts.partials.footer')
        <!--************************************
				Footer End
		*************************************-->
    </div>
    <!--************************************
			Wrapper End
	*************************************-->
    <!--************************************
			Search Start
	*************************************-->
    <div id="tg-search" class="tg-search">
        <button type="button" class="close"><i class="icon-cross"></i></button>
        <form>
            <fieldset>
                <div class="form-group">
                    <input type="search" name="search" class="form-control" value="" placeholder="search here">
                    <button type="submit" class="tg-btn"><span class="icon-search2"></span></button>
                </div>
            </fieldset>
        </form>
        <ul class="tg-destinations">
            <li>
                <a href="javascript:void(0);">
                    <h3>Europe</h3>
                    <em>(05)</em>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <h3>Africa</h3>
                    <em>(15)</em>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <h3>Asia</h3>
                    <em>(12)</em>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <h3>Oceania</h3>
                    <em>(02)</em>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <h3>North America</h3>
                    <em>(08)</em>
                </a>
            </li>
        </ul>
    </div>
    <!--************************************
			Search End
	*************************************-->
    @include('user.layouts.partials.script')
</body>

</html>
