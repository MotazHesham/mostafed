<!DOCTYPE html>
<html @if (app()->getLocale() == 'ar') dir="rtl" @else dir="ltr" @endif data-nav-layout="vertical"
    data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="Description" content="Laravel Bootstrap Responsive Admin Web Dashboard Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="laravel template, laravel admin, admin, admin panel template, laravel dashboard, dashboard admin template, template admin, admin panel laravel, laravel, dashboard for laravel, laravel framework, admin, bootstrapdashboard, bootstrap template, dashboard, dashboard admin.">

    <!-- Title-->
    <title> Zeno - Laravel Bootstrap 5 Premium Admin & Dashboard Template </title>

    <!-- Favicon -->
    <link rel="icon" href="{{ global_asset('assets/images/brand-logos/favicon.ico') }}" type="image/x-icon">

    <!-- Main Theme Js -->
    <script src="{{ global_asset('assets/js/main.js') }}"></script>

    <!-- ICONS CSS -->
    <link href="{{ global_asset('assets/icon-fonts/icons.css') }}" rel="stylesheet">

    @include('tenant.layouts.components.styles')

    <!-- APP CSS & APP SCSS -->
    <link href="{{ global_asset('assets/css/styles.css') }}" rel="stylesheet">

    @yield('styles')
    @if (app()->getLocale() == 'ar')
        <style>
            @import url(https://fonts.googleapis.com/earlyaccess/droidarabicnaskh.css);

            body {
                font-family: 'Droid Arabic Naskh', 'Roboto', serif;
            }

            .main-menu i {
                font-size: 1.1rem;
                padding: 0 0 0 10px;
            }
        </style>
    @endif

</head>

<body class="">

    <!-- Start::main-switcher -->
    @include('tenant.layouts.components.switcher')
    <!-- End::main-switcher -->

    <!-- Loader -->
    <div id="loader">
        <img src="{{ global_asset('assets/images/media/loader.svg') }}" alt="">
    </div>
    <!-- Loader -->

    <div class="page">

        <!-- Start::main-header -->
        @include('tenant.layouts.components.main-header')
        <!-- End::main-header -->

        <!-- Start::main-sidebar -->
        @include('tenant.layouts.components.main-sidebar')
        <!-- End::main-sidebar -->

        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">

                @if($errors->count() > 0)
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                @yield('content')

            </div>
        </div>
        <!-- End::content  -->

        <!-- Start::main-footer -->
        @include('tenant.layouts.components.footer')
        <!-- End::main-footer -->

        <!-- Start::main-modal -->
        @include('tenant.layouts.components.modal')
        <!-- End::main-modal -->

        @yield('modals')

        {{-- ajax modal --}}
        <div class="modal fade" id="ajaxModal" tabindex="-1" aria-labelledby="ajaxModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                </div>
            </div>
        </div>

        {{-- ajax offcanvas --}}
        <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="ajaxOffcanvas" aria-labelledby="ajaxOffcanvasLabel">

        </div>
    </div>

    <!-- Scripts -->
    @include('tenant.layouts.components.scripts')

    <!-- Sticky JS -->
    <script src="{{ global_asset('assets/js/sticky.js') }}"></script>

    <!-- Custom-Switcher JS -->
    <script type="module" src="{{ global_asset('assets/js/custom-switcher.js') }}"></script>

    <!-- App JS-->
    <script src="{{ global_asset('assets/js/custom.js') }}"></script>

</body>

</html>
