@extends('admin.layouts.app')
@section('title', 'Flight Pessenger Schedule Data')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <h4 class="card-title">Pessenger List</h4>
                        </div>
                    </div>
                    {{-- <div class="table-responsive"> --}}
                    <table id="state-saving-datatable" class="table activate-select dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Number Person</th>
                                <th>Type</th>
                                <th>Pay By</th>
                                <th>Pay Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pessengers as $pessenger)
                                <tr class="table-{{ ($pessenger->status == 1) ? 'success' : 'danger' }}">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <th scope="row">{{ $pessenger->user->name }}</th>
                                    <td>{{ $pessenger->user->email }}</td>
                                    <td>{{ $pessenger->number_of_person }} Person</td>
                                    <td>{{ $pessenger->type }}</td>
                                    <td>{{ $pessenger->payment->name }}</td>
                                    <td>{{ $pessenger->approval }}</td>
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
