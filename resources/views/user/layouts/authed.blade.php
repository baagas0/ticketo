@extends('user.layouts.main')
@section('content')
    <!--************************************
				Inner Banner Start
		*************************************-->
		<section class="tg-parallax tg-innerbanner" data-appear-top-offset="600" data-parallax="scroll" data-image-src="{{ asset(Setting('feature-image')->image) }}">
			<div class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<h1>@yield('title')</h1>
							<h2>From your account dashboard you can view your recent orders</h2>
							<ol class="tg-breadcrumb">
								<li><a href="javascript:void(0);">Home</a></li>
								<li class="tg-active">@yield('title')</li>
							</ol>
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
		<main id="tg-main" class="tg-main tg-sectionspace tg-haslayout">
			<div class="container">
				<div class="row">
					<div id="tg-twocolumns" class="tg-twocolumns">
						<form class="tg-formtheme tg-formdashboard">
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
								<aside id="tg-sidebar" class="tg-sidebar">
									<div class="tg-widget tg-widgetdashboard">
										<div class="tg-widgettitle">
											<h3>My Account</h3>
										</div>
										<div class="tg-widgetcontent">
											<ul>
												<li><a href="{{ route('user.home') }}"><i class="icon-user"></i><span>Dashboard</span></a></li>

												<li>
													<a href="https://gravatar.com" target="__blank"><i class="icon-pen2"></i><span>Edit Avatar</span></a>
												</li>

												<li><a href="{{ route('user.booking.index') }}"><i class="icon-basket3"></i><span>My Booking</span></a></li>

												<li><a href="{{ route('user.logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    <i class="icon-lock"></i><span>Sign Out</span></a></li>
											</ul>
										</div>
									</div>
								</aside>
							</div>
							<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
								@yield('body')
							</div>
						</form>
					</div>
				</div>
			</div>
		</main>
		<!--************************************
				Main End
		*************************************-->
@endsection
