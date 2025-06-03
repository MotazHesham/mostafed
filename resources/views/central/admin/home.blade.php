@extends('central.layouts.master')

@section('styles')
@endsection

@section('content')
    <!-- Start::page-header -->
    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
        <div>
            <nav>
                <ol class="breadcrumb mb-1">
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);">
                            Dashboards
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Analytics</li>
                </ol>
            </nav>
            <h1 class="page-title fw-medium fs-18 mb-0">Analytics</h1>
        </div> 
    </div>
    <!-- End::page-header -->
@endsection

@section('scripts')
    <!-- Apex Charts JS -->
    {{-- <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script> --}}

    <!-- Analytics Dashboard -->
    {{-- <script src="{{ asset('assets/js/analytics-dashboard.js') }}"></script> --}}
@endsection
