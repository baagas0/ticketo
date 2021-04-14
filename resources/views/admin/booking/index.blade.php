@extends('admin.layouts.app')
@section('title', 'Booking')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h4 class="card-title">Booking List</h4>
                    </div>
                </div>
                {{-- <div class="table-responsive"> --}}
                    <table id="state-saving-datatable" class="table activate-select dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Reference</th>
                                <th>User</th>
                                <th>Payment</th>
                                <th>Schedule</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                            <tr class="table-{{ $booking->status == 0 ? 'warning' : ($booking->status == 1 ? 'success' : 'danger') }}">
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th scope="row">{{ $booking->code }}</th>
                                <td>{{ $booking->reference }}</td>
                                <td>{{ $booking->user->name }}</td>
                                <td>{{ $booking->payment->name }}</td>
                                <td>{{ $booking->schedulle->id }}</td>
                                <td>{{ $booking->approval }}</td>
                                <td>
                                    <a href="#" class="text-success approve" data-id="{{ $booking->id }}"
                                        data-toggle="tooltip" data-placement="top" title=""
                                        data-original-title="Approve">
                                        <i class="mdi mdi-check font-size-18"></i>
                                    </a>
                                    <a href="#" class="text-danger reject" data-id="{{ $booking->id }}"
                                        data-toggle="tooltip" data-placement="top" title=""
                                        data-original-title="Reject">
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
            (function($) {
                $('.table').on('click', '.approve' , function() {
                    const id = $(this).attr("data-id");
                    // alert('asd');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: "#34c38f",
                        cancelButtonColor: "#ff3d60",
                        confirmButtonText: 'Yes, approve it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = `{{ route('admin.booking.approve') }}/${id}`;
                        }
                    })
                });

                $('.reject').on('click', function() {
                    const id = $(this).attr("data-id");

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: "#34c38f",
                        cancelButtonColor: "#ff3d60",
                        confirmButtonText: 'Yes, reject it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = `{{ route('admin.booking.reject') }}/${id}`;
                        }
                    })
                });

            })(jQuery);
        </script>

        @endpush
