
			<header class="app-header">

				<!-- Start::main-header-container -->
				<div class="main-header-container container-fluid">

					<!-- Start::header-content-left -->
					<div class="header-content-left">

						<!-- Start::header-element -->
						<div class="header-element">
							<div class="horizontal-logo">
								<a href="{{url('index')}}" class="header-logo">
									<img src="{{asset('assets/images/brand-logos/toggle-logo.png')}}" alt="logo" class="toggle-logo">
									<img src="{{asset('assets/images/brand-logos/toggle-dark.png')}}" alt="logo" class="toggle-dark">
								</a>
							</div>
						</div>
						<!-- End::header-element -->

						<!-- Start::header-element -->
						<div class="header-element">
							<!-- Start::header-link -->
							<a href="javascript:void(0);" class="sidemenu-toggle header-link" data-bs-toggle="sidebar">
								<span class="open-toggle">
									<i class="ri-menu-3-line fs-20"></i>
								</span>
							</a>
							<!-- End::header-link -->
						</div>
						<!-- End::header-element -->

					</div>
					<!-- End::header-content-left -->

					<!-- Start::header-content-right -->
					<div class="header-content-right">

						<!-- Start::header-element -->
						<div class="header-element align-items-center">
							<!-- Start::header-link|switcher-icon -->
							<div class="btn-list d-lg-none d-flex">
								<a href="{{route('login')}}" class="btn btn-success-light">
									Sign In
								</a>
								<button class="btn btn-icon btn-primary switcher-icon d-flex align-items-center justify-content-center" data-bs-toggle="offcanvas"
									data-bs-target="#switcher-canvas">
									<i class="ri-settings-3-line"></i>
								</button>
							</div>
							<!-- End::header-link|switcher-icon -->
						</div>
						<!-- End::header-element -->

					</div>
					<!-- End::header-content-right -->

				</div>
				<!-- End::main-header-container -->

			</header>