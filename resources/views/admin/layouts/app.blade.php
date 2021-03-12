<!doctype html>
<html lang="en">

    <head>
        
        @include('admin.layouts.partials.title-meta')
        <!-- DataTables -->
        <link href="{{ asset('assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />



        <!-- Responsive datatable examples -->
        <link href="{{ asset('assets/admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />  
        
        @stack('css')

        <!-- Toast -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/libs/toastr/build/toastr.min.css') }}">
        @include('admin.layouts.partials.head-css')
    </head>

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">

            @include('admin.layouts.partials.topbar')

            @include('admin.layouts.partials.sidebar')

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        @include('admin.layouts.partials.page-title')
                        @yield('content')

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                @include('admin.layouts.partials.footer')
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        @include('admin.layouts.partials.right-sidebar')

        @include('admin.layouts.partials.vendor-scripts')
        <!-- toastr plugin -->
        <script src="{{ asset('assets/admin/libs/toastr/build/toastr.min.js') }}"></script>
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
        </script>

        
        @stack('js')

        <script type="text/javascript">
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "newestOnTop": true,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "showDuration": 300,
              "hideDuration": 1000,
              "timeOut": 5000,
              "extendedTimeOut": 1000,
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
          }
        </script>
        {{-- <script src="{{ asset('assets/admin/js/pages/dashboard.init.js') }}"></script> --}}

        <script src="{{ asset('assets/admin/js/app.js') }}"></script>

    </body>
</html>
