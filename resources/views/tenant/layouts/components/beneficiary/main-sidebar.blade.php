<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="{{ route('beneficiary.home') }}" class="header-logo">
            <img src="{{ global_asset('assets/logo-white.png') }}" alt="logo" class="desktop-logo">
            <img src="{{ global_asset('assets/logo-dark.png') }}" alt="logo" class="toggle-dark">
            <img src="{{ global_asset('assets/logo-dark.png') }}" alt="logo" class="desktop-dark">
            <img src="{{ global_asset('assets/logo-white.png') }}" alt="logo" class="toggle-logo">
            <img src="{{ global_asset('assets/logo-white.png') }}" alt="logo" class="toggle-white">
            <img src="{{ global_asset('assets/logo-white.png') }}" alt="logo" class="desktop-white">
        </a>
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">

        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>
            <ul class="main-menu">
                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">{{ trans('global.main') }}</span></li>
                <!-- End::slide__category -->

                <!-- Start::slide -->
                <li class="slide">
                    <a href="{{ route('beneficiary.home') }}" class="side-menu__item">
                        <i class="bi bi-house-door"></i>
                        <span class="side-menu__label">{{ trans('global.dashboard') }}</span>
                    </a>
                </li>
                <!-- End::slide -->

                <!-- Start::slide -->
                <li class="slide">
                    <a href="{{ route('beneficiary.profile.show') }}" class="side-menu__item">
                        <i class="bi bi-person"></i>
                        <span class="side-menu__label">{{ trans('global.profile') }}</span>
                    </a>
                </li>
                <!-- End::slide -->

                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">{{ trans('cruds.beneficiaryOrder.extra.title') }}</span></li>
                <!-- End::slide__category -->

                <!-- Start::slide -->
                <li class="slide">
                    <a href="{{ route('beneficiary.beneficiary-orders.index') }}" class="side-menu__item">
                        <i class="bi bi-file-earmark-text"></i>
                        <span class="side-menu__label"> {{ trans('global.list') }} {{ trans('cruds.beneficiaryOrder.extra.title') }}</span>
                    </a>
                </li>
                <!-- End::slide -->
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg></div>
        </nav>
        <!-- End::nav -->

    </div>
    <!-- End::main-sidebar -->

</aside>
