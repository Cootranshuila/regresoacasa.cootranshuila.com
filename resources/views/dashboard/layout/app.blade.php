<!doctype html>
<html lang="es_CO">

    <head>
        <meta charset="utf-8" />
        <title>@yield('title') | Cootranshuila LTDA</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Dasboard Admin Cootranshuila LTDA" name="description" />
        <meta content="Cootranshuila LTDA" name="Cootranshuila" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/img/logo-icon.png') }}" type="image/x-icon">

        <!-- datepicker -->
        <link href="{{ asset('assets_admin/libs/air-datepicker/css/datepicker.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Jquery -->
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <!-- jvectormap -->
        <link href="{{ asset('assets_admin/libs/jqvmap/jqvmap.min.css') }}" rel="stylesheet" />

        <!-- Bootstrap Css -->
        <link href="{{ asset('assets_admin/css/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets_admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets_admin/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body data-topbar="colored">


        @yield('content')

        @extends('dashboard.layout.bar-right')


        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>


        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets_admin/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets_admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets_admin/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets_admin/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets_admin/libs/node-waves/waves.min.js') }}"></script>

        <script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>

        <!-- datepicker -->
        <script src="{{ asset('assets_admin/libs/air-datepicker/js/datepicker.min.js') }}"></script>
        <script src="{{ asset('assets_admin/libs/air-datepicker/js/i18n/datepicker.en.js') }}"></script>

        <!-- apexcharts -->
        <script src="{{ asset('assets_admin/libs/apexcharts/apexcharts.min.js') }}"></script>

        <script src="{{ asset('assets_admin/libs/jquery-knob/jquery.knob.min.js') }}"></script> 

        <!-- Jq vector map -->
        <script src="{{ asset('assets_admin/libs/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('assets_admin/libs/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
        <script src="{{ asset('assets_admin/libs/ckeditor4/ckeditor.js') }}"></script>


        {{-- <script src="{{ asset('assets_admin/js/pages/dashboard.init.js') }}"></script> --}}

        <script src="{{ asset('assets_admin/js/clock.js') }}"></script>
        <script src="{{ asset('assets_admin/js/peticiones.js') }}"></script>
        <script src="{{ asset('assets_admin/js/app.js') }}"></script>

    </body>
</html>