<!DOCTYPE html>
<html @if (app()->getLocale() == 'ar') dir="rtl" @else dir="ltr" @endif  data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="light" data-toggled="close">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Laravel Bootstrap Responsive Admin Web Dashboard Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="laravel template, laravel admin, admin, admin panel template, laravel dashboard, dashboard admin template, template admin, admin panel laravel, laravel, dashboard for laravel, laravel framework, admin, bootstrapdashboard, bootstrap template, dashboard, dashboard admin.">

    <!-- Title-->
    <title> {{ trans('panel.site_title')}} </title>

    <!-- Favicon -->
    <link rel="icon" href="{{ global_asset('assets/images/brand-logos/favicon.ico') }}" type="image/x-icon">

    <!-- Main Theme Js -->
    <script src="{{ global_asset('assets/js/main.js') }}"></script>

    <!-- ICONS CSS -->
    <link href="{{ global_asset('assets/icon-fonts/icons.css') }}" rel="stylesheet">

    @include('central.layouts.components.styles')

    <!-- APP CSS & APP SCSS -->
    <link href="{{ global_asset('assets/css/styles.css') }}" rel="stylesheet">

    @yield('styles')
    @if (app()->getLocale() == 'ar')
        <style>
            @import url(https://fonts.googleapis.com/earlyaccess/droidarabicnaskh.css);
            body{
                font-family: 'Droid Arabic Naskh', serif;
            }
            .main-menu i{
                font-size: 1.5rem;
                padding: 0 0 0 10px;
            }   
        </style>
    @endif

</head>

<body class="">

    <!-- Start::main-switcher -->
    @include('central.layouts.components.switcher')
    <!-- End::main-switcher -->

    <!-- Loader -->
    <div id="loader">
        <img src="{{ global_asset('assets/images/media/loader.svg') }}" alt="">
    </div>
    <!-- Loader -->

    <div class="page">

        <!-- Start::main-header -->
        @include('central.layouts.components.main-header')
        <!-- End::main-header -->

        <!-- Start::main-sidebar -->
        @include('central.layouts.components.main-sidebar')
        <!-- End::main-sidebar -->

        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">

                @yield('content')

            </div>
        </div>
        <!-- End::content  -->

        <!-- Start::main-footer -->
        @include('central.layouts.components.footer')
        <!-- End::main-footer -->

        <!-- Start::main-modal -->
        @include('central.layouts.components.modal')
        <!-- End::main-modal -->

        @yield('modals')

        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>

    <!-- Scripts -->
    @include('central.layouts.components.scripts')

    <!-- Sticky JS -->
    <script src="{{ global_asset('assets/js/sticky.js') }}"></script>

    <!-- Custom-Switcher JS -->
    <script type="module" src="{{ global_asset('assets/js/custom-switcher.js') }}"></script>

    <!-- App JS-->
    <script src="{{ global_asset('assets/js/custom.js') }}"></script> 
</body>

</html>
