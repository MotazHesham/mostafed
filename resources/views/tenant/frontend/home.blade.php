@extends('tenant.layouts.landing-master')

@section('styles')
@endsection

@section('content')
    <!-- Start:: Section-1 -->
    <div class="landing-banner" id="home">
        <section class="banner-section section">
            <div class="container main-banner-container pb-lg-0">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="mb-5">
                            <p class="mb-3 text-fixed-white deals-tag d-flex align-items-center gap-2"><span
                                    class="avatar avatar-xs bg-info text-fixed-white rounded-circle me-1 shadow-1"><i
                                        class="fe fe-zap"></i></span> GET OUR SERVICES WITH GREAT DEALS </p>
                            <h1 class="mb-3 content-1 text-fixed-white"> Boost Your <span
                                    class="text-warning position-relative"> Business</span> our Template.</h1>
                            <p class="content-2 text-fixed-white">We provide creative solutions that go beyond commercial
                                objectives and are expertly developed.Pushing the boundaries of creativity to surpass
                                business goals.</p>
                        </div>
                        <div class="btn-list">
                            <a href="{{ url('index') }}" class="btn btn-lg btn-secondary mb-2 mb-sm-0"><i
                                    class="fe fe-arrow-right me-2 d-inline-block"></i>Get Started</a>
                            <a href="javascript:void(0);"
                                class="btn btn-lg mb-2 mb-sm-0 bg-transparent border-white-1 text-fixed-white"><i
                                    class="fe fe-phone me-2 d-inline-block"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-lg-5 mt-4 mt-lg-0 text-end">
                        <div class="add-content bg-transparent shadow-none p-0">
                            <div class="add-content1">
                                <img src="{{ global_asset('assets/images/media/media-71.png') }}" alt="img"
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- End:: Section-1 -->

    <!-- Start:: Section-2 -->
    <section class="section bg-white" id="about">
        <div class="container">
            <div class="heading-section">
                <div class="heading-subtitle"><span class="text-primary fw-semibold">About</span></div>
                <hr class="center-diamond">
                <div class="heading-title">Why you choose us? </div>
                <div class="heading-description">Est amet sit vero sanctus labore no sed ipsum ipsum nonumy.</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="card mb-lg-0 home-cards border shadow-none reveal reveal-active">
                        <div class="card-body d-flex main-card-body">
                            <div class="b-icons fs-3 mx-auto br-style5 flex-shrink-0 bg-primary-transparent"><i
                                    class="bx bx-layer lh-0"></i></div>
                            <div class="ms-3">
                                <h5>Easy to Customize</h5>
                                <p class="mb-0 card-main-content">Magna dolore elitr ut et labore stet dolor tempor at
                                    ipsum, amet quis nostrum exercitationem.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-lg-0 home-cards border shadow-none reveal reveal-active">
                        <div class="card-body d-flex main-card-body">
                            <div
                                class="b-icons fs-3 mx-auto br-style5 flex-shrink-0 bg-secondary-transparent text-secondary">
                                <i class="bx bx-package lh-0"></i></div>
                            <div class="ms-3">
                                <h5>Simplified Code </h5>
                                <p class="mb-0 card-main-content">At vero eos et accusamus et iusto odio dignissimos ducimus
                                    qui quidem rerum facilis reprehenderi.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-lg-0 home-cards border shadow-none reveal reveal-active">
                        <div class="card-body d-flex main-card-body">
                            <div class="b-icons fs-3 mx-auto br-style5 flex-shrink-0 bg-info-transparent text-info"><i
                                    class="bx bx-analyse lh-0"></i></div>
                            <div class="ms-3">
                                <h5>Multiple Demos</h5>
                                <p class="mb-0 card-main-content">Blanditiis praesentium voluptatum deleniti atque corrupti
                                    quos dolores rerum hic tenetur.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Section-2 -->

    <!-- Start:: Section-3 -->
    <section class="section bg-background" id="services">
        <div class="container">
            <div class="row">
                <div class="heading-section">
                    <div class="heading-subtitle"><span class="text-primary fw-semibold">Services</span></div>
                    <hr class="center-diamond">
                    <div class="heading-title">Best Services You Can Get !</div>
                    <div class="heading-description">We provide excellent service which ensure repeated
                        customers</div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card bg-custom-white reveal reveal-active custom-card">
                        <div class="position-relative">
                            <a href="javascript:void(0);">
                                <img class="card-img-top"
                                    src="{{ global_asset('assets/images/media/landing/services/1.png') }}" alt="blog-image">
                            </a>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5>Health Services</h5>
                            <span class="d-block mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit</span>
                            <a href="javascript:void(0);" class="fs-14 text-primary fw-semibold">Read More<i
                                    class="bi bi-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card bg-custom-white reveal reveal-active custom-card">
                        <div class="position-relative">
                            <a href="javascript:void(0);">
                                <img class="card-img-top"
                                    src="{{ global_asset('assets/images/media/landing/services/2.png') }}" alt="blog-image">
                            </a>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5>Financial Services</h5>
                            <span class="d-block mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit</span>
                            <a href="javascript:void(0);" class="fs-14 text-primary fw-semibold">Read More<i
                                    class="bi bi-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card bg-custom-white reveal reveal-active custom-card">
                        <div class="position-relative">
                            <a href="javascript:void(0);">
                                <img class="card-img-top"
                                    src="{{ global_asset('assets/images/media/landing/services/3.png') }}" alt="blog-image">
                            </a>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5>Transportation Services</h5>
                            <span class="d-block mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit</span>
                            <a href="javascript:void(0);" class="fs-14 text-primary fw-semibold">Read More<i
                                    class="bi bi-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card bg-custom-white reveal reveal-active custom-card">
                        <div class="position-relative">
                            <a href="javascript:void(0);">
                                <img class="card-img-top"
                                    src="{{ global_asset('assets/images/media/landing/services/4.png') }}"
                                    alt="blog-image">
                            </a>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5>Educational Services</h5>
                            <span class="d-block mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit</span>
                            <a href="javascript:void(0);" class="fs-14 text-primary fw-semibold">Read More<i
                                    class="bi bi-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card bg-custom-white reveal reveal-active custom-card">
                        <div class="position-relative">
                            <a href="javascript:void(0);">
                                <img class="card-img-top"
                                    src="{{ global_asset('assets/images/media/landing/services/5.png') }}"
                                    alt="blog-image">
                            </a>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5>Home Services</h5>
                            <span class="d-block mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit</span>
                            <a href="javascript:void(0);" class="fs-14 text-primary fw-semibold">Read More<i
                                    class="bi bi-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card bg-custom-white reveal reveal-active custom-card">
                        <div class="position-relative">
                            <a href="javascript:void(0);">
                                <img class="card-img-top"
                                    src="{{ global_asset('assets/images/media/landing/services/6.png') }}"
                                    alt="blog-image">
                            </a>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5>Communication Services</h5>
                            <span class="d-block mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit</span>
                            <a href="javascript:void(0);" class="fs-14 text-primary fw-semibold">Read More<i
                                    class="bi bi-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card bg-custom-white reveal reveal-active custom-card">
                        <div class="position-relative">
                            <a href="javascript:void(0);">
                                <img class="card-img-top"
                                    src="{{ global_asset('assets/images/media/landing/services/7.png') }}"
                                    alt="blog-image">
                            </a>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5>Professional Services</h5>
                            <span class="d-block mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit</span>
                            <a href="javascript:void(0);" class="fs-14 text-primary fw-semibold">Read More<i
                                    class="bi bi-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card bg-custom-white reveal reveal-active custom-card">
                        <div class="position-relative">
                            <a href="javascript:void(0);">
                                <img class="card-img-top"
                                    src="{{ global_asset('assets/images/media/landing/services/8.png') }}"
                                    alt="blog-image">
                            </a>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5>Hospitality Services</h5>
                            <span class="d-block mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit</span>
                            <a href="javascript:void(0);" class="fs-14 text-primary fw-semibold">Read More<i
                                    class="bi bi-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Section-3 -->

    <!-- Start:: Section-4 -->
    <section class="section overflow-hidden bg-white" id="features">
        <div class="container">
            <div class="row">
                <div class="heading-section">
                    <div class="heading-subtitle"><span class="text-primary fw-semibold">Highlight Features</span></div>
                    <hr class="center-diamond">
                    <div class="heading-title">Main highlight Features</div>
                    <div class="heading-description">Est amet sit vero sanctus labore no sed ipsum ipsum nonumy.</div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card bg-image add-class theme-cards text-center shadow-none border reveal reveal-active">
                        <div class="card-body main-card-body">
                            <div class="text-primary addons fs-4 mb-3">
                                <i class="bi bi-code-square"></i>
                            </div>
                            <h5>Quality of Code</h5>
                            <p class="card-main-content mb-0">Justo aliquyam duo vero clita aliqua vero eirmod.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card bg-image add-class theme-cards text-center shadow-none border reveal reveal-active">
                        <div class="card-body main-card-body">
                            <div class="text-secondary addons fs-4 mb-3 secondary">
                                <i class="bi bi-bootstrap"></i>
                            </div>
                            <h5>Bootstrap 5</h5>
                            <p class="card-main-content mb-0">Justo aliquyam duo vero clita aliqua vero eirmod.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card bg-image add-class theme-cards text-center shadow-none border reveal reveal-active">
                        <div class="card-body main-card-body">
                            <div class="text-info addons fs-4 mb-3 info">
                                <i class="bi bi-layers"></i>
                            </div>
                            <h5>60+ Pages</h5>
                            <p class="card-main-content mb-0">Justo aliquyam duo vero clita aliqua vero eirmod.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card bg-image add-class theme-cards text-center shadow-none border reveal reveal-active">
                        <div class="card-body main-card-body">
                            <div class="text-warning addons fs-4 mb-3 warning">
                                <i class="bi bi-layout-text-sidebar"></i>
                            </div>
                            <h5>Ready RTL</h5>
                            <p class="card-main-content mb-0">Easy to switch.clita aliqua vero eirmod stet.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card bg-image add-class theme-cards text-center shadow-none border reveal reveal-active">
                        <div class="card-body main-card-body">
                            <div class="text-pink addons fs-4 mb-3 pink">
                                <i class="bi bi-person-lock"></i>
                            </div>
                            <h5>Custom Pages</h5>
                            <p class="card-main-content mb-0">Justo aliquyam duo vero clita aliqua vero eirmod.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card bg-image add-class theme-cards text-center shadow-none border reveal reveal-active">
                        <div class="card-body main-card-body">
                            <div class="text-success addons fs-4 mb-3 success">
                                <i class="bi bi-display"></i>
                            </div>
                            <h5>Layout Styles</h5>
                            <p class="card-main-content mb-0">Justo aliquyam duo vero clita aliqua vero eirmod.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card bg-image add-class theme-cards text-center shadow-none border reveal reveal-active">
                        <div class="card-body main-card-body">
                            <div class="text-danger addons fs-4 mb-3 danger">
                                <i class="bi bi-palette"></i>
                            </div>
                            <h5>Theme Colors</h5>
                            <p class="card-main-content mb-0">Theme Background and Theme primary were there.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card bg-image add-class theme-cards text-center shadow-none border reveal reveal-active">
                        <div class="card-body main-card-body">
                            <div class="text-purple addons fs-4 mb-3 purple">
                                <i class="bi bi-grid-1x2"></i>
                            </div>
                            <h5>Widgets</h5>
                            <p class="card-main-content mb-0">Justo aliquyam duo vero clita aliqua vero eirmod.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Section-4 -->

    <!-- Start:: Section-5 -->
    <section class="section bg-background bg-background-pattern1">
        <div class="container workflow-container">
            <div class="row gy-3">
                <div class="heading-section">
                    <div class="heading-subtitle"><span class="text-primary fw-semibold">Work Flow</span>
                    </div>
                    <hr class="center-diamond">
                    <div class="heading-title">Our work flow is Awesome !</div>
                    <div class="heading-description">Our work flow starts right from the booking of the appointment.</div>
                </div>
                <div class="col-xl-4">
                    <div class="px-3">
                        <div class="card mb-5">
                            <div class="card-body main-card-body">
                                <div>
                                    <span class="svg-gradient mx-auto svg-container">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" id="Finance">
                                            <path fill="#544efd"
                                                style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;white-space:normal;isolation:auto;mix-blend-mode:normal;"
                                                d="M-432.873 1359.588a.5.5 0 0 0-.227.059l-8.212 4.355.468.885 7.772-4.123 2.746 5.18.883-.469-2.98-5.621a.5.5 0 0 0-.45-.266z"
                                                color="#000" transform="translate(456.5 -1353.371)"
                                                class="color2b79c2 svgShape"></path>
                                            <path fill="#544efd"
                                                style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;white-space:normal;isolation:auto;mix-blend-mode:normal;"
                                                d="M-436.693 1357.387a.5.5 0 0 0-.346.144l-4.941 4.94.707.709 4.587-4.586 2.403 2.402.707-.707-2.756-2.756a.5.5 0 0 0-.361-.146z"
                                                color="#000" transform="translate(456.5 -1353.371)"
                                                class="color2b79c2 svgShape"></path>
                                            <path
                                                style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;white-space:normal;isolation:auto;mix-blend-mode:normal;"
                                                d="M-440.936 1365.371v1h11.436c.563 0 1 .437 1 1v13c0 .563-.437 1-1 1h-19c-.563 0-1-.437-1-1v-10.76h-1v10.76c0 1.1.9 2 2 2h19c1.1 0 2-.9 2-2v-13c0-1.1-.9-2-2-2h-11.436z"
                                                color="#000" transform="translate(456.5 -1353.371)" fill="#8d54ea"
                                                class="color000000 svgShape"></path>
                                            <path style="isolation:auto;mix-blend-mode:normal;"
                                                d="M-440.5 1367.37h1v1h-1zm2 0h1v1h-1zm2 0h1v1h-1zm2 0h1v1h-1zm2 0h1v1h-1zm2 0h1v1h-1zm0 2h1v1h-1zm0 8h1v1h-1zm0 2h1v1h-1zm-2 0h1v1h-1zm-16-8h1v1h-1zm0 2h1v1h-1zm0 2h1v1h-1zm0 2h1v1h-1zm0 2h1v1h-1zm2 0h1v1h-1zm2 0h1v1h-1zm2 0h1v1h-1zm2 0h1v1h-1zm2 0h1v1h-1zm2 0h1v1h-1zm2 0h1v1h-1z"
                                                color="#000" transform="translate(456.5 -1353.371)" fill="#8d54ea"
                                                class="color000000 svgShape"></path>
                                            <path
                                                style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;white-space:normal;isolation:auto;mix-blend-mode:normal;"
                                                d="M-434 1371.371a2.506 2.506 0 0 0-2.5 2.5c0 1.376 1.124 2.5 2.5 2.5h6a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 0-.5-.5h-6zm0 1h5.5v3h-5.5c-.84 0-1.5-.66-1.5-1.5s.66-1.5 1.5-1.5z"
                                                color="#000" transform="translate(456.5 -1353.371)" fill="#8d54ea"
                                                class="color000000 svgShape"></path>
                                            <path style="isolation:auto;mix-blend-mode:normal;" d="M-434.5 1373.37h1v1h-1z"
                                                color="#000" transform="translate(456.5 -1353.371)" fill="#8d54ea"
                                                class="color000000 svgShape"></path>
                                            <path fill="#544efd"
                                                style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;white-space:normal;isolation:auto;mix-blend-mode:normal;"
                                                d="M-446.5 1359.37c-3.308 0-6 2.691-6 6 0 3.307 2.692 6 6 6s6-2.693 6-6c0-3.309-2.692-6-6-6zm0 1c2.767 0 5 2.232 5 5 0 2.766-2.233 5-5 5s-5-2.234-5-5c0-2.768 2.233-5 5-5z"
                                                color="#000" transform="translate(456.5 -1353.371)"
                                                class="color2b79c2 svgShape"></path>
                                            <path fill="#544efd"
                                                d="M11.21 13.538q0-.19-.066-.35-.066-.16-.216-.299-.144-.139-.383-.256-.233-.118-.566-.228-.443-.122-.799-.282-.349-.164-.599-.383-.244-.219-.377-.505-.127-.287-.127-.661 0-.346.11-.632.117-.286.328-.497.216-.21.521-.345.305-.135.683-.181v-.926h.782v.93q.776.105 1.198.602.427.493.427 1.348h-.97q0-.283-.073-.518-.066-.236-.2-.409-.133-.172-.332-.27-.2-.096-.455-.096-.266 0-.46.071-.195.072-.328.203-.127.126-.194.307-.061.18-.061.4 0 .202.061.366.067.16.216.295.15.135.389.257.244.118.599.231.455.13.804.295.35.16.588.375.239.215.36.497.123.282.123.652 0 .362-.128.653-.128.286-.36.497-.233.21-.566.337-.333.126-.75.168v.808h-.77v-.808q-.35-.037-.677-.156-.327-.118-.582-.34-.25-.224-.4-.56-.15-.342-.15-.818h.977q0 .358.105.594t.277.375q.172.139.383.193.211.055.422.055.294 0 .521-.067.233-.071.388-.198.161-.13.245-.311.083-.185.083-.413z"
                                                class="color2b79c2 svgShape"></path>
                                        </svg></span>
                                </div>
                                <div class="mb-2 mt-4">
                                    <h5 class="mb-0">Emphasize Efficiency</h5>
                                </div>
                                <div class="mb-0">
                                    <span class="card-main-content">Our workflow is designed to minimize wasted time,which
                                        enables you to complete tasks faster and more efficiently.</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <span
                                class="avatar avatar-md avatar-rounded bg-primary-transparent text-primary fw-semibold border-0 workflow-bottom-design">01</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="px-3">
                        <div class="text-center mb-5">
                            <span
                                class="avatar avatar-md avatar-rounded  bg-primary-transparent text-primary fw-semibold border-0 workflow-top-design">02</span>
                        </div>
                        <div class="card">
                            <div class="card-body main-card-body">
                                <div>
                                    <span class="svg-gradient mx-auto svg-container">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128" id="IdeaConcept">
                                            <path fill="#544efd"
                                                d="M64 13.481a2 2 0 0 0 2-2V8.5a2 2 0 0 0-4 0v2.981a2 2 0 0 0 2 2zM73.941 15.487a2 2 0 0 0 2.62-1.064l1.161-2.747a2 2 0 0 0-3.685-1.557l-1.161 2.747a2.001 2.001 0 0 0 1.065 2.621zM83.472 21.545a1.99 1.99 0 0 0 1.414-.586l2.108-2.108a2 2 0 1 0-2.828-2.828l-2.108 2.108a2 2 0 0 0 1.414 3.414zM87.531 29.074a2 2 0 0 0 2.62 1.064l2.747-1.161a2 2 0 1 0-1.557-3.685l-2.747 1.161a2.002 2.002 0 0 0-1.063 2.621zM89.538 39.012a2 2 0 0 0 2 2h2.981a2 2 0 0 0 0-4h-2.981a2 2 0 0 0-2 2zM51.439 14.423a2 2 0 1 0 3.684-1.557l-1.16-2.747a2 2 0 1 0-3.685 1.557l1.161 2.747zM43.114 20.959c.391.39.902.585 1.414.585s1.024-.195 1.415-.586a2 2 0 0 0 0-2.829l-2.108-2.108a2 2 0 0 0-2.829 2.829l2.108 2.109zM35.101 28.978l2.748 1.161a2 2 0 1 0 1.556-3.685l-2.748-1.161a2 2 0 1 0-1.556 3.685zM33.481 41.012h2.982a2 2 0 0 0 0-4h-2.982a2 2 0 0 0 0 4zM51.075 55.369a3.886 3.886 0 0 1 1.497 3.063v.965a2 2 0 0 0 2 2H64a2 2 0 0 0 2-2v-12.18c3.492-.894 6.084-4.057 6.084-7.822 0-4.457-3.626-8.083-8.084-8.083s-8.084 3.626-8.084 8.083c0 3.766 2.593 6.929 6.084 7.822v10.18h-5.502a7.863 7.863 0 0 0-2.944-5.168 16.743 16.743 0 0 1-6.41-13.217c0-4.782 2.046-9.357 5.613-12.553 3.617-3.24 8.292-4.729 13.163-4.192 7.858.866 14.255 7.473 14.88 15.368.449 5.66-1.938 11.125-6.385 14.617a7.796 7.796 0 0 0-2.988 6.172v6.728c0 .559-.458 1.013-1.02 1.013h-1.521a2 2 0 0 0-2 2 2.89 2.89 0 0 1-2.887 2.886 2.89 2.89 0 0 1-2.887-2.886 2 2 0 0 0-2-2h-4.541a2 2 0 0 0 0 4h2.837c.859 2.825 3.489 4.886 6.591 4.886 3.109 0 5.74-2.071 6.594-4.905 2.68-.1 4.834-2.293 4.834-4.994v-6.728a3.82 3.82 0 0 1 1.459-3.026 20.835 20.835 0 0 0 7.901-18.079C84 27.383 76.249 19.381 66.358 18.291c-5.932-.655-11.86 1.238-16.27 5.188a20.883 20.883 0 0 0-6.944 15.532c0 6.418 2.891 12.38 7.931 16.358zm8.841-15.973A4.089 4.089 0 0 1 64 35.313c2.252 0 4.084 1.832 4.084 4.083S66.252 43.479 64 43.479s-4.084-1.832-4.084-4.083z"
                                                class="color1ac6bd svgShape"></path>
                                            <path fill="#8d54ea"
                                                d="M96.027 94.564a2 2 0 0 0-2 2v5.777L66 116.272V97.087a2 2 0 0 0-4 0v19.173l-27.896-13.984V96.63a2 2 0 0 0-4 0v6.881c0 .04.009.077.012.117.004.072.01.143.022.214.011.064.026.125.043.186.017.062.034.124.057.184.023.061.05.12.079.178a1.842 1.842 0 0 0 .326.477c.043.046.089.089.136.13.049.043.098.086.151.124.056.041.116.077.177.112.035.02.065.046.102.065l31.896 15.989c.017.008.035.011.052.019.096.045.196.079.299.108.037.011.073.026.111.034.14.031.285.05.434.05.149 0 .293-.019.433-.05.037-.008.071-.023.108-.033.104-.029.205-.063.302-.108.016-.007.033-.01.048-.017l32.027-15.919c.037-.018.067-.044.102-.064.062-.036.124-.072.182-.114.053-.038.1-.08.148-.122a1.907 1.907 0 0 0 .373-.439c.034-.055.063-.112.092-.169.029-.058.056-.116.079-.177s.041-.123.058-.186c.016-.061.032-.121.043-.183.012-.072.018-.144.022-.218.002-.04.012-.077.012-.117v-7.017a2.005 2.005 0 0 0-2.003-2.001z"
                                                class="color5277a3 svgShape"></path>
                                            <path fill="#8d54ea"
                                                d="m115.301 75.97-14.739-4.841L115.785 61l.011-.009c.014-.009.025-.022.039-.032a2.017 2.017 0 0 0 .439-.432c.11-.147.201-.304.266-.472.003-.008.009-.013.012-.021.017-.045.023-.092.036-.138.02-.07.042-.138.055-.21.012-.065.015-.13.02-.195.005-.064.012-.127.011-.191-.001-.066-.01-.131-.018-.196-.007-.064-.013-.127-.027-.19-.014-.064-.035-.126-.055-.189-.019-.061-.037-.121-.063-.181-.029-.068-.067-.132-.104-.196-.023-.04-.039-.083-.065-.122l-.02-.025c-.043-.063-.095-.12-.146-.178-.037-.042-.07-.088-.11-.126-.043-.042-.094-.077-.141-.115-.056-.045-.109-.093-.169-.131-.039-.025-.083-.043-.124-.066-.076-.041-.151-.083-.23-.114-.009-.003-.016-.009-.025-.012l-25.304-9.436a2 2 0 0 0-1.398 3.748l21.633 8.067-14.426 9.598-13.023-6.473a2 2 0 0 0-1.78 3.582l10.455 5.197-27.53 13.685-27.421-13.746 10.332-5.134a2 2 0 1 0-1.78-3.582l-12.881 6.4-14.361-9.628 21.431-7.965a2 2 0 0 0-1.393-3.749l-25.093 9.326a2 2 0 0 0-.417 3.536l15.172 10.171-14.897 4.914a2.001 2.001 0 0 0-.264 3.691L44.459 95.58a1.995 1.995 0 0 0 1.514.109l18.023-5.92 17.943 5.958a2.002 2.002 0 0 0 1.52-.107l32.107-15.959a1.997 1.997 0 0 0 1.104-1.935 1.994 1.994 0 0 0-1.369-1.756zM45.505 91.632 18.57 78.244l13.376-4.413 26.82 13.445-13.261 4.356zm36.913.039-13.183-4.377L96.182 73.9l13.24 4.349-27.004 13.422z"
                                                class="color5277a3 svgShape"></path>
                                        </svg>
                                    </span>
                                </div>
                                <div class="mb-2 mt-4">
                                    <h5 class="mb-0">Flexibility</h5>
                                </div>
                                <div class="mb-0">
                                    <span class="card-main-content">Our workflow is designed to be flexible and adaptable
                                        to changing circumstances &amp; quickly respond.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="px-3">
                        <div class="card mb-5">
                            <div class="card-body main-card-body">
                                <div>
                                    <span class="svg-gradient mx-auto svg-container">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"
                                            image-rendering="optimizeQuality" shape-rendering="geometricPrecision"
                                            text-rendering="geometricPrecision" viewBox="0 0 512 512">
                                            <path fill="#8d54ea"
                                                d="M347.73 266.36c-3.31 0-6-2.69-6-6l0-18.31c0-47.28-38.46-85.74-85.73-85.74-47.28 0-85.74 38.46-85.74 85.74l0 18.31c0 3.31-2.68 6-6 6-3.31 0-6-2.69-6-6l0-18.31c0-53.89 43.85-97.74 97.74-97.74 53.89 0 97.73 43.85 97.73 97.74l0 18.31c0 3.31-2.68 6-6 6zM289.3 354.14c-3.2 0-5.86-2.53-5.99-5.75-.14-3.32 2.43-6.11 5.74-6.25 29.56-1.23 33.76-25.21 33.93-26.23.52-3.26 3.59-5.49 6.84-4.99 3.26.51 5.51 3.53 5.02 6.8-1.79 12.01-13.56 35.09-45.29 36.41-.08 0-.17.01-.25.01z"
                                                class="color5a5a5a svgShape"></path>
                                            <path fill="#8d54ea"
                                                d="M268.43 367.69c-15.07 0-26.88-8.59-26.88-19.55 0-10.97 11.81-19.55 26.88-19.55 15.07 0 26.87 8.58 26.87 19.55 0 10.96-11.81 19.55-26.87 19.55zm0-27.1c-8.38 0-14.88 4.06-14.88 7.55 0 3.49 6.5 7.55 14.88 7.55 8.37 0 14.87-4.06 14.87-7.55 0-3.49-6.5-7.55-14.87-7.55zM347.73 322.83l-18.82 0c-3.31 0-6-2.69-6-6l0-56.47c0-3.32 2.69-6 6-6l18.82 0c18.88 0 34.24 15.36 34.24 34.23 0 18.88-15.36 34.24-34.24 34.24zm-12.82-12l12.82 0c12.26 0 22.24-9.98 22.24-22.24 0-12.26-9.98-22.23-22.24-22.23l-12.82 0 0 44.47zM183.09 322.83l-18.82 0c-18.88 0-34.24-15.36-34.24-34.24 0-18.87 15.36-34.23 34.24-34.23l18.82 0c3.31 0 6 2.69 6 6l0 56.47c0 3.32-2.69 6-6 6zm-18.82-56.47c-12.27 0-22.24 9.97-22.24 22.23 0 12.26 9.97 22.24 22.24 22.24l12.82 0 0-44.47-12.82 0 0 0z"
                                                class="color5a5a5a svgShape"></path>
                                            <path fill="#544efd"
                                                d="M256 460.6c-0.82,0 -1.63,-0.17 -2.4,-0.5 -72.15,-31.47 -111.87,-69.94 -132.49,-96.67 -22.66,-29.38 -27.95,-51.26 -28.16,-52.18 -0.11,-0.44 -0.16,-0.9 -0.16,-1.36l0 -191.33c0,-2.48 1.52,-4.7 3.82,-5.6l157.21 -61.15c1.4,-0.55 2.96,-0.55 4.35,0l157.22 61.15c2.3,0.9 3.82,3.12 3.82,5.6l0 191.33c0,0.46 -0.05,0.91 -0.16,1.36 -0.21,0.92 -5.5,22.8 -28.16,52.18 -20.62,26.73 -60.34,65.19 -132.49,96.67 -0.77,0.33 -1.58,0.5 -2.4,0.5zm-151.21 -151.49c0.99,3.55 7,22.79 26.35,47.66 19.53,25.13 57.01,61.22 124.86,91.28 67.85,-30.06 105.33,-66.15 124.86,-91.28 19.33,-24.84 25.34,-44.07 26.35,-47.66l0 -186.45 -151.21 -58.82 -151.21 58.82 0 186.45z"
                                                class="colorcced00 svgShape"></path>
                                            <path fill="#544efd"
                                                d="M256 512c-0.82,0 -1.63,-0.17 -2.4,-0.5 -90.52,-39.49 -140.33,-87.71 -166.17,-121.22 -28.32,-36.71 -34.9,-63.94 -35.17,-65.08 -0.11,-0.45 -0.16,-0.91 -0.16,-1.36l0 -240.86c0,-2.47 1.52,-4.69 3.83,-5.59l197.9 -76.98c1.39,-0.54 2.95,-0.54 4.35,0l197.89 76.98c2.31,0.9 3.83,3.12 3.83,5.59l0 240.86c0,0.45 -0.06,0.91 -0.16,1.36 -0.27,1.14 -6.85,28.37 -35.17,65.08 -25.84,33.51 -75.65,81.73 -166.17,121.22 -0.77,0.33 -1.58,0.5 -2.4,0.5zm-191.9 -188.93c1.13,4.08 8.6,28.68 33.36,60.56 24.76,31.89 72.32,77.75 158.54,115.81 86.67,-38.26 134.31,-84.39 159.06,-116.49 24.47,-31.72 31.73,-55.81 32.84,-59.88l0 -235.98 -191.9 -74.65 -191.9 74.65 0 235.98z"
                                                class="colorcced00 svgShape"></path>
                                        </svg>
                                    </span>
                                </div>
                                <div class="mb-2 mt-4">
                                    <h5 class="mb-0">Quality Control</h5>
                                </div>
                                <div class="mb-0">
                                    <span class="card-main-content">Our workflow is designed to ensure quality
                                        control,which enables you to produce high-quality services for customers.</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <span
                                class="avatar avatar-md avatar-rounded bg-primary-transparent text-primary fw-semibold border-0 workflow-bottom-design">03</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Section-5 -->

    <!-- Start:: Section-6 -->
    <section class="section bg-white" id="pricing">
        <div class="container">
            <div class="text-center">
                <p class="fs-12 fw-medium text-success mb-1"><span
                        class="landing-section-heading text-primary">PRICING</span>
                </p>
                <h4 class="fw-semibold mt-3 mb-2">Plans that flex with your needs.</h4>
                <div class="row justify-content-center">
                    <div class="col-xl-7">
                        <p class="text-muted fs-14 mb-5 fw-normal">Stay agile with plans that seamlessly adjust to your
                            changing requirements, ensuring you always have the flexibility you need.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="text-center mb-5 mt-4">
                        <div class="tab-style-1 border p-1 bg-white shadow-sm rounded-pill d-inline-block">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <button type="button" class="nav-link rounded-pill active fw-medium"
                                        data-bs-toggle="pill" data-bs-target="#pills-monthly">Monthly</button>
                                </li>
                                <li class="nav-item">
                                    <button type="button" class="nav-link rounded-pill fw-medium" data-bs-toggle="pill"
                                        data-bs-target="#pills-yearly">Annually <span
                                            class="badge bg-info ms-1 rounded-pill">Save 10%</span></button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane show active p-0 border-0" id="pills-monthly">
                            <div class="row align-items-center">
                                <div class="col-lg-4">
                                    <div class="card reveal">
                                        <div class="card-body main-card-body">
                                            <div class="pricing-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <path opacity=".5"
                                                        d="M21.951 9.67a1 1 0 0 0-.807-.68l-5.699-.828-2.548-5.164A.978.978 0 0 0 12 2.486v16.28l5.097 2.679a1 1 0 0 0 1.451-1.054l-.973-5.676 4.123-4.02a1 1 0 0 0 .253-1.025z" />
                                                    <path
                                                        d="M11.103 2.998 8.555 8.162l-5.699.828a1 1 0 0 0-.554 1.706l4.123 4.019-.973 5.676a1 1 0 0 0 1.45 1.054L12 18.765V2.503c-.356.001-.703.167-.897.495z" />
                                                </svg>
                                            </div>
                                            <h4 class="mb-3">Advance</h4>
                                            <p class="mb-4">Lorem invidunt ea clita consetetur ea rebum sit accusam
                                                ipsum,.</p>
                                            <h6 class="mb-4 fs-3">$96.9<span class="fs-14 text-muted op-7">&nbsp; /
                                                    month</span></h6>
                                            <ul class="list-unstyled fs-14  mb-4">
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2 text-primary"><i
                                                                class="fe fe-check-circle"></i></span>
                                                        <span class="flex-grow-1">Web Design</span>
                                                    </div>
                                                </li>
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2 text-primary"><i
                                                                class="fe fe-check-circle"></i></span>
                                                        <span class="flex-grow-1">Data Security and Backups</span>
                                                    </div>
                                                </li>
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2 text-primary"><i
                                                                class="fe fe-check-circle"></i></span>
                                                        <span class="flex-grow-1">3 Users</span>
                                                    </div>
                                                </li>
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2 text-primary"><i
                                                                class="fe fe-check-circle"></i></span>
                                                        <span class="flex-grow-1">2 Websites</span>
                                                    </div>
                                                </li>
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2 text-primary"><i
                                                                class="fe fe-check-circle"></i></span>
                                                        <span class="flex-grow-1">24/7 priority support</span>
                                                    </div>
                                                </li>
                                                <li class="list-item">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2 text-primary"><i
                                                                class="fe fe-check-circle"></i></span>
                                                        <span class="flex-grow-1">Customization <a aria-label="anchor"
                                                                href="javascript:void(0);" data-bs-toggle="tooltip"
                                                                title="customized solutions tailored to your specific requirements."
                                                                class="ms-1 op-4 all-ease-03 text-primary"><i
                                                                    class="bi bi-info-circle-fill fs-14"></i></a></span>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="d-grid">
                                                <a href="javascript:void(0);" class="btn btn-lg btn-primary-light">Buy
                                                    Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card pricing-card03 reveal">
                                        <div class="card-body main-card-body">
                                            <div class="pricing-icon bg-primary text-fixed-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <path
                                                        d="M12,14.19531c-0.17551-0.00004-0.34793-0.04618-0.5-0.13379l-9-5.19726C2.02161,8.58794,1.85779,7.97612,2.13411,7.49773C2.22187,7.34579,2.34806,7.2196,2.5,7.13184l9-5.19336c0.30964-0.17774,0.69036-0.17774,1,0l9,5.19336c0.4784,0.27632,0.64221,0.88814,0.36589,1.36653C21.77813,8.65031,21.65194,8.7765,21.5,8.86426l-9,5.19726C12.34793,14.14913,12.17551,14.19527,12,14.19531z" />
                                                    <path opacity=".7"
                                                        d="M21.5,11.13184l-1.96411-1.13337L12.5,14.06152c-0.30947,0.17839-0.69053,0.17839-1,0L4.46411,9.99847L2.5,11.13184c-0.47839,0.27632-0.64221,0.88814-0.36589,1.36653C2.22187,12.65031,2.34806,12.7765,2.5,12.86426l9,5.19726c0.30947,0.17838,0.69053,0.17838,1,0l9-5.19726c0.4784-0.27632,0.64221-0.88814,0.36589-1.36653C21.77813,11.34579,21.65194,11.2196,21.5,11.13184z" />
                                                    <path opacity=".5"
                                                        d="M21.5,15.13184l-1.96411-1.13337L12.5,18.06152c-0.30947,0.17838-0.69053,0.17838-1,0l-7.03589-4.06305L2.5,15.13184c-0.47839,0.27632-0.64221,0.88814-0.36589,1.36653C2.22187,16.65031,2.34806,16.7765,2.5,16.86426l9,5.19726c0.30947,0.17838,0.69053,0.17838,1,0l9-5.19726c0.4784-0.27632,0.64221-0.88814,0.36589-1.36653C21.77813,15.34579,21.65194,15.2196,21.5,15.13184z" />
                                                </svg>
                                            </div>
                                            <h4 class="mb-3">Essential</h4>
                                            <p class="mb-4 op-7">Lorem invidunt ea clita consetetur ea rebum sit accusam
                                                ipsum,.</p>
                                            <h1 class="mb-4">$79.9<span class="fs-14 text-muted">&nbsp; / month</span>
                                            </h1>
                                            <ul class="list-unstyled fs-14  mb-4">
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2"><i
                                                                class="fe fe-check-circle text-primary"></i></span>
                                                        <span class="flex-grow-1">Web Design</span>
                                                    </div>
                                                </li>
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2"><i
                                                                class="fe fe-check-circle text-primary"></i></span>
                                                        <span class="flex-grow-1">Data Security and Backups</span>
                                                    </div>
                                                </li>
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2"><i
                                                                class="fe fe-check-circle text-primary"></i></span>
                                                        <span class="flex-grow-1">Business Sevices</span>
                                                    </div>
                                                </li>
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2"><i
                                                                class="fe fe-check-circle text-primary"></i></span>
                                                        <span class="flex-grow-1">2 Users</span>
                                                    </div>
                                                </li>
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2"><i
                                                                class="fe fe-check-circle text-primary"></i></span>
                                                        <span class="flex-grow-1">1 Websites</span>
                                                    </div>
                                                </li>
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2"><i
                                                                class="fe fe-check-circle text-primary"></i></span>
                                                        <span class="flex-grow-1">24/7 priority support</span>
                                                    </div>
                                                </li>
                                                <li class="list-item">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2"><i
                                                                class="fe fe-check-circle text-primary"></i></span>
                                                        <span class="flex-grow-1">Customization <a aria-label="anchor"
                                                                href="javascript:void(0);" data-bs-toggle="tooltip"
                                                                title="customized solutions tailored to your specific requirements."
                                                                class="ms-1 op-7 all-ease-03 text-fixed-white"><i
                                                                    class="bi bi-info-circle-fill fs-14"></i></a></span>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="d-grid">
                                                <a href="javascript:void(0);" class="btn btn-lg btn-primary">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card reveal">
                                        <div class="card-body main-card-body">
                                            <div class="pricing-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <path opacity=".5"
                                                        d="M19 6H5a3 3 0 0 0-3 3v2.72L8.837 14h6.326L22 11.72V9a3 3 0 0 0-3-3z" />
                                                    <path
                                                        d="M10 6V5h4v1h2V5a2.002 2.002 0 0 0-2-2h-4a2.002 2.002 0 0 0-2 2v1h2zm-1.163 8L2 11.72V18a3.003 3.003 0 0 0 3 3h14a3.003 3.003 0 0 0 3-3v-6.28L15.163 14H8.837z" />
                                                </svg>
                                            </div>
                                            <h4 class="mb-3">Pro</h4>
                                            <p class="mb-4">Lorem invidunt ea clita consetetur ea rebum sit accusam
                                                ipsum,.</p>
                                            <h6 class="mb-4 fs-3">$125.5<span class="fs-14 text-muted op-7">&nbsp; /
                                                    month</span></h6>
                                            <ul class="list-unstyled fs-14  mb-4">
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2 text-primary"><i
                                                                class="fe fe-check-circle"></i></span>
                                                        <span class="flex-grow-1">Web Design</span>
                                                    </div>
                                                </li>
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2 text-primary"><i
                                                                class="fe fe-check-circle"></i></span>
                                                        <span class="flex-grow-1">Data Security and Backups</span>
                                                    </div>
                                                </li>
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2 text-primary"><i
                                                                class="fe fe-check-circle"></i></span>
                                                        <span class="flex-grow-1">Unlimited Users</span>
                                                    </div>
                                                </li>
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2 text-primary"><i
                                                                class="fe fe-check-circle"></i></span>
                                                        <span class="flex-grow-1">Unlimited Websites</span>
                                                    </div>
                                                </li>
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2 text-primary"><i
                                                                class="fe fe-check-circle"></i></span>
                                                        <span class="flex-grow-1">24/7 priority support</span>
                                                    </div>
                                                </li>
                                                <li class="list-item">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2 text-primary"><i
                                                                class="fe fe-check-circle"></i></span>
                                                        <span class="flex-grow-1">Customization <a aria-label="anchor"
                                                                href="javascript:void(0);" data-bs-toggle="tooltip"
                                                                title="customized solutions tailored to your specific requirements."
                                                                class="ms-1 op-4 all-ease-03 text-primary"><i
                                                                    class="bi bi-info-circle-fill fs-14"></i></a></span>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="d-grid">
                                                <a href="javascript:void(0);" class="btn btn-lg btn-primary-light">Buy
                                                    Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane p-0 border-0" id="pills-yearly">
                            <div class="row align-items-center">
                                <div class="col-lg-4">
                                    <div class="card reveal">
                                        <div class="card-body main-card-body">
                                            <div class="pricing-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <path opacity=".5"
                                                        d="M21.951 9.67a1 1 0 0 0-.807-.68l-5.699-.828-2.548-5.164A.978.978 0 0 0 12 2.486v16.28l5.097 2.679a1 1 0 0 0 1.451-1.054l-.973-5.676 4.123-4.02a1 1 0 0 0 .253-1.025z" />
                                                    <path
                                                        d="M11.103 2.998 8.555 8.162l-5.699.828a1 1 0 0 0-.554 1.706l4.123 4.019-.973 5.676a1 1 0 0 0 1.45 1.054L12 18.765V2.503c-.356.001-.703.167-.897.495z" />
                                                </svg>
                                            </div>
                                            <h4 class="mb-3">Advance</h4>
                                            <p class="mb-4">Lorem invidunt ea clita consetetur ea rebum sit accusam
                                                ipsum,.</p>
                                            <h6 class="mb-4 fs-3">$196.9<span class="fs-14 text-muted op-7">&nbsp; /
                                                    year</span></h6>
                                            <ul class="list-unstyled fs-14  mb-4">
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2 text-primary"><i
                                                                class="fe fe-check-circle"></i></span>
                                                        <span class="flex-grow-1">Web Design</span>
                                                    </div>
                                                </li>
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2 text-primary"><i
                                                                class="fe fe-check-circle"></i></span>
                                                        <span class="flex-grow-1">Data Security and Backups</span>
                                                    </div>
                                                </li>
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2 text-primary"><i
                                                                class="fe fe-check-circle"></i></span>
                                                        <span class="flex-grow-1">2 Users</span>
                                                    </div>
                                                </li>
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2 text-primary"><i
                                                                class="fe fe-check-circle"></i></span>
                                                        <span class="flex-grow-1">Unlimited Websites</span>
                                                    </div>
                                                </li>
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2 text-primary"><i
                                                                class="fe fe-check-circle"></i></span>
                                                        <span class="flex-grow-1">24/7 priority support</span>
                                                    </div>
                                                </li>
                                                <li class="list-item">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2 text-primary"><i
                                                                class="fe fe-check-circle"></i></span>
                                                        <span class="flex-grow-1">Customization <a aria-label="anchor"
                                                                href="javascript:void(0);" data-bs-toggle="tooltip"
                                                                title="customized solutions tailored to your specific requirements."
                                                                class="ms-1 op-4 all-ease-03 text-primary"><i
                                                                    class="bi bi-info-circle-fill fs-14"></i></a></span>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="d-grid">
                                                <a href="javascript:void(0);" class="btn btn-lg btn-primary-light">Buy
                                                    Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card pricing-card03 reveal">
                                        <div class="card-body main-card-body">
                                            <div class="pricing-icon bg-primary text-fixed-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <path
                                                        d="M12,14.19531c-0.17551-0.00004-0.34793-0.04618-0.5-0.13379l-9-5.19726C2.02161,8.58794,1.85779,7.97612,2.13411,7.49773C2.22187,7.34579,2.34806,7.2196,2.5,7.13184l9-5.19336c0.30964-0.17774,0.69036-0.17774,1,0l9,5.19336c0.4784,0.27632,0.64221,0.88814,0.36589,1.36653C21.77813,8.65031,21.65194,8.7765,21.5,8.86426l-9,5.19726C12.34793,14.14913,12.17551,14.19527,12,14.19531z" />
                                                    <path opacity=".7"
                                                        d="M21.5,11.13184l-1.96411-1.13337L12.5,14.06152c-0.30947,0.17839-0.69053,0.17839-1,0L4.46411,9.99847L2.5,11.13184c-0.47839,0.27632-0.64221,0.88814-0.36589,1.36653C2.22187,12.65031,2.34806,12.7765,2.5,12.86426l9,5.19726c0.30947,0.17838,0.69053,0.17838,1,0l9-5.19726c0.4784-0.27632,0.64221-0.88814,0.36589-1.36653C21.77813,11.34579,21.65194,11.2196,21.5,11.13184z" />
                                                    <path opacity=".5"
                                                        d="M21.5,15.13184l-1.96411-1.13337L12.5,18.06152c-0.30947,0.17838-0.69053,0.17838-1,0l-7.03589-4.06305L2.5,15.13184c-0.47839,0.27632-0.64221,0.88814-0.36589,1.36653C2.22187,16.65031,2.34806,16.7765,2.5,16.86426l9,5.19726c0.30947,0.17838,0.69053,0.17838,1,0l9-5.19726c0.4784-0.27632,0.64221-0.88814,0.36589-1.36653C21.77813,15.34579,21.65194,15.2196,21.5,15.13184z" />
                                                </svg>
                                            </div>
                                            <h4 class="mb-3">Essential</h4>
                                            <p class="mb-4 op-7">Lorem invidunt ea clita consetetur ea rebum sit accusam
                                                ipsum,.</p>
                                            <h1 class="mb-4">$179.9<span class="fs-14 text-muted">&nbsp; / year</span>
                                            </h1>
                                            <ul class="list-unstyled fs-14  mb-4">
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2"><i
                                                                class="fe fe-check-circle text-primary"></i></span>
                                                        <span class="flex-grow-1">Web Design</span>
                                                    </div>
                                                </li>
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2"><i
                                                                class="fe fe-check-circle text-primary"></i></span>
                                                        <span class="flex-grow-1">Data Security and Backups</span>
                                                    </div>
                                                </li>
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2"><i
                                                                class="fe fe-check-circle text-primary"></i></span>
                                                        <span class="flex-grow-1">Business Sevices</span>
                                                    </div>
                                                </li>
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2"><i
                                                                class="fe fe-check-circle text-primary"></i></span>
                                                        <span class="flex-grow-1">Unlimited Users</span>
                                                    </div>
                                                </li>
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2"><i
                                                                class="fe fe-check-circle text-primary"></i></span>
                                                        <span class="flex-grow-1">2 Websites</span>
                                                    </div>
                                                </li>
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2"><i
                                                                class="fe fe-check-circle text-primary"></i></span>
                                                        <span class="flex-grow-1">24/7 priority support</span>
                                                    </div>
                                                </li>
                                                <li class="list-item">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2"><i
                                                                class="fe fe-check-circle text-primary"></i></span>
                                                        <span class="flex-grow-1">Customization <a aria-label="anchor"
                                                                href="javascript:void(0);" data-bs-toggle="tooltip"
                                                                title="customized solutions tailored to your specific requirements."
                                                                class="ms-1 op-7 all-ease-03 text-fixed-white"><i
                                                                    class="bi bi-info-circle-fill fs-14"></i></a></span>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="d-grid">
                                                <a href="javascript:void(0);" class="btn btn-lg btn-primary">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card reveal">
                                        <div class="card-body main-card-body">
                                            <div class="pricing-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <path opacity=".5"
                                                        d="M19 6H5a3 3 0 0 0-3 3v2.72L8.837 14h6.326L22 11.72V9a3 3 0 0 0-3-3z" />
                                                    <path
                                                        d="M10 6V5h4v1h2V5a2.002 2.002 0 0 0-2-2h-4a2.002 2.002 0 0 0-2 2v1h2zm-1.163 8L2 11.72V18a3.003 3.003 0 0 0 3 3h14a3.003 3.003 0 0 0 3-3v-6.28L15.163 14H8.837z" />
                                                </svg>
                                            </div>
                                            <h4 class="mb-3">Pro</h4>
                                            <p class="mb-4">Lorem invidunt ea clita consetetur ea rebum sit accusam
                                                ipsum,.</p>
                                            <h6 class="mb-4 fs-3">$1125.5<span class="fs-14 text-muted op-7">&nbsp; /
                                                    year</span></h6>
                                            <ul class="list-unstyled fs-14  mb-4">
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2 text-primary"><i
                                                                class="fe fe-check-circle"></i></span>
                                                        <span class="flex-grow-1">Web Design</span>
                                                    </div>
                                                </li>
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2 text-primary"><i
                                                                class="fe fe-check-circle"></i></span>
                                                        <span class="flex-grow-1">Data Security and Backups</span>
                                                    </div>
                                                </li>
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2 text-primary"><i
                                                                class="fe fe-check-circle"></i></span>
                                                        <span class="flex-grow-1">2 Users</span>
                                                    </div>
                                                </li>
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2 text-primary"><i
                                                                class="fe fe-check-circle"></i></span>
                                                        <span class="flex-grow-1">2 Websites</span>
                                                    </div>
                                                </li>
                                                <li class="list-item mb-3">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2 text-primary"><i
                                                                class="fe fe-check-circle"></i></span>
                                                        <span class="flex-grow-1">24/7 priority support</span>
                                                    </div>
                                                </li>
                                                <li class="list-item">
                                                    <div class="d-flex align-items-center-start">
                                                        <span class="me-2 text-primary"><i
                                                                class="fe fe-check-circle"></i></span>
                                                        <span class="flex-grow-1">Customization <a aria-label="anchor"
                                                                href="javascript:void(0);" data-bs-toggle="tooltip"
                                                                title="customized solutions tailored to your specific requirements."
                                                                class="ms-1 op-4 all-ease-03 text-primary"><i
                                                                    class="bi bi-info-circle-fill fs-14"></i></a></span>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="d-grid">
                                                <a href="javascript:void(0);" class="btn btn-lg btn-primary-light">Buy
                                                    Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Section-6 -->

    <!-- Start:: Section-7 -->
    <section class="section blob-bg-sec bg-primary">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5 my-auto">
                    <div
                        class="d-flex align-items-center justify-content-center trusted-companies sub-card-companies flex-wrap mb-3 mb-xl-0 gap-4">
                        <div class="trust-img reveal reveal-active"><img
                                src="{{ global_asset('assets/images/media/landing/tools/1.png') }}" alt="img"
                                class="border-0"></div>
                        <div class="trust-img reveal reveal-active"><img
                                src="{{ global_asset('assets/images/media/landing/tools/2.png') }}" alt="img"
                                class="border-0"></div>
                        <div class="trust-img reveal reveal-active"><img
                                src="{{ global_asset('assets/images/media/landing/tools/3.png') }}" alt="img"
                                class="border-0"></div>
                        <div class="trust-img reveal reveal-active"><img
                                src="{{ global_asset('assets/images/media/landing/tools/4.png') }}" alt="img"
                                class="border-0"></div>
                        <div class="trust-img reveal reveal-active"><img
                                src="{{ global_asset('assets/images/media/landing/tools/5.png') }}" alt="img"
                                class="border-0"></div>
                        <div class="trust-img reveal me-0 reveal-active"><img
                                src="{{ global_asset('assets/images/media/landing/tools/6.png') }}" alt="img"
                                class="border-0"></div>
                    </div>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0 reveal reveal-active">
                    <div class="heading-section mb-0">
                        <h5 class="heading-title text-fixed-white text-start">Our Template Developed on These Tools</h5>
                        <div class="heading-description text-fixed-white text-start op-8">Ullamco laboris nisi ut aliquip
                            ex ea commodo.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                            doloremque laudantium, totam rem aperiam.perspiciatis unde omnis.</div>
                        <div class="mt-4 d-flex align-items-center justify-content-start">
                            <a href="{{ url('index') }}" class="btn btn-lg btn-secondary me-3 mb-2 mb-sm-0 mb-4">Get
                                Started Now</a>
                            <a href="{{ url('index') }}"
                                class="mb-sm-0 text-fixed-white text-decoration-underline link-offset-1">Discover More<i
                                    class="fe fe-arrow-right fs-14 align-text-bottom ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Section-7 -->

    <!-- Start:: Section-8 -->
    <section class="section bg-white" id="team">
        <div class="container TeamContainer">
            <div class="heading-section">
                <div class="heading-subtitle"><span class="text-primary fw-semibold">Our Team</span></div>
                <hr class="center-diamond">
                <div class="heading-title">We Have a Team of Experts</div>
                <div class="heading-description">Meet our team member to save your time</div>
            </div>
            <div class="swiper teamSwiper swiper-initialized swiper-horizontal swiper-pointer-events">
                <div class="swiper-wrapper" id="swiper-wrapper-b3161d4d96561d9b" aria-live="off"
                    style="transform: translate3d(-2210px, 0px, 0px); transition-duration: 0ms;">
                    <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next"
                        data-swiper-slide-index="3" role="group" aria-label="4 / 6"
                        style="width: 412px; margin-right: 30px;">
                        <div class="card border text-center feature-card-15 shadow-none reveal reveal-active">
                            <div class="card-body main-card-body">
                                <div class="d-flex align-items-center gap-3">
                                    <div>
                                        <img src="{{ global_asset('assets/images/faces/6.jpg') }}"
                                            class="img-fluid team-img rounded-circle" alt="img">
                                    </div>
                                    <div class="text-start">
                                        <h5 class="mb-0 mt-3">Simon Sais</h5>
                                        <p class="text-primary mb-3 fs-14">Manager</p>
                                        <div class="d-flex">
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-primary-light btn-sm btn-icon rounded-circle"><i
                                                    class="ri ri-twitter-x-fill fs-11"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-success-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-facebook"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-info-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-instagram"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-secondary-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-linkedin"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="4" role="group"
                        aria-label="5 / 6" style="width: 412px; margin-right: 30px;">
                        <div class="card border text-center feature-card-15 shadow-none reveal reveal-active">
                            <div class="card-body main-card-body">
                                <div class="d-flex align-items-center gap-3">
                                    <div>
                                        <img src="{{ global_asset('assets/images/faces/4.jpg') }}"
                                            class="img-fluid team-img rounded-circle" alt="img">
                                    </div>
                                    <div class="text-start">
                                        <h5 class="mb-0 mt-3">Penny Black</h5>
                                        <p class="text-primary mb-3 fs-14">Backend Developer</p>
                                        <div class="d-flex">
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-primary-light btn-sm btn-icon rounded-circle"><i
                                                    class="ri ri-twitter-x-fill fs-11"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-success-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-facebook"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-info-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-instagram"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-secondary-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-linkedin"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="5" role="group"
                        aria-label="6 / 6" style="width: 412px; margin-right: 30px;">
                        <div class="card border text-center feature-card-15 shadow-none reveal reveal-active">
                            <div class="card-body main-card-body">
                                <div class="d-flex align-items-center gap-3">
                                    <div>
                                        <img src="{{ global_asset('assets/images/faces/14.jpg') }}"
                                            class="img-fluid team-img rounded-circle" alt="img">
                                    </div>
                                    <div class="text-start">
                                        <h5 class="mb-0 mt-3">Willie Makit</h5>
                                        <p class="text-primary mb-3 fs-14">Co-Founder</p>
                                        <div class="d-flex">
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-primary-light btn-sm btn-icon rounded-circle"><i
                                                    class="ri ri-twitter-x-fill fs-11"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-success-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-facebook"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-info-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-instagram"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-secondary-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-linkedin"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" data-swiper-slide-index="0" role="group" aria-label="1 / 6"
                        style="width: 412px; margin-right: 30px;">
                        <div class="card border text-center feature-card-15 shadow-none reveal reveal-active">
                            <div class="card-body main-card-body">
                                <div class="d-flex align-items-center gap-3">
                                    <div>
                                        <img src="{{ global_asset('assets/images/faces/1.jpg') }}"
                                            class="img-fluid team-img rounded-circle" alt="img">
                                    </div>
                                    <div class="text-start">
                                        <h5 class="mb-0 mt-3">Walter White</h5>
                                        <p class="text-primary mb-3 fs-14">Frontend Developer</p>
                                        <div class="d-flex">
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-primary-light btn-sm btn-icon rounded-circle"><i
                                                    class="ri ri-twitter-x-fill fs-11"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-success-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-facebook"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-info-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-instagram"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-secondary-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-linkedin"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-prev" data-swiper-slide-index="1" role="group"
                        aria-label="2 / 6" style="width: 412px; margin-right: 30px;">
                        <div class="card border text-center feature-card-15 shadow-none reveal reveal-active">
                            <div class="card-body main-card-body">
                                <div class="d-flex align-items-center gap-3">
                                    <div>
                                        <img src="{{ global_asset('assets/images/faces/5.jpg') }}"
                                            class="img-fluid team-img rounded-circle" alt="img">
                                    </div>
                                    <div class="text-start">
                                        <h5 class="mb-0 mt-3">Rose Bush</h5>
                                        <p class="text-primary mb-3 fs-14">UI Developer</p>
                                        <div class="d-flex">
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-primary-light btn-sm btn-icon rounded-circle"><i
                                                    class="ri ri-twitter-x-fill fs-11"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-success-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-facebook"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-info-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-instagram"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-secondary-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-linkedin"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="2" role="group"
                        aria-label="3 / 6" style="width: 412px; margin-right: 30px;">
                        <div class="card border text-center feature-card-15 shadow-none reveal reveal-active">
                            <div class="card-body main-card-body">
                                <div class="d-flex align-items-center gap-3">
                                    <div>
                                        <img src="{{ global_asset('assets/images/faces/10.jpg') }}"
                                            class="img-fluid team-img rounded-circle" alt="img">
                                    </div>
                                    <div class="text-start">
                                        <h5 class="mb-0 mt-3">Laura Biding</h5>
                                        <p class="text-primary mb-3 fs-14">Team Leader</p>
                                        <div class="d-flex">
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-primary-light btn-sm btn-icon rounded-circle"><i
                                                    class="ri ri-twitter-x-fill fs-11"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-success-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-facebook"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-info-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-instagram"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-secondary-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-linkedin"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="3" role="group"
                        aria-label="4 / 6" style="width: 412px; margin-right: 30px;">
                        <div class="card border text-center feature-card-15 shadow-none reveal reveal-active">
                            <div class="card-body main-card-body">
                                <div class="d-flex align-items-center gap-3">
                                    <div>
                                        <img src="{{ global_asset('assets/images/faces/6.jpg') }}"
                                            class="img-fluid team-img rounded-circle" alt="img">
                                    </div>
                                    <div class="text-start">
                                        <h5 class="mb-0 mt-3">Simon Sais</h5>
                                        <p class="text-primary mb-3 fs-14">Manager</p>
                                        <div class="d-flex">
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-primary-light btn-sm btn-icon rounded-circle"><i
                                                    class="ri ri-twitter-x-fill fs-11"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-success-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-facebook"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-info-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-instagram"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-secondary-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-linkedin"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" data-swiper-slide-index="4" role="group" aria-label="5 / 6"
                        style="width: 412px; margin-right: 30px;">
                        <div class="card border text-center feature-card-15 shadow-none reveal reveal-active">
                            <div class="card-body main-card-body">
                                <div class="d-flex align-items-center gap-3">
                                    <div>
                                        <img src="{{ global_asset('assets/images/faces/4.jpg') }}"
                                            class="img-fluid team-img rounded-circle" alt="img">
                                    </div>
                                    <div class="text-start">
                                        <h5 class="mb-0 mt-3">Penny Black</h5>
                                        <p class="text-primary mb-3 fs-14">Backend Developer</p>
                                        <div class="d-flex">
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-primary-light btn-sm btn-icon rounded-circle"><i
                                                    class="ri ri-twitter-x-fill fs-11"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-success-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-facebook"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-info-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-instagram"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-secondary-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-linkedin"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" data-swiper-slide-index="5" role="group" aria-label="6 / 6"
                        style="width: 412px; margin-right: 30px;">
                        <div class="card border text-center feature-card-15 shadow-none reveal reveal-active">
                            <div class="card-body main-card-body">
                                <div class="d-flex align-items-center gap-3">
                                    <div>
                                        <img src="{{ global_asset('assets/images/faces/14.jpg') }}"
                                            class="img-fluid team-img rounded-circle" alt="img">
                                    </div>
                                    <div class="text-start">
                                        <h5 class="mb-0 mt-3">Willie Makit</h5>
                                        <p class="text-primary mb-3 fs-14">Co-Founder</p>
                                        <div class="d-flex">
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-primary-light btn-sm btn-icon rounded-circle"><i
                                                    class="ri ri-twitter-x-fill fs-11"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-success-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-facebook"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-info-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-instagram"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-secondary-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-linkedin"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="0" role="group"
                        aria-label="1 / 6" style="width: 412px; margin-right: 30px;">
                        <div class="card border text-center feature-card-15 shadow-none reveal reveal-active">
                            <div class="card-body main-card-body">
                                <div class="d-flex align-items-center gap-3">
                                    <div>
                                        <img src="{{ global_asset('assets/images/faces/1.jpg') }}"
                                            class="img-fluid team-img rounded-circle" alt="img">
                                    </div>
                                    <div class="text-start">
                                        <h5 class="mb-0 mt-3">Walter White</h5>
                                        <p class="text-primary mb-3 fs-14">Frontend Developer</p>
                                        <div class="d-flex">
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-primary-light btn-sm btn-icon rounded-circle"><i
                                                    class="ri ri-twitter-x-fill fs-11"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-success-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-facebook"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-info-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-instagram"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-secondary-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-linkedin"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-prev"
                        data-swiper-slide-index="1" role="group" aria-label="2 / 6"
                        style="width: 412px; margin-right: 30px;">
                        <div class="card border text-center feature-card-15 shadow-none reveal reveal-active">
                            <div class="card-body main-card-body">
                                <div class="d-flex align-items-center gap-3">
                                    <div>
                                        <img src="{{ global_asset('assets/images/faces/5.jpg') }}"
                                            class="img-fluid team-img rounded-circle" alt="img">
                                    </div>
                                    <div class="text-start">
                                        <h5 class="mb-0 mt-3">Rose Bush</h5>
                                        <p class="text-primary mb-3 fs-14">UI Developer</p>
                                        <div class="d-flex">
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-primary-light btn-sm btn-icon rounded-circle"><i
                                                    class="ri ri-twitter-x-fill fs-11"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-success-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-facebook"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-info-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-instagram"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-secondary-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-linkedin"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active"
                        data-swiper-slide-index="2" role="group" aria-label="3 / 6"
                        style="width: 412px; margin-right: 30px;">
                        <div class="card border text-center feature-card-15 shadow-none reveal reveal-active">
                            <div class="card-body main-card-body">
                                <div class="d-flex align-items-center gap-3">
                                    <div>
                                        <img src="{{ global_asset('assets/images/faces/10.jpg') }}"
                                            class="img-fluid team-img rounded-circle" alt="img">
                                    </div>
                                    <div class="text-start">
                                        <h5 class="mb-0 mt-3">Laura Biding</h5>
                                        <p class="text-primary mb-3 fs-14">Team Leader</p>
                                        <div class="d-flex">
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-primary-light btn-sm btn-icon rounded-circle"><i
                                                    class="ri ri-twitter-x-fill fs-11"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-success-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-facebook"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-info-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-instagram"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="btn btn-secondary-light btn-sm btn-icon rounded-circle ms-2"><i
                                                    class="bx bxl-linkedin"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
        </div>
    </section>
    <!-- End:: Section-8 -->

    <!-- Start:: Section-9 -->
    <section class="section bg-primary" id="testimonials">
        <div class="container reviews-container">
            <div class="row gy-3">
                <div class="col-xl-4">
                    <div class="heading-section text-start mb-0 mt-4">
                        <div class="heading-subtitle style1"><span
                                class="text-fixed-white fs-16 fw-semibold">Testimonials</span>
                        </div>
                        <div class="heading-title text-fixed-white">Have a look at what people say <span
                                class="text-secondary">About Us</span></div>
                        <div class="heading-description text-fixed-white op-8">We care about our customer satisfaction and
                            experience.</div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div
                        class="swiper pagination-dynamic testimonialSwiperService swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
                        <div class="swiper-wrapper" id="swiper-wrapper-7d45c10db3710da0c" aria-live="off"
                            style="transform: translate3d(-2628px, 0px, 0px); transition-duration: 300ms;">
                            <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active"
                                data-swiper-slide-index="4" role="group" aria-label="5 / 6"
                                style="width: 418px; margin-right: 20px;">
                                <div class="card custom-card text-fixed-white border-0 reveal reveal-active">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <span class="avatar rounded-circle me-2">
                                                <img src="{{ global_asset('assets/images/faces/1.jpg') }}"
                                                    alt="" class="img-fluid rounded-circle">
                                            </span>
                                            <div>
                                                <h6 class="mb-0 fw-semibold fs-14 text-fixed-white">Jenny kingston</h6>
                                                <p class="mb-0 fs-11 fw-normal op-8">jennykingston345@gmail.com</p>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <span class="op-8">- Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit. Earum autem quaerat distinctio -- <a href="javascript:void(0);"
                                                    class="fw-semibold fs-11 text-fixed-white" data-bs-toggle="tooltip"
                                                    data-bs-custom-class="tooltip-primary" data-bs-placement="top"
                                                    data-bs-title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum autem quaerat distinctio">Read
                                                    More</a></span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                            <div class="d-flex align-items-center">
                                                <span class="op-8">Rating : </span>
                                                <span class="text-warning d-block ms-1">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                </span>
                                            </div>
                                            <div class="float-end fs-12 fw-semibold op-8 text-end">
                                                <span>16 days ago</span>
                                                <span class="d-block fs-12 text-success"><i>Jenny Kingston</i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next"
                                data-swiper-slide-index="5" role="group" aria-label="6 / 6"
                                style="width: 418px; margin-right: 20px;">
                                <div class="card custom-card text-fixed-white border-0 reveal reveal-active">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <span class="avatar rounded-circle me-2">
                                                <img src="{{ global_asset('assets/images/faces/5.jpg') }}"
                                                    alt="" class="img-fluid rounded-circle">
                                            </span>
                                            <div>
                                                <h6 class="mb-0 fw-semibold fs-14 text-fixed-white">Alex Carey</h6>
                                                <p class="mb-0 fs-11 fw-normal op-8">alexcarey21@gmail.com</p>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <span class="op-8">- Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit. Earum autem quaerat distinctio -- <a href="javascript:void(0);"
                                                    class="fw-semibold fs-11 text-fixed-white" data-bs-toggle="tooltip"
                                                    data-bs-custom-class="tooltip-primary" data-bs-placement="top"
                                                    data-bs-title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum autem quaerat distinctio">Read
                                                    More</a></span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                            <div class="d-flex align-items-center">
                                                <span class="op-8">Rating : </span>
                                                <span class="text-warning d-block ms-1">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                </span>
                                            </div>
                                            <div class="float-end fs-12 fw-semibold op-8 text-end">
                                                <span>1 month ago</span>
                                                <span class="d-block fs-12 text-success"><i>Alex Carey</i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" data-swiper-slide-index="0" role="group" aria-label="1 / 6"
                                style="width: 418px; margin-right: 20px;">
                                <div class="card custom-card text-fixed-white border-0 reveal reveal-active">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <span class="avatar rounded-circle me-2">
                                                <img src="{{ global_asset('assets/images/faces/3.jpg') }}"
                                                    alt="" class="img-fluid rounded-circle">
                                            </span>
                                            <div>
                                                <h6 class="mb-0 fw-semibold fs-14 text-fixed-white">Brenda Hans</h6>
                                                <p class="mb-0 fs-11 fw-normal op-8">brendahans@gmail.com</p>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <span class="op-8">- Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit. Earum autem quaerat distinctio -- <a href="javascript:void(0);"
                                                    class="fw-semibold fs-11 text-fixed-white" data-bs-toggle="tooltip"
                                                    data-bs-custom-class="tooltip-primary" data-bs-placement="top"
                                                    data-bs-title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum autem quaerat distinctio">Read
                                                    More</a></span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                            <div class="d-flex align-items-center">
                                                <span class="op-8">Rating : </span>
                                                <span class="text-warning d-block ms-1">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                </span>
                                            </div>
                                            <div class="float-end fs-12 fw-semibold op-8 text-end">
                                                <span>12 days ago</span>
                                                <span class="d-block fs-12 text-success"><i>Brenda Hans</i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" data-swiper-slide-index="1" role="group" aria-label="2 / 6"
                                style="width: 418px; margin-right: 20px;">
                                <div class="card custom-card text-fixed-white border-0 reveal reveal-active">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <span class="avatar rounded-circle me-2">
                                                <img src="{{ global_asset('assets/images/faces/9.jpg') }}"
                                                    alt="" class="img-fluid rounded-circle">
                                            </span>
                                            <div>
                                                <h6 class="mb-0 fw-semibold fs-14 text-fixed-white">Json Taylor</h6>
                                                <p class="mb-0 fs-11 fw-normal op-8">jsontaylor@gmail.com</p>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <span class="op-8">- Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit. Earum autem quaerat distinctio -- <a href="javascript:void(0);"
                                                    class="fw-semibold fs-11 text-fixed-white" data-bs-toggle="tooltip"
                                                    data-bs-custom-class="tooltip-primary" data-bs-placement="top"
                                                    data-bs-title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum autem quaerat distinctio">Read
                                                    More</a></span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                            <div class="d-flex align-items-center">
                                                <span class="op-8">Rating : </span>
                                                <span class="text-warning d-block ms-1">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-half-fill"></i>
                                                </span>
                                            </div>
                                            <div class="float-end fs-12 fw-semibold op-8 text-end">
                                                <span>9 days ago</span>
                                                <span class="d-block fs-12 text-success"><i>Json Taylor</i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" data-swiper-slide-index="2" role="group" aria-label="3 / 6"
                                style="width: 418px; margin-right: 20px;">
                                <div class="card custom-card text-fixed-white border-0 reveal reveal-active">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <span class="avatar rounded-circle me-2">
                                                <img src="{{ global_asset('assets/images/faces/8.jpg') }}"
                                                    alt="" class="img-fluid rounded-circle">
                                            </span>
                                            <div>
                                                <h6 class="mb-0 fw-semibold fs-14 text-fixed-white">Amanda Nanes</h6>
                                                <p class="mb-0 fs-11 fw-normal op-8">amandananes212@gmail.com</p>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <span class="op-8">- Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit. Earum autem quaerat distinctio -- <a href="javascript:void(0);"
                                                    class="fw-semibold fs-11 text-fixed-white" data-bs-toggle="tooltip"
                                                    data-bs-custom-class="tooltip-primary" data-bs-placement="top"
                                                    data-bs-title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum autem quaerat distinctio">Read
                                                    More</a></span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                            <div class="d-flex align-items-center">
                                                <span class="op-8">Rating : </span>
                                                <span class="text-warning d-block ms-1">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                </span>
                                            </div>
                                            <div class="float-end fs-12 fw-semibold op-8 text-end">
                                                <span>6 days ago</span>
                                                <span class="d-block fs-12 text-success"><i>Amanda Nanes</i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-prev" data-swiper-slide-index="3" role="group"
                                aria-label="4 / 6" style="width: 418px; margin-right: 20px;">
                                <div class="card custom-card text-fixed-white border-0 reveal reveal-active">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <span class="avatar rounded-circle me-2">
                                                <img src="{{ global_asset('assets/images/faces/10.jpg') }}"
                                                    alt="" class="img-fluid rounded-circle">
                                            </span>
                                            <div>
                                                <h6 class="mb-0 fw-semibold fs-14 text-fixed-white">Lucas Tope</h6>
                                                <p class="mb-0 fs-11 fw-normal op-8">lucastope1999@gmail.com</p>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <span class="op-8">- Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit. Earum autem quaerat distinctio -- <a href="javascript:void(0);"
                                                    class="fw-semibold fs-11 text-fixed-white" data-bs-toggle="tooltip"
                                                    data-bs-custom-class="tooltip-primary" data-bs-placement="top"
                                                    data-bs-title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum autem quaerat distinctio">Read
                                                    More</a></span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                            <div class="d-flex align-items-center">
                                                <span class="op-8">Rating : </span>
                                                <span class="text-warning d-block ms-1">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                </span>
                                            </div>
                                            <div class="float-end fs-12 fw-semibold op-8 text-end">
                                                <span>10 days ago</span>
                                                <span class="d-block fs-12 text-success"><i>Lucas Tope</i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="4" role="group"
                                aria-label="5 / 6" style="width: 418px; margin-right: 20px;">
                                <div class="card custom-card text-fixed-white border-0 reveal reveal-active">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <span class="avatar rounded-circle me-2">
                                                <img src="{{ global_asset('assets/images/faces/1.jpg') }}"
                                                    alt="" class="img-fluid rounded-circle">
                                            </span>
                                            <div>
                                                <h6 class="mb-0 fw-semibold fs-14 text-fixed-white">Jenny kingston</h6>
                                                <p class="mb-0 fs-11 fw-normal op-8">jennykingston345@gmail.com</p>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <span class="op-8">- Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit. Earum autem quaerat distinctio -- <a href="javascript:void(0);"
                                                    class="fw-semibold fs-11 text-fixed-white" data-bs-toggle="tooltip"
                                                    data-bs-custom-class="tooltip-primary" data-bs-placement="top"
                                                    data-bs-title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum autem quaerat distinctio">Read
                                                    More</a></span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                            <div class="d-flex align-items-center">
                                                <span class="op-8">Rating : </span>
                                                <span class="text-warning d-block ms-1">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                </span>
                                            </div>
                                            <div class="float-end fs-12 fw-semibold op-8 text-end">
                                                <span>16 days ago</span>
                                                <span class="d-block fs-12 text-success"><i>Jenny Kingston</i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="5" role="group"
                                aria-label="6 / 6" style="width: 418px; margin-right: 20px;">
                                <div class="card custom-card text-fixed-white border-0 reveal reveal-active">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <span class="avatar rounded-circle me-2">
                                                <img src="{{ global_asset('assets/images/faces/5.jpg') }}"
                                                    alt="" class="img-fluid rounded-circle">
                                            </span>
                                            <div>
                                                <h6 class="mb-0 fw-semibold fs-14 text-fixed-white">Alex Carey</h6>
                                                <p class="mb-0 fs-11 fw-normal op-8">alexcarey21@gmail.com</p>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <span class="op-8">- Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit. Earum autem quaerat distinctio -- <a href="javascript:void(0);"
                                                    class="fw-semibold fs-11 text-fixed-white" data-bs-toggle="tooltip"
                                                    data-bs-custom-class="tooltip-primary" data-bs-placement="top"
                                                    data-bs-title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum autem quaerat distinctio">Read
                                                    More</a></span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                            <div class="d-flex align-items-center">
                                                <span class="op-8">Rating : </span>
                                                <span class="text-warning d-block ms-1">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                </span>
                                            </div>
                                            <div class="float-end fs-12 fw-semibold op-8 text-end">
                                                <span>1 month ago</span>
                                                <span class="d-block fs-12 text-success"><i>Alex Carey</i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="0"
                                role="group" aria-label="1 / 6" style="width: 418px; margin-right: 20px;">
                                <div class="card custom-card text-fixed-white border-0 reveal reveal-active">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <span class="avatar rounded-circle me-2">
                                                <img src="{{ global_asset('assets/images/faces/3.jpg') }}"
                                                    alt="" class="img-fluid rounded-circle">
                                            </span>
                                            <div>
                                                <h6 class="mb-0 fw-semibold fs-14 text-fixed-white">Brenda Hans</h6>
                                                <p class="mb-0 fs-11 fw-normal op-8">brendahans@gmail.com</p>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <span class="op-8">- Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit. Earum autem quaerat distinctio -- <a href="javascript:void(0);"
                                                    class="fw-semibold fs-11 text-fixed-white" data-bs-toggle="tooltip"
                                                    data-bs-custom-class="tooltip-primary" data-bs-placement="top"
                                                    data-bs-title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum autem quaerat distinctio">Read
                                                    More</a></span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                            <div class="d-flex align-items-center">
                                                <span class="op-8">Rating : </span>
                                                <span class="text-warning d-block ms-1">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                </span>
                                            </div>
                                            <div class="float-end fs-12 fw-semibold op-8 text-end">
                                                <span>12 days ago</span>
                                                <span class="d-block fs-12 text-success"><i>Brenda Hans</i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="1"
                                role="group" aria-label="2 / 6" style="width: 418px; margin-right: 20px;">
                                <div class="card custom-card text-fixed-white border-0 reveal reveal-active">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <span class="avatar rounded-circle me-2">
                                                <img src="{{ global_asset('assets/images/faces/9.jpg') }}"
                                                    alt="" class="img-fluid rounded-circle">
                                            </span>
                                            <div>
                                                <h6 class="mb-0 fw-semibold fs-14 text-fixed-white">Json Taylor</h6>
                                                <p class="mb-0 fs-11 fw-normal op-8">jsontaylor@gmail.com</p>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <span class="op-8">- Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit. Earum autem quaerat distinctio -- <a href="javascript:void(0);"
                                                    class="fw-semibold fs-11 text-fixed-white" data-bs-toggle="tooltip"
                                                    data-bs-custom-class="tooltip-primary" data-bs-placement="top"
                                                    data-bs-title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum autem quaerat distinctio">Read
                                                    More</a></span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                            <div class="d-flex align-items-center">
                                                <span class="op-8">Rating : </span>
                                                <span class="text-warning d-block ms-1">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-half-fill"></i>
                                                </span>
                                            </div>
                                            <div class="float-end fs-12 fw-semibold op-8 text-end">
                                                <span>9 days ago</span>
                                                <span class="d-block fs-12 text-success"><i>Json Taylor</i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal swiper-pagination-bullets-dynamic"
                            style="width: 80px;"><span class="swiper-pagination-bullet" tabindex="0"
                                role="button" aria-label="Go to slide 1" style="left: -32px;"></span><span
                                class="swiper-pagination-bullet" tabindex="0" role="button"
                                aria-label="Go to slide 2" style="left: -32px;"></span><span
                                class="swiper-pagination-bullet swiper-pagination-bullet-active-prev-prev"
                                tabindex="0" role="button" aria-label="Go to slide 3"
                                style="left: -32px;"></span><span
                                class="swiper-pagination-bullet swiper-pagination-bullet-active-prev" tabindex="0"
                                role="button" aria-label="Go to slide 4" style="left: -32px;"></span><span
                                class="swiper-pagination-bullet swiper-pagination-bullet-active swiper-pagination-bullet-active-main"
                                tabindex="0" role="button" aria-label="Go to slide 5" aria-current="true"
                                style="left: -32px;"></span><span
                                class="swiper-pagination-bullet swiper-pagination-bullet-active-next" tabindex="0"
                                role="button" aria-label="Go to slide 6" style="left: -32px;"></span></div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Section-9 -->

    <!-- Start:: Section-10 -->
    <section class="section overflow-hidden bg-white" id="contact">
        <div class="container">
            <div class="heading-section mb-4">
                <div class="heading-section">
                    <div class="heading-subtitle"><span class="text-primary fw-semibold">Contact</span></div>
                    <hr class="center-diamond">
                    <div class="heading-title">Get In Touch With Us..</div>
                    <div class="heading-description fs-15 mb-5">Stay up-to-date with the latest news and updates on our
                        products and services</div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xxl-11">
                        <div class="row">
                            <div class="col-xxl-3">
                                <div class="card border shadow-none reveal reveal-active">
                                    <div class="card-body p-3">
                                        <div class="d-flex align-items-center text-start">
                                            <div>
                                                <span class="avatar avatar-md avatar-rounded bg-primary">
                                                    <i class="fe fe-map-pin fs-12"></i>
                                                </span>
                                            </div>
                                            <div class="ms-2 text-default  fs-14">
                                                <h6 class="mb-0">Main Branch Address </h6>
                                                <p class="mb-0"> San Fransisco, CA</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3">
                                <div class="card border shadow-none reveal reveal-active">
                                    <div class="card-body p-3">
                                        <div class="d-flex align-items-center text-start">
                                            <div>
                                                <span class="avatar avatar-md avatar-rounded bg-success">
                                                    <i class="fe fe-phone fs-12"></i>
                                                </span>
                                            </div>
                                            <div class="ms-2 text-default  fs-14">
                                                <h6 class="mb-0">Phone Number </h6>
                                                <p class="mb-0"> +125 254 3561</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3">
                                <div class="card border shadow-none reveal reveal-active">
                                    <div class="card-body p-3">
                                        <div class="d-flex align-items-center text-start">
                                            <div>
                                                <span class="avatar avatar-md avatar-rounded bg-info">
                                                    <i class="fe fe-mail fs-12"></i>
                                                </span>
                                            </div>
                                            <div class="ms-2 text-default  fs-14">
                                                <h6 class="mb-0">Email Address</h6>
                                                <p class="mb-0">georgeabc@abc.com</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3">
                                <div class="card border shadow-none reveal reveal-active">
                                    <div class="card-body p-3">
                                        <div class="d-flex align-items-center text-start">
                                            <div>
                                                <span class="avatar avatar-md avatar-rounded bg-secondary">
                                                    <i class="fe fe-clock fs-12"></i>
                                                </span>
                                            </div>
                                            <div class="ms-2 text-default  fs-14">
                                                <h6 class="mb-0">Working Hours</h6>
                                                <p class="mb-0">Mon - Fri : 9am - 6pm</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Section-10 -->

    <!-- Start:: Section-11 -->
    <footer class="footer mt-auto text-fixed-white position-relative">
        <section class="section py-5 newsLetter-sec">
            <div class="container">
                <div class="row my-auto justify-content-between">
                    <div class="col-lg-6">
                        <div class="heading-section mb-0 text-start mb-3 mb-lg-0">
                            <h3 class="text-fixed-white mb-0">Subscribe to our News Letter</h3>
                            <div class="heading-description fs-15 text-fixed-white op-8">Stay up-to-date with the latest
                                news and updates on our
                                products and services</div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form mb-0">
                            <div class="form-group custom-form-group mx-auto">
                                <input type="text" class="form-control form-control-lg rounded-pill shadow-none"
                                    placeholder="Enter Your Email Address...">
                                <button
                                    class="custom-form-btn btn btn-primary bg-primary rounded-pill border-0 shadow-none"
                                    type="button">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <div class="py-5 py-3 border-top border-white-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                        <a href="{{ url('index') }}" class="d-inline-block mb-2"><img
                                src="{{ global_asset('assets/images/brand-logos/desktop-white.png') }}"
                                alt="img"></a>
                        <p class="mb-4 op-8 fs-15">
                            At dolor clita amet erat takimata sed tempor invidunt lorem.
                            Justo sea nonumy.
                        </p>
                        <ul class="list-unstyled mb-0">
                            <li class="list-item mb-2"><a href="javascript:void(0);" class="footer-link"><i
                                        class="fe fe-phone me-2 d-inline-block fs-16"></i>+125 254 3562</a></li>
                            <li class="list-item mb-2"><a href="javascript:void(0);" class="footer-link"><i
                                        class="fe fe-mail me-2 d-inline-block fs-16"></i>spruko@company.com</a></li>
                            <li class="list-item"><a href="javascript:void(0);" class="footer-link"><i
                                        class="fe fe-map-pin me-2 d-inline-block fs-16"></i>San Francisco, CA </a></li>
                        </ul>
                        <div class="footer-btn-list d-flex align-items-center mt-3">
                            <a aria-label="anchor" href="javascript:void(0);"
                                class="footer-btn btn btn-icon rounded-circle me-2"><i class="fe fe-facebook"></i></a>
                            <a aria-label="anchor" href="javascript:void(0);"
                                class="footer-btn btn btn-icon rounded-circle me-2"><i class="fe fe-linkedin"></i></a>
                            <a aria-label="anchor" href="javascript:void(0);"
                                class="footer-btn btn btn-icon rounded-circle me-2"><i class="fe fe-instagram"></i></a>
                            <a aria-label="anchor" href="javascript:void(0);"
                                class="footer-btn btn btn-icon rounded-circle"><i class="ri ri-twitter-x-line"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                        <h5 class="text-fixed-white">Page Links</h5>
                        <ul class="list-unstyled footer-icon mb-0">
                            <li class="list-item mb-2"><a href="javascript:void(0);" class="footer-link">About
                                    company</a></li>
                            <li class="list-item mb-2"><a href="{{ url('team') }}" class="footer-link">Our Team</a>
                            </li>
                            <li class="list-item mb-2"><a href="{{ url('blog') }}" class="footer-link">News &amp;
                                    Blog</a></li>
                            <li class="list-item mb-2"><a href="javascript:void(0);"
                                    class="footer-link">Testimonials</a></li>
                            <li class="list-item mb-2"><a href="{{ url('faqs') }}" class="footer-link">FAQ's</a>
                            </li>
                            <li class="list-item mb-2"><a href="javascript:void(0);" class="footer-link">Account
                                    Settings</a></li>
                            <li class="list-item"><a href="{{ url('pricing') }}" class="footer-link">Price &amp;
                                    Plan</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                        <h5 class="text-fixed-white">Services</h5>
                        <ul class="list-unstyled footer-icon mb-0">
                            <li class="list-item mb-2"><a href="javascript:void(0);" class="footer-link">Business
                                    Services</a></li>
                            <li class="list-item mb-2"><a href="javascript:void(0);" class="footer-link">Financial
                                    Planning</a></li>
                            <li class="list-item mb-2"><a href="javascript:void(0);" class="footer-link">Marketing</a>
                            </li>
                            <li class="list-item mb-2"><a href="javascript:void(0);"
                                    class="footer-link">Analytical</a></li>
                            <li class="list-item mb-2"><a href="javascript:void(0);" class="footer-link">Business
                                    Audits</a></li>
                            <li class="list-item mb-2"><a href="javascript:void(0);" class="footer-link">Digital
                                    Marketing</a></li>
                            <li class="list-item"><a href="javascript:void(0);" class="footer-link">24/7 Support</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-4 mb-lg-0">
                        <h5 class="text-fixed-white">Support</h5>
                        <ul class="list-unstyled footer-icon mb-0">
                            <li class="list-item mb-2"><a href="javascript:void(0);" class="footer-link">Support
                                    Contact </a></li>
                            <li class="list-item mb-2"><a href="javascript:void(0);" class="footer-link">Report
                                    Abuse</a></li>
                            <li class="list-item mb-2"><a href="javascript:void(0);" class="footer-link">Affiliate</a>
                            </li>
                            <li class="list-item mb-2"><a href="javascript:void(0);" class="footer-link">Cancellation
                                    &amp; Refund Policy</a></li>
                            <li class="list-item mb-2"><a href="javascript:void(0);" class="footer-link">Our Terms</a>
                            </li>
                            <li class="list-item mb-2"><a href="javascript:void(0);" class="footer-link">Privacy
                                    Policy</a></li>
                            <li class="list-item"><a href="javascript:void(0);" class="footer-link">Payment
                                    Options</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-3 border-top border-white-1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-7 col-lg-9">
                        <div class="d-md-flex align-items-center">
                            <p class="mb-0 me-3 text-fixed-white">Payments We Accept :</p>
                            <div class="mt-3 mt-md-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="me-2 mb-2 mb-sm-0 payment-cards"
                                    width="80" height="40" enable-background="new 0 0 48 48"
                                    viewBox="0 0 48 48">
                                    <polygon fill="#fff"
                                        points="17.202 32.269 21.087 32.269 23.584 16.732 19.422 16.732"></polygon>
                                    <path fill="#fff"
                                        d="M13.873 16.454l-3.607 11.098-.681-3.126c-1.942-4.717-5.272-6.659-5.272-6.659l3.456 14.224h4.162l5.827-15.538H13.873zM44.948 16.454h-4.162l-6.382 15.538h3.884l.832-2.22h4.994l.555 2.22H48L44.948 16.454zM39.954 26.997l2.22-5.826 1.11 5.826H39.954zM28.855 20.893c0-.832.555-1.665 2.497-1.665 1.387 0 2.775 1.11 2.775 1.11l.832-3.329c0 0-1.942-.832-3.607-.832-4.162 0-6.104 2.22-6.104 4.717 0 4.994 5.549 4.162 5.549 6.659 0 .555-.277 1.387-2.497 1.387s-3.884-.832-3.884-.832l-.555 3.329c0 0 1.387.832 4.162.832 2.497.277 6.382-1.942 6.382-5.272C34.405 23.113 28.855 22.836 28.855 20.893z">
                                    </path>
                                    <path fill="#fff" d="M9.711,25.055l-1.387-6.936c0,0-0.555-1.387-2.22-1.387c-1.665,0-6.104,0-6.104,0
                                                    S8.046,19.229,9.711,25.055z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="me-2 mb-2 mb-sm-0 payment-cards"
                                    width="80" height="40" viewBox="0 0 24 24">
                                    <path fill="#FF5F00" d="M15.245 17.831h-6.49V6.168h6.49v11.663z"></path>
                                    <path fill="#EB001B"
                                        d="M9.167 12A7.404 7.404 0 0 1 12 6.169 7.417 7.417 0 0 0 0 12a7.417 7.417 0 0 0 11.999 5.831A7.406 7.406 0 0 1 9.167 12z">
                                    </path>
                                    <path fill="#F79E1B"
                                        d="M24 12a7.417 7.417 0 0 1-12 5.831c1.725-1.358 2.833-3.465 2.833-5.831S13.725 7.527 12 6.169A7.417 7.417 0 0 1 24 12z">
                                    </path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="me-2 mb-2 mb-sm-0 payment-cards"
                                    width="80" height="40" viewBox="0 0 64 64">
                                    <g data-name="Paypal card">
                                        <path fill="#fff"
                                            d="M47 25.23a2.91 2.91 0 0 0-1-1.1 4.63 4.63 0 0 0-1.63-.59 12.57 12.57 0 0 0-2.19-.17H38.3a1 1 0 0 0-.88.71L34.8 35.47a.56.56 0 0 0 .57.71h1.86a1 1 0 0 0 .89-.7l.63-2.77a1 1 0 0 1 .9-.7h.53a8.9 8.9 0 0 0 5.32-1.4 4.41 4.41 0 0 0 1.88-3.69 3.67 3.67 0 0 0-.38-1.69ZM43 29a4 4 0 0 1-2.35.61h-.45a.57.57 0 0 1-.57-.71l.57-2.41a1 1 0 0 1 .89-.71h.6a3 3 0 0 1 1.62.36 1.26 1.26 0 0 1 .55 1.11A2.09 2.09 0 0 1 43 29Zm19.4-5.49h-1.65A1 1 0 0 0 60 24l-.09.15-.08.37-2.38 10.61-.08.33a.53.53 0 0 0 .46.67h1.77a.93.93 0 0 0 .8-.57l.1-.14L63 24.17a.54.54 0 0 0-.58-.7ZM56 26.82a7.12 7.12 0 0 0-3.32-.59 14.22 14.22 0 0 0-2.25.18c-.56.08-.61.1-1 .17a1.08 1.08 0 0 0-.81.87l-.23.93c-.13.59.21.57.37.52a9.45 9.45 0 0 1 1.1-.32 8.23 8.23 0 0 1 1.75-.24 4.66 4.66 0 0 1 1.69.24.86.86 0 0 1 .56.84v.27l-.27.16a33.3 33.3 0 0 0-2.74.3 9 9 0 0 0-2.37.65 3.73 3.73 0 0 0-1.6 1.26 3.5 3.5 0 0 0-.52 1.94 2.33 2.33 0 0 0 .76 1.78 2.89 2.89 0 0 0 2 .66 5.12 5.12 0 0 0 1.17-.1l.9-.31.77-.42.69-.47-.06.3a.54.54 0 0 0 .49.7h1.76a1 1 0 0 0 .79-.7L57 29.59l.07-.48v-.45A2 2 0 0 0 56 26.82Zm-3 6.61-.3.39-.72.37a2.66 2.66 0 0 1-1 .21 2.19 2.19 0 0 1-1-.2l-.37-.69a1.44 1.44 0 0 1 .27-.92 1.84 1.84 0 0 1 .8-.53 6.5 6.5 0 0 1 1.22-.28c.42-.05 1.27-.15 1.37-.15l.13.23c-.04.14-.28 1.14-.4 1.57Z">
                                        </path>
                                        <path fill="#fff"
                                            d="M34.86 26.37h-2.23a1.63 1.63 0 0 0-1.18.7s-2.66 4.58-2.92 5h-.31l-.83-5a1 1 0 0 0-1-.73h-1.68a.54.54 0 0 0-.55.71s1.26 7.2 1.51 8.9c.12.94 0 1.1 0 1.1L24 40c-.24.39-.11.71.29.71h1.93a1.55 1.55 0 0 0 1.16-.7l7.42-12.59s.72-1.07.06-1.05Zm-12.65.45a7 7 0 0 0-3.32-.59 14.42 14.42 0 0 0-2.26.17 8.18 8.18 0 0 0-.95.18 1.08 1.08 0 0 0-.82.86l-.22.93c-.13.6.22.58.35.52a10.88 10.88 0 0 1 1.12-.32 7.58 7.58 0 0 1 1.74-.23 4.47 4.47 0 0 1 1.7.24.83.83 0 0 1 .55.84v.26l-.27.17a27 27 0 0 0-2.74.3 8.7 8.7 0 0 0-2.36.64 3.63 3.63 0 0 0-1.6 1.27 3.38 3.38 0 0 0-.57 1.94 2.28 2.28 0 0 0 .77 1.77 2.83 2.83 0 0 0 2 .67 4.87 4.87 0 0 0 1.16-.11l.91-.31.76-.42.7-.47-.06.29a.55.55 0 0 0 .5.69H21a1 1 0 0 0 .8-.69l1.36-5.88.07-.47v-.45a2 2 0 0 0-1.02-1.8Zm-3 6.6-.3.38-.73.38a2.62 2.62 0 0 1-1 .21 2.17 2.17 0 0 1-1.06-.2l-.36-.7a1.4 1.4 0 0 1 .27-.9l.79-.54a7.54 7.54 0 0 1 1.23-.28c.42-.05 1.26-.15 1.38-.15l.12.22c.02.16-.22 1.16-.33 1.58Zm-6-8.23a2.71 2.71 0 0 0-1-1.09 4.54 4.54 0 0 0-1.62-.6 13.86 13.86 0 0 0-2.2-.17H4.53a1 1 0 0 0-.9.71L1 35.42a.55.55 0 0 0 .56.71h1.88a.94.94 0 0 0 .89-.71L5 32.66a.93.93 0 0 1 .88-.7h.52a8.88 8.88 0 0 0 5.3-1.4 4.38 4.38 0 0 0 1.9-3.69 3.42 3.42 0 0 0-.36-1.68Zm-4 3.72a3.91 3.91 0 0 1-2.35.62h-.44a.55.55 0 0 1-.56-.71l.56-2.42a1 1 0 0 1 .89-.71h.6a3 3 0 0 1 1.62.36 1.24 1.24 0 0 1 .54 1.11 2 2 0 0 1-.84 1.75Z">
                                        </path>
                                    </g>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="me-2 mb-2 mb-sm-0 payment-cards"
                                    width="80" height="40" enable-background="new 0 0 24 24"
                                    viewBox="0 0 24 24">
                                    <path fill="#fff"
                                        d="M3.093,14.964c1.18,0,2.55-0.431,2.79-1.711h-1.24c-0.213,0.625-0.85,0.923-1.568,0.923c-1.035,0-1.788-0.64-1.853-1.726h4.83v1.042c0,0.387-0.02,0.848-0.04,1.235h1.18c0.025-0.238,0.04-0.49,0.04-0.728c0.506,0.61,1.33,0.923,2.2,0.923c1.407,0,2.467-0.833,2.767-2.069c-0.022,0.12-0.037,0.253-0.037,0.402c0,0.908,0.792,1.682,2.272,1.682c1,0,1.717-0.224,2.32-0.952c0,0.253,0.016,0.506,0.046,0.759h1.114c-0.03-0.313-0.04-0.654-0.04-0.997v-2.44c0-0.372-0.07-0.67-0.2-0.923l2.33,4.345l-1.07,2.024h1.346L24,9.503h-1.243l-2.055,4.093l-2.055-4.092h-1.41l0.436,0.833c-0.42-0.744-1.351-1.012-2.415-1.012c-1.186,0-2.55,0.327-2.686,1.607h1.275c0.06-0.506,0.585-0.804,1.305-0.804c0.974,0,1.53,0.356,1.53,1.234v0.134c-0.465,0-1.05,0-1.56,0.018c-1.622,0.039-2.656,0.388-2.896,1.333c0.045-0.209,0.06-0.432,0.06-0.663c0-1.936-1.488-2.832-2.828-2.832c-0.8,0-1.612,0.201-2.202,0.899V7.25h-1.2v4.876c-0.01-1.904-1.252-2.783-2.94-2.783C0.982,9.343,0,10.49,0,12.23C0,13.808,0.95,14.985,3.093,14.964z M15.193,12.313l-0.002-0.002h-0.012c0.494-0.016,1.034-0.022,1.484-0.022v0.129c0,1.115-0.675,1.8-1.935,1.8c-0.945,0-1.305-0.501-1.305-0.962C13.423,12.544,14.098,12.346,15.193,12.313z M9.116,10.165c1.125,0,1.893,0.8,1.893,2.004c0,1.204-0.766,2.004-1.876,2.004H9.131h-0.03c-1.11,0-1.875-0.8-1.875-2.004C7.226,10.964,8.006,10.165,9.116,10.165z M3.058,10.145c0.871,0,1.681,0.418,1.725,1.534h-3.54C1.364,10.615,2.114,10.145,3.058,10.145z">
                                    </path>
                                </svg>
                                <a href="javascript:void(0);" class="text-fixed-white fs-15">And more<i
                                        class="ri-arrow-right-s-line fs-13 d-inline-block ms-1 rtl-transform-icon"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-3 border-top border-white-1">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 text-center text-xl-start">
                        <div class="fs-14">
                            Copyright ©
                            <span id="year">2024</span>
                            <a href="{{ url('index') }}" class="text-primary">Zeno.</a>
                            Designed with
                            <span class="bi bi-heart-fill text-danger"></span>
                            by
                            <a href="https://spruko.com/" class="text-primary" target="_blank">Spruko</a>
                            All Rights Reserved
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <ul
                            class="list-unstyled d-flex mb-0 justify-content-center justify-content-xl-end mt-3 mt-xl-0 ms-auto flex-wrap legal-footer-section">
                            <li class="list-item"><a href="javascript:void(0);"
                                    class="fs-14 fw-normal pe-3 text-fixed-white">Terms of Service</a></li>
                            <li class="list-item"><a href="javascript:void(0);"
                                    class="fs-14 fw-normal px-3 text-fixed-white">Privacy Policy</a></li>
                            <li class="list-item"><a href="javascript:void(0);"
                                    class="fs-14 fw-normal px-3 text-fixed-white">Legal</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End:: Section-11 -->
@endsection

@section('scripts')
@endsection
