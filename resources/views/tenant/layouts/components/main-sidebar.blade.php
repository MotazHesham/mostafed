<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="{{ url('index') }}" class="header-logo">
            <img src="{{ asset('logo-white.png') }}" alt="logo" class="desktop-logo">
            <img src="{{ asset('logo-dark.png') }}" alt="logo" class="toggle-dark">
            <img src="{{ asset('logo-dark.png') }}" alt="logo" class="desktop-dark">
            <img src="{{ asset('logo-white.png') }}" alt="logo" class="toggle-logo">
            <img src="{{ asset('logo-white.png') }}" alt="logo" class="toggle-white">
            <img src="{{ asset('logo-white.png') }}" alt="logo" class="desktop-white">
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
                    <a href="{{ route('admin.home') }}" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <span class="side-menu__label">{{ trans('global.dashboard') }}</span>
                    </a>
                </li>
                <!-- End::slide -->

                @can('user_management_access')
                    <!-- Start::slide__category -->
                    <li class="slide__category"><span
                            class="category-name">{{ trans('cruds.userManagement.title') }}</span></li>
                    <!-- End::slide__category -->

                    @can('role_access')
                        <!-- Start::slide -->
                        <li class="slide">
                            <a href="{{ route('admin.roles.index') }}" class="side-menu__item">
                                @include('svgs.briefcase')
                                <span class="side-menu__label">{{ trans('cruds.role.title') }}</span>
                            </a>
                        </li>
                        <!-- End::slide -->
                    @endcan

                    @can('user_access')
                        <!-- Start::slide -->
                        <li class="slide">
                            <a href="{{ route('admin.users.index') }}" class="side-menu__item">
                                @include('svgs.users')
                                <span class="side-menu__label">{{ trans('cruds.user.title') }}</span>
                            </a>
                        </li>
                        <!-- End::slide -->
                    @endcan

                @endcan

                @can('charity_access')
                    <!-- Start::slide__category -->
                    <li class="slide__category"><span
                            class="category-name">{{ trans('cruds.charityManagement.title') }}</span></li>
                    <!-- End::slide__category -->

                    @can('charity_access')
                        <!-- Start::slide -->
                        <li class="slide">
                            <a href="{{ route('admin.charities.index') }}" class="side-menu__item">
                                @include('svgs.buildings')
                                <span class="side-menu__label">{{ trans('cruds.charity.title') }}</span>
                            </a>
                        </li>
                        <!-- End::slide -->
                    @endcan

                @endcan


                @can('frontend_setting_access')
                    <!-- Start::slide__category -->
                    <li class="slide__category"><span
                            class="category-name">{{ trans('cruds.frontendSetting.title') }}</span></li>
                    <!-- End::slide__category -->
                    
                    @can('slider_access')
                        <!-- Start::slide -->
                        <li class="slide">
                            <a href="{{ route('admin.sliders.index') }}" class="side-menu__item">
                                @include('svgs.sliders')
                                <span class="side-menu__label">{{ trans('cruds.slider.title') }}</span>
                            </a>
                        </li>
                        <!-- End::slide -->
                    @endcan
                    @can('front_project_access')
                        <!-- Start::slide -->
                        <li class="slide">
                            <a href="{{ route('admin.front-projects.index') }}" class="side-menu__item">
                                @include('svgs.projects')
                                <span class="side-menu__label">{{ trans('cruds.frontProject.title') }}</span>
                            </a>
                        </li>
                        <!-- End::slide -->
                    @endcan
                    @can('front_achievement_access')
                        <!-- Start::slide -->
                        <li class="slide">
                            <a href="{{ route('admin.front-achievements.index') }}" class="side-menu__item">
                                @include('svgs.medal')
                                <span class="side-menu__label">{{ trans('cruds.frontAchievement.title') }}</span>
                            </a>
                        </li>
                        <!-- End::slide -->
                    @endcan
                    @can('front_partner_access')
                        <!-- Start::slide -->
                        <li class="slide">
                            <a href="{{ route('admin.front-partners.index') }}" class="side-menu__item">
                                @include('svgs.partners')
                                <span class="side-menu__label">{{ trans('cruds.frontPartner.title') }}</span>
                            </a>
                        </li>
                        <!-- End::slide -->
                    @endcan
                    @can('front_review_access')
                        <!-- Start::slide -->
                        <li class="slide">
                            <a href="{{ route('admin.front-reviews.index') }}" class="side-menu__item">
                                @include('svgs.stars')
                                <span class="side-menu__label">{{ trans('cruds.frontReview.title') }}</span>
                            </a>
                        </li>
                        <!-- End::slide -->
                    @endcan
                    @can('front_link_access')
                        <!-- Start::slide -->
                        <li class="slide">
                            <a href="{{ route('admin.front-links.index') }}" class="side-menu__item">
                                @include('svgs.links')
                                <span class="side-menu__label">{{ trans('cruds.frontLink.title') }}</span>
                            </a>
                        </li>
                        <!-- End::slide -->
                    @endcan
                    @can('subscription_access')
                        <!-- Start::slide -->
                        <li class="slide">
                            <a href="{{ route('admin.subscriptions.index') }}" class="side-menu__item">
                                @include('svgs.mail')
                                <span class="side-menu__label">{{ trans('cruds.subscription.title') }}</span>
                            </a>
                        </li>
                        <!-- End::slide -->
                    @endcan 
                @endcan

                @can('general_setting_access')
                    <!-- Start::slide__category -->
                    <li class="slide__category"><span
                            class="category-name">{{ trans('cruds.generalSetting.title') }}</span></li>
                    <!-- End::slide__category -->
                    
                    @can('setting_access')
                        <!-- Start::slide -->
                        <li class="slide">
                            <a href="{{ route('admin.settings.index') }}" class="side-menu__item">
                                @include('svgs.settings')
                                <span class="side-menu__label">{{ trans('cruds.setting.title') }}</span>
                            </a>
                        </li>
                        <!-- End::slide --> 
                    @endcan
                @endcan
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
