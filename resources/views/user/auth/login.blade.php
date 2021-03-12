<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | Ticketo</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.mmenu.all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/prettyPhoto.css') }}">
    <link rel="stylesheet" href="{{ asset('css/transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/color.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <script src="{{ asset('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
</head>
<body onload="body()">
    <a id="tg-btnsignin" href="#tg-loginsingup"></a>

    <div id="tg-loginsingup" class="tg-loginsingup" data-vide-bg="poster: {{ asset(Setting('login-image')->image) }}" data-vide-options="position: 0% 50%">
        <div class="tg-contentarea tg-themescrollbar">
            <div class="tg-scrollbar">
                <div class="tg-logincontent">
                    <nav id="tg-loginnav" class="tg-loginnav">
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">My Wishlist</a></li>
                        </ul>
                    </nav>
                    <div class="tg-themetabs">
                        <ul class="tg-navtbs" role="tablist">
                            <li role="presentation" class="active"><a href="#home" data-toggle="tab">Already Registered</a></li>
                            <li role="presentation"><a href="#profile" data-toggle="tab">New to {{ config('app.name', 'Ticketo') }} ?</a></li>
                        </ul>
                        <div class="tg-tabcontent tab-content">
                            <div role="tabpanel" class="tab-pane active fade in" id="home">
                                <form method="POST" action="{{ route('user.login') }}" class="tg-formtheme tg-formlogin" id="login">
                                    <fieldset>
                                        @csrf
                                        <div class="form-group">
                                            <label>Name or Email <sup>*</sup></label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Password <sup>*</sup></label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="tg-checkbox">
                                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label for="rememberpass">Remember Me</label>
                                            </div>
                                            @if (Route::has('user.password.request'))
                                            <span><a href="{{ route('user.password.request') }}">Lost your password?</a></span>
                                            @endif
                                        </div>
                                        <button type="submit" class="tg-btn tg-btn-lg"><span>Login</span></button>
                                    </fieldset>
                                </form>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                <form class="tg-formtheme tg-formlogin" id="register" method="POST" action="{{ route('user.register') }}">
                                    <fieldset>
                                        @csrf
                                        <div class="form-group">
                                            <label>Name <sup>*</sup></label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Email <sup>*</sup></label>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>phone number <sup>*</sup></label>
                                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="" value="{{ old('phone') }}" required autocomplete="phone">

                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Password <sup>*</sup></label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password <sup>*</sup></label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                        <button type="submit" class="tg-btn tg-btn-lg"><span>Register</span></button>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script src="{{ asset('js/vendor/jquery-library.js') }}"></script>
<script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&language=en"></script>
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/jquery-scrolltofixed.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.mmenu.all.js') }}"></script>
<script src="{{ asset('js/packery.pkgd.min.js') }}"></script>
<script src="{{ asset('js/jquery.vide.min.js') }}"></script>
<script src="{{ asset('js/scrollbar.min.js') }}"></script>
<script src="{{ asset('js/prettyPhoto.js') }}"></script>
<script src="{{ asset('js/countdown.js') }}"></script>
<script src="{{ asset('js/parallax.js') }}"></script>
<script src="{{ asset('js/gmap3.js') }}"></script>

<script>
    function body() {
        $('#tg-btnsignin').trigger('click');
    }

    jQuery('.tg-themescrollbar').mCustomScrollbar({
        axis:"y",
    });

    jQuery('a[href="#tg-loginsingup"]').on('click', function(event) {
        event.preventDefault();
        jQuery('#tg-loginsingup').addClass('open');
        jQuery('body').addClass('tg-hidescroll');
    });
    jQuery('#tg-loginsingup, #tg-loginsingup button.close').on('click keyup', function(event) {
        jQuery('body').removeClass('tg-hidescroll');
        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
            jQuery(this).removeClass('open');
        }
    });
</script>

{{-- <script src="{{ asset('js/main.js') }}"></script> --}}