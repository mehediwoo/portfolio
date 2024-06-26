<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>DASHMIN - Bootstrap Admin Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="{{ asset('admin/css/bootstrap-icons.css') }}" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('admin/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Dropify & Data Table-->
        <link rel="stylesheet" href="{{ asset('admin/css/dataTables.min.css') }}">
        <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
        <link rel="stylesheet" href="{{ asset('sweetalert/toastr.min.css') }}">

        <!-- Template Stylesheet -->
        <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    </head>

    <body>
        <div class="container-xxl position-relative bg-white d-flex p-0">

            <!-- Spinner Start -->
            <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
                <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <!-- Spinner End -->


            <!-- Sidebar Start -->
            @include('admin.layout.sidebar')
            <!-- Sidebar End -->


            <!-- Content Start -->
            <div class="content">
                <!-- Navbar Start -->
                @include('admin.layout.navigation')
                <!-- Navbar End -->

                @yield('content')

                <!-- Footer Start -->
                @include('admin.layout.footer')
                <!-- Footer End -->
            </div>
            <!-- Content End -->


            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
        </div>

        <!-- JavaScript Libraries -->
        <script src="{{ asset('admin/js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('admin/lib/chart/chart.min.js') }}"></script>
        <script src="{{ asset('admin/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('admin/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('admin/lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('admin/lib/tempusdominus/js/moment.min.js') }}"></script>
        <script src="{{ asset('admin/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
        <script src="{{ asset('admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        <script src="{{ asset('admin/js/dataTables.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('admin/js/dropify.min.js') }}"></script>
        <script src="{{ asset('sweetalert/sweetalert2.js') }}"></script>
        <script src="{{ asset('sweetalert/toastr.min.js') }}"></script>
        <!-- Template Javascript -->
        <script src="{{ asset('admin/js/main.js') }}"></script>
        <script>
            $(document).ready(function(){
                $('.dropify').dropify();
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        @yield('script')
    </body>

</html>
