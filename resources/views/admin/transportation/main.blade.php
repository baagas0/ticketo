@extends('admin.layouts.app')
@section('title', 'Transportation')
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row mb-2">
					<div class="col-md-6">
						<h4 class="card-title">Plane Transportation Data</h4>
					</div>
					<div class="col-md-6">
						<button class="btn btn-primary float-right waves-effect waves-light" data-toggle="modal" data-target="#Addform">Add New Data</button>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table table-editable table-nowrap" id="transportation">
						<thead>
							<tr>
								<th hidden="">ID</th>
								<th>#</th>
								<th>Name</th>
								<th>Economy Seet</th>
								<th>Economy Price</th>
								<th>Bussiness Seet</th>
								<th>Bussiness Price</th>
								<th>First Seet</th>
								<th>First Price</th>
								<th>Action</th>
							</tr>
						</thead>
						@foreach($data as $row)
						<tr id="row{{ $row->id }}">
							<td class="id" hidden="">{{ $row->id }}</td>
							<td>{{ $loop->iteration }}</td>
							<td class="name" data-original-value="{{ $row->name }}">
								<a href="#" data-type="text" data-fieldid="{{ $row->id }}" data-pk="{{ $row->name }}" data-field="name" class="editable" data-url="" data-title="name">{{ $row->name }}</a>
							</td>

							<td class="economy_seat" data-original-value="1">
								<a href="#" data-type="text" data-fieldid="{{ $row->id }}" data-pk="1" class="editable" data-field="economy_seat" data-url="" data-title="Edit Quantity">{{ $row->economy_seat }}</a>
							</td>
							<td class="economy_price" data-original-value="1">
								<a href="#" data-type="text" data-fieldid="{{ $row->id }}" data-pk="1" class="editable" data-field="economy_price" data-url="" data-title="Edit Quantity">{{ $row->economy_price }}</a>
							</td>

							<td class="bussiness_seat" data-original-value="1">
								<a href="#" data-type="text" data-fieldid="{{ $row->id }}" data-pk="1" class="editable" data-field="bussiness_seat" data-url="" data-title="Edit Quantity">{{ $row->bussiness_seat }}</a>
							</td>
							<td class="bussiness_price" data-original-value="1">
								<a href="#" data-type="text" data-fieldid="{{ $row->id }}" data-pk="1" class="editable" data-field="bussiness_price" data-url="" data-title="Edit Quantity">{{ $row->bussiness_price }}</a>
							</td>

							<td class="first_seat" data-original-value="1">
								<a href="#" data-type="text" data-fieldid="{{ $row->id }}" data-pk="1" class="editable" data-field="first_seat" data-url="" data-title="Edit Quantity">{{ $row->first_seat }}</a>
							</td>
							<td class="first_price" data-original-value="1">
								<a href="#" data-type="text" data-fieldid="{{ $row->id }}" data-pk="1" class="editable" data-field="first_price" data-url="" data-title="Edit Quantity">{{ $row->first_price }}</a>
							</td>

							<td>
								<a href="#" class="text-danger delete" fieldid="{{ $row->id }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
									<i class="mdi mdi-trash-can font-size-18"></i>
								</a>
							</td>
						</tr>
						@endforeach
					</table>
				</div>

			</div>
		</div>
	</div> <!-- end col -->
</div> <!-- end row -->
</div> <!-- container-fluid -->
</div>

<!-- Modal -->
<div class="modal fade" id="Addform" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Add Transportation</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Plane Name</label>
							<input type="text" class="form-control" id="add_name" name="add_name" value="">
							<div class="valid-tooltip">
								Looks good!
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Economy Seat</label>
							<div class="input-group">
								<input type="text" class="form-control" id="add_economy_seat" name="add_economy_seat" value="">
								<div class="input-group-append">
									<span class="input-group-text">Seat</span>
								</div>

							</div><!-- input-group -->
							<div class="valid-tooltip">
								Looks good!
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Bussiness Seat</label>
							<div class="input-group">
								<input type="text" class="form-control add_bussiness_seat" id="add_bussiness_seat" name="add_bussiness_seat" value="">
								<div class="input-group-append bussiness_seat">
									<span class="input-group-text">Seat</span>
								</div>

							</div><!-- input-group -->
							<div class="valid-tooltip">
								Looks good!
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>First Seat</label>
							<div class="input-group">
								<input type="text" class="form-control add_first_seat" id="add_first_seat" name="add_first_seat" value="">
								<div class="input-group-append first_seat">
									<span class="input-group-text">Seat</span>
								</div>

							</div><!-- input-group -->
							<div class="valid-tooltip">
								Looks good!
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Economy Price</label>
							<div class="input-group">
								<input type="text" class="form-control" id="add_economy_price" name="add_economy_price" value="">
								<div class="input-group-append">
									<span class="input-group-text">/Km</span>
								</div>

							</div><!-- input-group -->
							<div class="valid-tooltip">
								Looks good!
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Bussiness Price</label>
							<div class="input-group">
								<input type="text" class="form-control" id="add_bussiness_price" name="add_bussiness_price" value="">
								<div class="input-group-append">
									<span class="input-group-text">/Km</span>
								</div>

							</div><!-- input-group -->
							<div class="valid-tooltip">
								Looks good!
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>First Price</label>
							<div class="input-group">
								<input type="text" class="form-control" id="add_first_price" name="add_first_price" value="">
								<div class="input-group-append">
									<span class="input-group-text">/Km</span>
								</div>

							</div><!-- input-group -->
							<div class="valid-tooltip">
								Looks good!
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light waves-effect" id="add_close" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary waves-effect waves-light" id="add_save">Save</button>
			</div>
		</div>
	</div>
</div>
@endsection
@push('css')
<!-- Sweet Alert-->
<link href="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

<!-- DataTables -->
<link href="{{ asset('assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/admin/libs/datatables.net-autoFill-bs4/css/autoFill.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/admin/libs/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@push('js')
<!-- Sweet Alerts js -->
<script src="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<!-- Required datatable js -->
<script src="{{ asset('assets/admin/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs//datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('assets/admin/libs/datatables.net-autoFill/js/dataTables.autoFill.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/datatables.net-autoFill-bs4/js/autoFill.bootstrap4.min.js') }}"></script>

<script src="{{ asset('assets/admin/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>

<!-- Responsive examples -->
<script src="{{ asset('assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>

<script src="{{ asset('assets/admin/libs/bootstrap-editable/js/index.js') }}"></script>

{{-- <script src="{{ asset('assets/admin/js/pages/table-editable.init.js') }}"></script>  --}}
<script>
	(function ($) {
		var datatable = $('.table-editable').dataTable({
			"bPaginate": true,
			"fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
				var setCell = function(response, newValue) {
					var table = new $.fn.dataTable.Api('.table');
					var cell = table.cell('td.focus');
					var cellData = cell.data();

					var div = document.createElement('div');
					div.innerHTML = cellData;
					var a = div.childNodes;
					a.innerHTML = newValue;

					var field = a[0].dataset.field;
					var dataValue = a.innerHTML;

					if (field == 'name') {
						var dataPass = { name : dataValue };
					}else if(field == 'economy_seat') {
						var dataPass = { economy_seat : dataValue };
					}else if(field == 'economy_price') {
						var dataPass = { economy_price : dataValue };
					}else if(field == 'bussiness_seat') {
						var dataPass = { bussiness_seat : dataValue };
					}else if(field == 'bussiness_price') {
						var dataPass = { bussiness_price : dataValue };
					}else if(field == 'first_seat') {
						var dataPass = { first_seat : dataValue };
					}else if(field == 'first_price') {
						var dataPass = { first_price : dataValue };
					}else{
						toastr["error"]("Danger", 'Data Not Valid');
					}

					console.log(a[0].dataset.fieldid);
					cell.data(a.innerHTML);
					highlightCell($(cell.node()));

					var fieldid = a[0].dataset.fieldid;

					$.ajax({
						url: '{{ route('admin.transportation.update') }}/'+fieldid,
						type: 'POST',
						data: dataPass,
						success: function(result){
							toastr["success"](result, "Success");
						},
						error: function(error){
							toastr["error"](error, "Failed");
						}
					});
                  // This is huge cheese, but the a has lost it's editable nature.  Do it again.
                  $('td.focus a').editable({ 
                  	'mode': 'inline',
                  	'success' : setCell
                  });
              };
              $('.editable').editable(
              { 
              	'mode': 'inline',
              	'success' : setCell
              }
              );
          },
            // "autoFill" : {
            //     "columns" : [1, 2]
            // },
            "keys" : true
        });

		addCellChangeHandler();
		addAutoFillHandler();

		function highlightCell($cell) {
			var originalValue = $cell.attr('data-original-value');
			if (!originalValue) {
				return;
			}
			var actualValue = $cell.text();
			if (!isNaN(originalValue)) {
				originalValue = parseFloat(originalValue);
            // actualValue = parseFloat(actualValue);
        }
        if (!isNaN(actualValue)) {
        	actualValue = parseFloat(actualValue);
        }
        if ( originalValue === actualValue ) {
        	$cell.removeClass('cat-cell-modified').addClass('cat-cell-original');
        } else {
        	$cell.removeClass('cat-cell-original').addClass('a[data-pk]');

        }
    }

    function addCellChangeHandler() {
    	$('a[data-pk]').on('hidden', function (e, editable) {
    		var $a = $(this);
    		var $cell = $a.parent('td');
    		highlightCell($cell);
    	});
    }

    function addAutoFillHandler() {
    	var table = $('.table').DataTable();
    	table.on('autoFill', function (e, datatable, cells) {
    		var datatableCellApis = $.each(cells, function(index, row) {
    			var datatableCellApi = row[0].cell;
    			var $jQueryObject = $(datatableCellApi.node());
    			highlightCell($jQueryObject);
    		});
    	});
    }

    $('#add_save').on('click', function() {
    	var name = $('#add_name').val();
    	var economy_seat = $('#add_economy_seat').val();
    	var economy_price = $('#add_economy_price').val();
    	var bussiness_seat = $('#add_bussiness_seat').val();
    	var bussiness_price = $('#add_bussiness_price').val();
    	var first_seat = $('#add_first_seat').val();
    	var first_price = $('#add_first_price').val();
    	$.ajax({
    		url: '{{ route('admin.transportation.add') }}',
    		type: 'POST',
    		data: {
    			name 			: name,
    			economy_seat 	: economy_seat,
    			economy_price 	: economy_price,
    			bussiness_seat 	: bussiness_seat,
    			bussiness_price : bussiness_price,
    			first_seat 		: first_seat,
    			first_price 	: first_price,
    		},
    		success: function(result){
    			toastr["success"](result, "Success");

    			var newRow=document.getElementById('transportation').insertRow();

    			var cell0   = newRow.insertCell(0);
				var cell0Text  = document.createTextNode('ID');
				cell0.appendChild(cell0Text);

				var cell1   = newRow.insertCell(1);
				var cell1Text  = document.createTextNode(name);
				cell1.appendChild(cell1Text);

				var cell2   = newRow.insertCell(2);
				var cell2Text  = document.createTextNode(economy_seat);
				cell2.appendChild(cell2Text);

				var cell3   = newRow.insertCell(3);
				var cell3Text  = document.createTextNode(economy_price);
				cell3.appendChild(cell3Text);

				var cell4   = newRow.insertCell(4);
				var cell4Text  = document.createTextNode(bussiness_seat);
				cell4.appendChild(cell4Text);

				var cell5   = newRow.insertCell(5);
				var cell5Text  = document.createTextNode(bussiness_price);
				cell5.appendChild(cell5Text);

				var cell6   = newRow.insertCell(6);
				var cell6Text  = document.createTextNode(first_seat);
				cell6.appendChild(cell6Text);

				var cell7   = newRow.insertCell(7);
				var cell7Text  = document.createTextNode(first_price);
				cell7.appendChild(cell7Text);


    			$('#add_name').val('');
    			$('#add_economy_seat').val('');
    			$('#add_economy_price').val('');
    			$('#add_bussiness_seat').val('');
    			$('#add_bussiness_price').val('');
    			$('#add_first_seat').val('');
    			$('#add_first_price').val('');
    			$('#add_close').trigger('click');
    		},
    		error: function(error){
    			toastr["error"](error, "Failed");
    		}
    	});
    });

    $('.delete').on('click', function() {
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
    				url: '{{ route('admin.transportation.destroy') }}/'+id,
    				type: 'POST',
    				success: function(result){
    					toastr["success"](result, "Success");
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