<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset("/./images/favicon.png") }}">
    <link rel="stylesheet" href="{{ asset("/./vendor/owl-carousel/css/owl.carousel.min.css") }}">
    <link rel="stylesheet" href="{{ asset("/./vendor/owl-carousel/css/owl.theme.default.min.css") }}">
    <link href="{{ asset("/./vendor/jqvmap/css/jqvmap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("/./css/style.css") }}" rel="stylesheet">
    {{-- fontawesome cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>



</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        @include('layouts.navbar')
        @include('layouts.header')
        @include('layouts.sidebar')
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-sm-6">

                        @yield('content')

                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footer')

    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset("/./vendor/global/global.min.js") }}"></script>
    <script src="{{ asset("/./js/quixnav-init.js") }}"></script>
    <script src="{{ asset("/./js/custom.min.js") }}"></script>


    <!-- Vectormap -->
    <script src="{{ asset("/./vendor/raphael/raphael.min.js") }}"></script>
    <script src="{{ asset("/./vendor/morris/morris.min.js") }}"></script>


    <script src="{{ asset("/./vendor/circle-progress/circle-progress.min.js") }}"></script>
    <script src="{{ asset("/./vendor/chart.js/Chart.bundle.min.js") }}"></script>

    <script src="{{ asset("/./vendor/gaugeJS/dist/gauge.min.js") }}"></script>

    <!--  flot-chart js -->
    <script src="{{ asset("/./vendor/flot/jquery.flot.js") }}"></script>
    <script src="{{ asset("/./vendor/flot/jquery.flot.resize.js") }}"></script>

    <!-- Owl Carousel -->
    <script src="{{ asset("/./vendor/owl-carousel/js/owl.carousel.min.js") }}"></script>

    <!-- Counter Up -->
    <script src="{{ asset("/./vendor/jqvmap/js/jquery.vmap.min.js") }}"></script>
    <script src="{{ asset("/./vendor/jqvmap/js/jquery.vmap.usa.js") }}"></script>
    <script src="{{ asset("/./vendor/jquery.counterup/jquery.counterup.min.js") }}"></script>


    <script src="{{ asset("/./js/dashboard/dashboard-1.js") }}"></script>

</body>

</html>
