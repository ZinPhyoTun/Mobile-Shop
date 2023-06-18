<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="" rel="icon">
    <link href="" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('kelly_temp/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('kelly_temp/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('kelly_temp/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('kelly_temp/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('kelly_temp/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('kelly_temp/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('kelly_temp/assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Kelly
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/kelly-free-bootstrap-cv-resume-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    @include('layouts.frondend_header')

    @yield('content')

    <!-- Vendor JS Files -->
    <script src="{{ asset('kelly_temp/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('kelly_temp/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('kelly_temp/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('kelly_temp/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('kelly_temp/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('kelly_temp/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('kelly_temp/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('kelly_temp/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('kelly_temp/assets/js/main.js') }}"></script>

    <script>
        $(function() {
            $(document).on('click', '.logout-btn', function() {
                $('#logout-form').submit();
            });
        })
    </script>

</body>

</html>
