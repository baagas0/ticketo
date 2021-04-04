<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="UTF-8">
	<title>Boarding: #{{ $booking->code }}</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<style type="text/css" media="all">
		@import url('https://fonts.googleapis.com/css?family=Roboto:100,400');


		html, * {
			box-sizing: border-box;
			font-size: 16px;
		}

		body {
			display: flex;
			align-items: center;
			justify-content: center;
			font-family: 'Roboto', sans-serif;
		}

		img {
			max-width: 100%;  
		}

		.flight-card {
			width: 805px;
			height: 610px;
			border-radius: 35px;
			margin: 10px auto;
			overflow: hidden;
			box-shadow: 0px 0px 5px rgba(0,0,0,0.2);
		}

		.flight-card--header {
			width: 100%;
			height: 230px;
			/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#264b76+0,002c5f+100 */
			background: linear-gradient(to bottom, #264b76 0%,#002c5f 100%);
			padding: 20px 55px;
			border-bottom: 7px solid #6DBE47;
			position: relative;
		}

		.flight-card--header:before {
			content: '';
			position: absolute;
			width: 15px;
			height: 15px;
			background: #fff;
			border-radius: 50px;
			top: 50%;
			left: 0;
			transform: translateY(-50%) translateX(-50%);
		}

		.flight-card--header:after {
			content: '';
			position: absolute;
			width: 15px;
			height: 15px;
			background: #fff;
			border-radius: 50px;
			top: 50%;
			right: 0;
			transform: translateY(-50%) translateX(50%);
		}

		.flight-card--header-logo {
			width: 122px;
			margin: 0 0 20px 0;
		}

		.flight-card--header-details {
			width: 100%;
			height: auto;
			border-top: 3px solid rgba(255,255,255,0.3);
			color: #fff;
		}

		.details-passenger {
			width: 50%;
			float: left;
		}

		.details-depart, .details-arrive {
			width: 25%;
			float: left;
		}

		.detail--title {
			opacity: 0.5;
			display: block;
			margin: 30px 0 0 0;
		}

		.detail--text {
			display: block;
			margin: 5px 0 0 0;
		}

		.flight-card--details {
			padding: 50px 55px;
		}

		.detail-code {
			color: #002C5F;
			font-size: 70px;
			display: block;
			font-weight: 100;
		}

		.detail-city {
			color: #002C5F;

		}

		.bc-from {
			width: 30%;
			float: left;
		}

		.bc-to {
			width: 30%;
			float: right;
			text-align: right;
		}

		.bc-plane {
			width: 40%;
			float: left;
			text-align: center;
			position: relative;
		}

		.bc-plane img {
			width: 20%;
			margin: 20px auto 0 auto;
		}

		.bc-plane:before {
			content: '';
			width: 135px;
			height: 2px;
			background: #efefef;
			position: absolute;
			top: 45px;
			left: -50px;
		}

		.bc-plane:after {
			content: '';
			width: 135px;
			height: 2px;
			background: #efefef;
			position: absolute;
			top: 45px;
			right: -50px;
		}

		.flight-card-details--text {
			width: 100%;
			padding: 80px 0 0 0;
			clear: both;
			overflow: auto;
		}

		.text-left {
			width: 33%;
			float: left;
		}

		.text-middle {
			width: 33%;
			float: left;
			padding: 0 0 0 80px
		}

		.mint {
			position: relative;
		}

		.mint:before {
			content: '';
			position: absolute;
			bottom: 5px;
			right: 40px;
			width: 10px;
			height: 10px;
			background: #6DBE47;
			border-radius: 50%;
		}

		.text-right {
			width: 33%;
			float: right;
			text-align: right;
		}

		.text-hline {
			color: #6a8597;
			text-transform: uppercase;
			display: block;
			letter-spacing: 2px;
		}

		.text-actual {
			color: #002C5F;
			padding: 10px 0 0 0;
			display: block;
		}

		.flight-card-details--admin {
			margin: 50px 0 0 0;
			color: #bdc3c7;
			letter-spacing: 1px;
		}

		.admin-left {
			width: 50%;
			float: left;
		}

		.admin-right {
			width: 50%;
			float: right;
			text-align: right;
		}
	</style>

</head>
<body>
	<!-- partial:index.partial.html -->
	<div class='flight-card'>
		<div class='flight-card--header'>
			<div class='flight-card--header-logo'>
				<img src='{{ asset(Setting('logo')->image) }}'>
			</div>
			<div class='flight-card--header-details'>
				<div class='details-passenger'>
					<span class='detail--title'>
						Passenger
					</span>
					<span class='detail--text'>
						{{ auth()->user()->name }}
					</span>
				</div>
				<div class='details-depart'>
					<span class='detail--title'>
						Departs
					</span>
					<span class='detail--text'>
						{{ $booking->created_at->format('M, d Y') }}
					</span>
				</div>
				<div class='details-arrive'>
					<span class='detail--title'>
						Arrives
					</span>
					<span class='detail--text'>
						{{ Carbon\Carbon::parse($booking->created_at)->addDays('+2')->format('M, d Y') }}
					</span>
				</div>
			</div>
		</div>
		<div class='flight-card--details'>
			<div class='bc-from'>
				<span class='detail-code'>
					{{ $booking->schedulle->from->iataCode }}
				</span>
				<span class='detail-city'>
					{{ $booking->schedulle->from->city }}, {{ $booking->schedulle->from->country }}
				</span>
			</div>
			<div class='bc-plane'>
				<img src='https://cdn.onlinewebfonts.com/svg/img_537856.svg'>
			</div>
			<div class='bc-to'>
				<span class='detail-code'>
					{{ $booking->schedulle->destination->iataCode }}
				</span>
				<span class='detail-city'>
					{{ $booking->schedulle->destination->city }}, {{ $booking->schedulle->destination->country }}
				</span>
			</div>
			<div class='flight-card-details--text'>
				<div class='text-left'>
					<span class='text-hline'>
						Operator
					</span>
					<span class='text-actual'>
						{{ $booking->schedulle->transportation->name }}
					</span>
				</div>
				<div class='text-middle'>
					<span class='text-hline'>
						Flight
					</span>
					<span class='text-actual'>
						TK-{{ $booking->schedulle->id }}
					</span>
				</div>
				<div class='text-right'>
					<span class='text-hline'>
						Class
					</span>
					<span class='text-actual'>
						{{ $booking->type }}
					</span>
				</div>
			</div>
			<div class='flight-card-details--admin'>
				<div class='admin-left'>
					#{{ $booking->code }}
				</div>
				<div class='admin-right'>
					T{{ $booking->payment_id.' '.$booking->schedulle_id }}
				</div>
			</div>
		</div>
	</div>
	<!-- partial -->

</body>
</html>
