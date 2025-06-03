<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="horizontal" data-nav-style="menu-click" data-menu-position="fixed"
    data-theme-mode="light">

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
    <title> Zeno - Laravel Bootstrap 5 Premium Admin & Dashboard Template </title>

    <!-- Favicon -->
    <link rel="icon" href="{{ global_asset('assets/images/brand-logos/favicon.ico') }}" type="image/x-icon">

    <!-- Icons CSS -->
    <link href="{{ global_asset('assets/icon-fonts/icons.css') }}" rel="stylesheet">

    @include('tenant.layouts.components.landingpage.styles')

    <!-- APP CSS & APP SCSS -->
    <link href="{{ global_asset('assets/css/styles.css') }}" rel="stylesheet">

    @yield('styles')

</head>

<body class="landing-body">

    <!-- Start::main-switcher -->
    @include('tenant.layouts.components.landingpage.switcher')
    <!-- End::main-switcher -->

    <div class="landing-page-wrapper">

        <!-- Start::main-header -->
        @include('tenant.layouts.components.landingpage.main-header')
        <!-- End::main-header -->

        <!-- Start::main-sidebar -->
        @include('tenant.layouts.components.landingpage.main-sidebar')
        <!-- End::main-sidebar -->

        <!-- Start::app-content -->
        <div class="main-content landing-main px-0">

            @yield('content')

        </div>
        <!-- End::main-content -->

    </div>
    <!--app-content closed-->

    @yield('modals')

    <!-- Scripts -->
    @include('tenant.layouts.components.landingpage.scripts')

</body>

</html>
