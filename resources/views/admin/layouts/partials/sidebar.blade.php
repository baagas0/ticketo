<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-title">Orders</li>
                <li>
                    <a href="{{ route('admin.booking') }}" class="waves-effect">
                        <i class="ri-bookmark-3-line"></i>
                        <span>Ticket</span>
                    </a>
                </li>

                <li style="display: none;">
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="ri-shopping-cart-2-line"></i><span class="badge badge-pill badge-success float-right">3</span>
                        <span>Ticket</span>
                    </a>
                </li>

                <li class="menu-title">Data</li>

                <li>
                    <a hidden="" href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="ri-road-map-line"></i>
                        <span>Rute</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.schedulle') }}" class="waves-effect">
                        <i class="ri-timer-flash-line"></i>
                        <span>Schedulle</span>
                    </a>
                </li>

                <li class="menu-title">Master Data</li>

                <li>
                    <a href="{{ route('admin.airport') }}" class="waves-effect">
                        <i class="ri-flight-takeoff-line"></i>
                        <span>Airport</span>
                    </a>

                <li>
                    <a href="{{ route('admin.transportation') }}" class="waves-effect">
                        <i class="ri-plane-line "></i>
                        <span>Transportation</span>
                    </a>
                </li>

                <li hidden="">
                    <a href="{{ route('admin.type-transportation') }}" class="waves-effect">
                        <i class="ri-passport-line"></i>
                        <span>Type Transportation</span>
                    </a>
                </li>

                <li class="menu-title">Payment</li>

                <li>
                    <a href="{{ route('admin.payment') }}" class="waves-effect">
                        <i class="ri-money-cny-circle-line"></i>
                        <span>Payment</span>
                    </a>
                </li>

                {{-- <li class="menu-title">Settings</li>

                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="ri-settings-line"></i>
                        <span>Website</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="ri-notification-badge-line"></i>
                        <span>Notification</span>
                    </a>
                </li> --}}

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
