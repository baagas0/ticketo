@extends('admin.layouts.app')
@section('title', 'International Airport Data')
@section('content')
<?php
use App\Booking;
?>
<div class="row">
	<div class="col-xl-8">
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<div class="media">
							<div class="media-body overflow-hidden">
								<p class="text-truncate font-size-14 mb-2">Number of Sales</p>
								<h4 class="mb-0">{{ $numberOfSales }}</h4>
							</div>
							<div class="text-primary">
								<i class="ri-stack-line font-size-24"></i>
							</div>
						</div>
					</div>

					<div class="card-body border-top py-3">
						<div class="text-truncate">
							<span class="text-muted ml-2">Jumlah penjualan tiket</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<div class="media">
							<div class="media-body overflow-hidden">
								<p class="text-truncate font-size-14 mb-2">Sales Revenue</p>
								<h4 class="mb-0">IDR {{ number_format($salesRevenue) }}</h4>
							</div>
							<div class="text-primary">
								<i class="ri-store-2-line font-size-24"></i>
							</div>
						</div>
					</div>
					<div class="card-body border-top py-3">
						<div class="text-truncate">
							<span class="text-muted ml-2">Jumlah pendapatan</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<div class="media">
							<div class="media-body overflow-hidden">
								<p class="text-truncate font-size-14 mb-2">Average Revenue</p>
								<h4 class="mb-0">IDR {{ number_format($averageRevenue) }}</h4>
							</div>
							<div class="text-primary">
								<i class="ri-briefcase-4-line font-size-24"></i>
							</div>
						</div>
					</div>
					<div class="card-body border-top py-3">
						<div class="text-truncate">
							<span class="text-muted ml-2">Rata rata pendapatan</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end row -->

		<div class="card">
			<div class="card-body">
				<div class="float-right d-none d-md-inline-block">
					<div class="btn-group mb-2">
						<button type="button" class="btn btn-sm btn-light">Today</button>
						<button type="button" class="btn btn-sm btn-light active">Weekly</button>
						<button type="button" class="btn btn-sm btn-light">Monthly</button>
					</div>
				</div>
				<h4 class="card-title mb-4">Revenue Analytics</h4>
				<div>
					<div id="revenue-analytics" class="apex-charts" dir="ltr"></div>
				</div>
			</div>

			<div class="card-body border-top text-center">
				<div class="row">
					<div class="col-sm-4"></div>

					<div class="col-sm-4">
						<div class="mt-4 mt-sm-0">
							<p class="mb-2 text-muted text-truncate">
								<i class="mdi mdi-circle text-success font-size-10 mr-1">
								</i> Revenue On This Year :</p>
							<div class="d-inline-flex">
								<h5 class="mb-0">$ 32,695</h5>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="mt-4 mt-sm-0">
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-4">

		<div class="card">
			<div class="card-body">

				<h4 class="card-title mb-4">Earning Reports</h4>
				<div class="text-center">
					<div class="row">
						<div class="col-sm-6">
							<div>
								<div class="mb-3">
									<div id="weekly-earning" class="apex-charts"></div>
								</div>

								<p class="text-muted text-truncate mb-2">Weekly Earnings</p>
								<h5 class="mb-0">IDR {{ number_format($weeklyEarning) }}</h5>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="mt-5 mt-sm-0">
								<div class="mb-3">
									<div id="montly-earning" class="apex-charts"></div>
								</div>

								<p class="text-muted text-truncate mb-2">Monthly Earnings</p>
								<h5 class="mb-0">IDR {{ number_format($monthEarning) }}</h5>
							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-body">

				<h4 class="card-title mb-4">Ticket Reports</h4>
				<div class="text-center">
					<div class="row">
						@foreach($schedulles as $schedulle)
						<div class="col-sm-6">
							<div>
								<div class="mb-3">
									<div id="schedulle{{ $schedulle->id }}" class="apex-charts"></div>
								</div>

								<p class="text-muted text-truncate mb-2">{{ Str::limit($schedulle->destination->name, 14) }}</p>
								<h5 class="mb-0">IDR {{ number_format($schedulle['amount']) }}</h5>
							</div>
							<hr>
						</div>
						@endforeach
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- end row -->

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">

				<h4 class="card-title mb-4">Latest Transactions</h4>

				<div class="table-responsive">
					<table class="table table-centered datatable dt-responsive nowrap" data-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
						<thead class="thead-light">
							<tr>
								<th style="width: 20px;">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="ordercheck">
										<label class="custom-control-label" for="ordercheck">&nbsp;</label>
									</div>
								</th>
								<th>Code</th>
                                <th>Reference</th>
                                <th>User</th>
                                <th>Payment</th>
                                <th>Schedule</th>
                                <th>Status</th>
							</tr>
						</thead>
						<tbody>
							@foreach($tickets as $ticket)
							<tr>
								<td>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="ordercheck1">
										<label class="custom-control-label" for="ordercheck1">&nbsp;</label>
									</div>
								</td>

								<td><a href="javascript: void(0);" class="text-dark font-weight-bold">#{{ $ticket->code }}</a> </td>
								<td>{{ $ticket->reference }}</td>
                                <td>{{ $ticket->user->name }}</td>
                                <td>{{ $ticket->payment->name }}</td>
                                <td>{{ $ticket->schedulle->id }}</td>
								<td>
									<div class="badge badge-soft-success font-size-12">{{ $ticket->approval }}</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end row -->
@endsection
@push('css')
<!-- jquery.vectormap css -->
<link href="{{ asset('assets/admin/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
@endpush
@push('js')
<!-- apexcharts -->
<script src="{{ asset('assets/admin/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- jquery.vectormap map -->
<script src="{{ asset('assets/admin/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}"></script>

<!-- Required datatable js -->
<script src="{{ asset('assets/admin/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

<!-- Responsive examples -->
<script src="{{ asset('assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

{{-- <script src="{{ asset('assets/admin/js/pages/dashboard.init.js') }}"></script> --}}

<script>
	// Revenue Analytics
	var options = {
		series: [
			<?php
				foreach (revenue() as $i) {
				$data = json_encode([$i[1],$i[2],$i[3],$i[4],$i[5],$i[6],$i[7],$i[8],$i[9],$i[10],$i[11],$i[12]]);
			?>
				{ name: "{{ $i['year'] }}", type: "column", data: {{ $data}} },
			<?php } ?>
		],
		chart: { height: 280, type: "line", toolbar: { show: !1 } },
		stroke: { width: [0, 3, 3], curve: "smooth" },
		plotOptions: { bar: { horizontal: !1, columnWidth: "20%" } },
		dataLabels: { enabled: !1 },
		legend: { show: !1 },
		colors: ["#5664d2", "#1cbb8c", "#d33434"],
		labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]

	},

	chart = new ApexCharts(document.querySelector("#revenue-analytics"), options);
	chart.render();

	// Earnings Report
	var radialoptions = { series: [100], chart: { type: "radialBar", wight: 60, height: 60, sparkline: { enabled: !0 } }, dataLabels: { enabled: !1 }, colors: ["#e84545"], stroke: { lineCap: "round" }, plotOptions: { radialBar: { hollow: { margin: 0, size: "70%" }, track: { margin: 0 }, dataLabels: { show: !1 } } } },
	radialchart = new ApexCharts(document.querySelector("#weekly-earning"), radialoptions);
	radialchart.render();
	(radialchart = new ApexCharts(document.querySelector("#montly-earning"), radialoptions)).render();

	// Ticket Report
	@foreach($schedulles as $schedulle)
		var schedulleoptions = { series: [100], chart: { type: "radialBar", wight: 60, height: 60, sparkline: { enabled: !0 } }, dataLabels: { enabled: !1 }, colors: ["#5664d2"], stroke: { lineCap: "round" }, plotOptions: { radialBar: { hollow: { margin: 0, size: "70%" }, track: { margin: 0 }, dataLabels: { show: !1 } } } },
		radialchart = new ApexCharts(document.querySelector("#schedulle{{ $schedulle->id }}"), schedulleoptions);
		radialchart.render();
	@endforeach
</script>
@endpush