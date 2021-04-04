@extends('admin.layouts.app')
@section('title', 'International Airport Data')
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">

				<h4 class="card-title">Airport Data</h4>
				<p class="card-title-desc">Defauld airport data in the world.
				</p>

				<table id="datatable-ajax" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
					
				</table>

			</div>
		</div>
	</div> <!-- end col -->
</div> <!-- end row -->
@endsection
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

<script src="{{ asset('assets/admin/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>

<!-- Responsive examples -->
<script src="{{ asset('assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

<!-- Datatable init js -->
<script src="{{ asset('assets/admin/js/pages/datatables.init.js') }}"></script>
<script>
	$('#datatable-ajax').DataTable({
		"processing": true,
		// "serverSide": true,
		ajax: {
			url: "{{ route('admin.ajax.airport') }}",
			type: 'POST',

			dataSrc: function(d) {
				var data = [];
				for (var item in d) {
					data.push(d[item])
				}
				return data 
			}
		},
		columns: [
			{ data:"id", title: "id" },
			{ data:"name", title: "Name" },
			{ data:"city", title: "City" },
			{ data:"country", title: "Country Code" },
			{ data:"iataCode", title: "Iata Code" },
			{ data:"_geolocLat", title: "Langtitude" },
			{ data:"_geolocLng", title: "Longtitude" },
		]
		
	});
</script>
@endpush