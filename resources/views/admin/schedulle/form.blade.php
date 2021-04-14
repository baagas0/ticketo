	@extends('admin.layouts.app')
	@if(empty($data))
	@section('title', 'Add Flight Schedule Data')
	@else
	@section('title', 'Update Flight Schedule Data')
	@endif
	@section('content')
	<div class="divDate"></div>
	<div class="row">
		<div class="col-xl-8">
			<div class="card">
				<div class="card-body">
					{{-- <h4 class="card-title">Bootstrap Validation (Tooltips)</h4> --}}
					<form class="needs-validation" novalidate action="{{ (empty($data) ? route('admin.schedulle.store') : route('admin.schedulle.update', $data->id)) }}" method="POST">
						@csrf
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Plane</label>
									<select class="custom-select select2" id="transportation" name="transportation_id">
										<option selected disabled="">Open this plane list</option>
										@foreach($transportation as $row)
										<option @if(!empty($data)) @if($data->transportation_id == $row->id) selected="" @endif @endif value="{{ $row->id }}">{{ $row->name }}</option>
										@endforeach
									</select>
									<div class="valid-tooltip">
										Looks good!
									</div>
								</div>
							</div>
							<div class="form-group col-md-6">
								<label>Date</label>
								<div class="input-group">
									<input type="text" class="form-control buttonDate" id="date" name="date" value="{{ (empty($data) ? old('date') : $data->date) }}">
									<div class="input-group-append buttonDate">
										<span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
									</div>
									
								</div><!-- input-group -->
								<div class="valid-tooltip">
									Looks good!
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>From</label>
									<select class="custom-select" id="from" name="from_code">
										<option selected disabled="">Open this Airport list</option>
									</select>
									@if(!empty($data))
									<p>Current From <code class="highlighter-rouge">{{ $airportFrom->name }}</code></p>
									@endif
									<div class="valid-tooltip">
										Looks good!
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Destination</label>
									<select class="custom-select" id="destination" name="destination_code">
										<option selected disabled="">Open this Airport list</option>
									</select>
									@if(!empty($data))
									<p>Current From <code class="highlighter-rouge">{{ $airportTo->name }}</code></p>
									@endif
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
										<div class="input-group-append buttonDate">
											<span class="input-group-text">IDR</span>
										</div>
										<input type="text" class="form-control buttonDate" id="economy_price" name="economy_price" value="{{ (empty($data) ? old('economy_price') : number_format($data->economy_price)) }}">

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
										<div class="input-group-append buttonDate">
											<span class="input-group-text">IDR</span>
										</div>
										<input type="text" class="form-control buttonDate" id="bussiness_price" name="bussiness_price" value="{{ (empty($data) ? old('bussiness_price') : number_format($data->bussiness_price)) }}">

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
										<div class="input-group-append buttonDate">
											<span class="input-group-text">IDR</span>
										</div>
										<input type="text" class="form-control buttonDate" id="first_price" name="first_price" value="{{ (empty($data) ? old('first_price') : number_format($data->first_price)) }}">

									</div><!-- input-group -->
									<div class="valid-tooltip">
										Looks good!
									</div>
								</div>
							</div>
						</div>
						<button class="btn btn-primary" type="submit">Submit form</button>
					</form>
				</div>
			</div>
			<!-- end card -->
		</div> <!-- end col -->

		<div class="col-xl-4">
			<div class="card">
				<div class="card-body">

					<h4 class="card-title">Inline List</h4>
					<p class="card-title-desc">Remove a list’s bullets and apply some
						light <code class="highlighter-rouge">margin</code> with a combination
						of two classes, <code class="highlighter-rouge">.list-inline</code> and
						<code class="highlighter-rouge">.list-inline-item</code>.</p>

						<ul class="list-inline mb-0">
							<li class="list-inline-item">Lorem ipsum</li>
							<li class="list-inline-item">Phasellus iaculis</li>
							<li class="list-inline-item">Nulla volutpat</li>
						</ul>

					</div>
				</div>
			</div>
		</div>

		@endsection
		@push('css')
		<link href="{{  asset('assets/admin/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{  asset('assets/admin/libs/simple-datetime/simplepicker.css') }}" rel="stylesheet" type="text/css" />
		@endpush
		@push('js')
		<script src="{{  asset('assets/admin/libs/select2/js/select2.min.js') }}"></script>
		<script src="{{  asset('assets/admin/libs/simple-datetime/simplepicker.js') }}"></script>
		<!-- Datatable init js -->
		<script src="{{ asset('assets/admin/js/pages/form-advanced.init.js') }}"></script>
		<script>
			let simplepicker1 = new SimplePicker(".divDate", {
				zIndex: 9999
			});

			const $button1 = document.querySelector('.buttonDate');
			$button1.addEventListener('click', (e) => {
				simplepicker1.open();
			});

			simplepicker1.on("submit", function (date, readableDate) {
				var input = document.querySelector('#date');
				input.value = readableDate;
			});

			$(document).ready(function() {
				$("#from").select2({
					tags: [],
					attribute: 'required',
					ajax: {
						url: "{{ route('admin.ajax.select.airport') }}",
						type: "post",
						dataType: 'json',
						// delay: 250,
						data: function (params) {
							return {
		                        searchTerm: params.term // search term
		                    };
		                },
		                processResults: function (response) {
		                	return {
		                		results: $.map(response, function (item) {
		                			return {
		                				text: item.name,
		                				id: item.id,
		                				// val: item.id
		                			}
		                		})
		                	};
		                },
		                cache: true
		            },

		        });

				$("#destination").select2({
					tags: [],
					ajax: {
						url: "{{ route('admin.ajax.select.airport') }}",
						type: "post",
						dataType: 'json',
						// delay: 250,
						data: function (params) {
							return {
		                        searchTerm: params.term // search term
		                    };
		                },
		                processResults: function (response) {
		                	return {
		                		results: $.map(response, function (item) {
		                			return {
		                				text: item.name,
		                				id: item.id,
		                				// val: item.id
		                			}
		                		})
		                	};
		                },
		                cache: true
		            }
		        });

				$("#destination").on('change', function() {
					calculateDistance();
				});

				function calculateDistance() {
					var idTransportation = $('#transportation').val();
					var from = $('#from').val();
					var destination = $('#destination').val();
				// alert(idTransportation);
					if (idTransportation == null) {
						toastr["error"]("Please Choose A Transportation", "Error");
					}else if(from == null){
						toastr["error"]("Please Choose A Take Off Airport Data", "Errpr");
					}else {
						$.ajax({
							url: '{{ route('admin.ajax.distance.price') }}',
							type: 'POST',
							dataType: 'json',
							data: {
								idTransportation: idTransportation,
								from: from,
								destination: destination,
							},
							success: function(result){
								$('#economy_price').val(result.economy_price.toLocaleString());
								$('#bussiness_price').val(result.bussiness_price.toLocaleString());
								$('#first_price').val(result.first_price.toLocaleString());
								toastr["success"]("Calculate Of Distance & Price Successfully", "Success");
								// alert(result.economy_price);
							},
							error: function(error){
								toastr["error"](error, "Calculate Of Distance & Price Failed");
							}
						});
					}
			}
		});
	</script>
	@endpush