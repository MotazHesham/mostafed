<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light"
    data-header-styles="light" data-menu-styles="light" data-toggled="close">

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
    <script src="{{ global_asset('assets/js/authentication-main.js') }}"></script>

    <!-- Bootstrap Css -->
    <link id="style" href="{{ global_asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- ICONS CSS -->
    <link href="{{ global_asset('assets/icon-fonts/icons.css') }}" rel="stylesheet">

    <!-- APP CSS & APP SCSS -->
    <link href="{{ global_asset('assets/css/styles.css') }}" rel="stylesheet">

    @yield('styles')

</head>

<body class="{{ $bodyClass }}">

    <!-- Start Switcher -->
    @include('central.layouts.components.custom-switcher')
    <!-- End Switcher -->

    @yield('content')

    <!-- Bootstrap JS -->
    <script src="{{ global_asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    @yield('scripts')

</body>

</html>
