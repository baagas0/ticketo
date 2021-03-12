@extends('admin.layouts.app')
@section('title', 'Flight Schedule Data')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <h4 class="card-title">Payment List</h4>
                        </div>
                    </div>
                    {{-- <div class="table-responsive"> --}}
                    <table id="state-saving-datatable" class="table activate-select dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Group</th>
                                <th>Fee Flat</th>
                                <th>Fee Percent</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr class="table-{{ is_null($payment->deactived_at) ? 'success' : 'danger' }}">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <th scope="row">{{ $payment->code }}</th>
                                    <td>{{ $payment->name }}</td>
                                    <td>{{ $payment->group }}</td>
                                    <td>{{ $payment->fee_flat }}</td>
                                    <td>{{ $payment->fee_percent }}</td>
                                    <td>{{ $payment->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- </div> --}}

                </div>
            </div>
        </div>
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

        <!-- Responsive examples -->
        <script src="{{ asset('assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}">
        </script>
        <script src="{{ asset('assets/admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}">
        </script>

        <!-- Datatable init js -->
        <script src="{{ asset('assets/admin/js/pages/datatables.init.js') }}"></script>
    @endpush
