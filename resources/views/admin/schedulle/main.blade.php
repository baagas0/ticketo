@extends('admin.layouts.app')
@section('title', 'Flight Schedule Data')
@section('content')
<?php
use App\Transportation;
use App\Airport;
use Carbon\Carbon;
?>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="row mb-2">
					<div class="col-md-6">
						<h4 class="card-title">Flight Schedulle Data</h4>
					</div>
					<div class="col-md-6">
						<a href="{{ route('admin.schedulle.add') }}" class="btn btn-primary float-right">Add New Data</a>
					</div>
				</div>
				{{-- <div class="table-responsive"> --}}
					<table id="state-saving-datatable" class="table activate-select dt-responsive nowrap w-100">
						<thead>
							<tr>
								<th>#</th>
								<th>Flight ID</th>
								<th>Plane Name</th>
								<th>Plane Chairs</th>
								<th>Remains Seat</th>
								<th>Flight Date</th>
								<th>Time</th>
								<th>From</th>
								<th>Destination</th>
								<th>Economy Price</th>
								<th>Bussiness Price</th>
								<th>First Price</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $row)
							<?php
							$transportation = Transportation::findOrFail($row->transportation_id);
							$from = Airport::findOrFail($row->from_code);
							$destination = Airport::findOrFail($row->destination_code);
							?>
							<tr class="table-{{ ($row->date > Carbon::parse('now')) ? 'success' : 'danger'}}" id="row{{ $row->id }}">
								<th scope="row" id="control{{ $row->id }}">{{ $loop->iteration }}</th>
								<th scope="row">{{ $row->id }}</th>
								<td>{{ $transportation->name }}</td>
								<td>{{ $transportation->economy_seat.' Economy | '.$transportation->bussiness_seat.' Bussiness | '.$transportation->first_seat.' First' }}</td>
								<td>{{ $transportation->economy_seat.' Economy | '.$transportation->bussiness_seat.' Bussiness | '.$transportation->first_seat.' First' }}</td>
								<td>{{ Carbon::parse($row->date)->format('d M Y') }}</td>
								<td>{{ Carbon::parse($row->date)->format('H:i') }}</td>
								<td>{{ $from->name.' ('.$from->country.')' }}</td>
								<td>{{ $destination->name.' ('.$destination->country.')' }}</td>
								<td>IDR {{ number_format($row->economy_price) }}</td>
								<td>IDR {{ number_format($row->bussiness_price) }}</td>
								<td>IDR {{ number_format($row->first_price) }}</td>
								<td>
									<a href="{{ route('admin.schedulle.update', $row->id) }}" class="mr-3 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
										<i class="mdi mdi-pencil font-size-18"></i>
									</a>

									<a href="#" class="text-danger delete" fieldid="{{ $row->id }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
										<i class="mdi mdi-trash-can font-size-18"></i>
									</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>

				{{-- </div> --}}

			</div>
		</div>
	</div>
	@endsection
	@push('css')
	<!-- Sweet Alert-->
	<link href="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
	@endpush
	@push('js')
	<!-- Required datatable js -->
	<script src="{{ asset('assets/admin/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets/admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

	<!-- Buttons examples -->
	<script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
	<script src="{{ asset('assets/admin/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('assets/admin/libs/jszip/jszip.min.js') }}"></script>
	<script src="{{ asset('assets/admin/libs/pdfmake/build/pdfmake.min.js') }}"></script>
	<script src="{{ asset('assets/admin/libs/pdfmake/build/vfs_fonts.js') }}"></script>
	<script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
	<script src="{{ asset('assets/admin/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

	<!-- Sweet Alerts js -->
	<script src="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.js') }}"></script>

	<!-- Responsive examples -->
	<script src="{{ asset('assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('assets/admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

	<!-- Datatable init js -->
	<script src="{{ asset('assets/admin/js/pages/datatables.init.js') }}"></script>

	<script>
		(function ($) {
			$('.table').on('click', '.delete', function() {
				// alert('asd');
				var id = $(this).attr("fieldid");
				Swal.fire({
					title: 'Are you sure?',
					text: "You won't be able to revert this!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor:"#34c38f",
					cancelButtonColor:"#ff3d60",
					confirmButtonText: 'Yes, delete it!'
				}).then((result) => {
					if (result.isConfirmed) {
						$.ajax({
							url: '{{ route('admin.schedulle.delete') }}/'+id,
							type: 'POST',
							success: function(result){
								toastr["success"](result, "Success");
								$('#control'+id).trigger("click");
								$('#row'+id).hide();
							},
							error: function(error){
								toastr["error"](error, "Failed");
							}
						});
					}
				})
			});
		})(jQuery);
	</script>
@endpush