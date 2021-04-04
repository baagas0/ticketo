<header id="tg-header" class="tg-header tg-headervtwo tg-headerfixed tg-haslayout">
    <div class="container-fluid">
        <div class="row">
            <strong class="tg-logo"><a href="index.html"><img src="{{ asset(Setting('logo')->image) }}" alt="company logo here"></a></strong>
            <nav class="tg-infonav">
                <ul>
                    <li><i><img src="{{ asset('images/icons/icon-01.png') }}" alt="image destinations"></i><span>{{ wordwrap(Setting('number')->text, 4 , ' ' , true) }}</span></li>
                    @if(auth('user')->check())
                    <li>
                        <a href="{{ route('user.logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                @else
                <li><a href="{{ route('user.login') }}">Login</a></li>
                <li><a href="{{ route('user.register') }}">Register</a></li>
                @endif
                {{-- <li><a href="#tg-search"><img src="{{ asset('images/icons/icon-04.png') }}" alt="image destinations"></a></li> --}}
            </ul>
        </nav>
        <div class="tg-navigationarea">
            <div class="tg-navigationholder">
                <nav id="tg-nav" class="tg-nav">
                    <div class="navbar-header">
                        <a href="#menu" class="navbar-toggle collapsed">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                    </div>
                    <div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="/schedules">Schedules</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
</header>
