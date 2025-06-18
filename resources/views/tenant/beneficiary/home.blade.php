@extends('tenant.layouts.master-beneficiary')

@section('styles')
@endsection

@section('content')
    <!-- Start::page-header -->
    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
        <div> 
            <h1 class="page-title fw-medium fs-18 mb-0">{{ trans('global.dashboard') }}</h1>
        </div>
    </div>
    <!-- End::page-header --> 
    @if($beneficiary->profile_status == 'request_join')
        <div class="alert alert-warning">
            <i class="ri-loader-4-fill text-warning fs-14" data-bs-toggle="tooltip" title="طلب الانضمام"></i> 
            {{ trans('cruds.beneficiary.extra.request_join_text') }}
        </div>
    @elseif($beneficiary->profile_status == 'in_review')
        <div class="alert alert-primary">
            <i class="ri-loader-3-fill text-primary fs-14" data-bs-toggle="tooltip" title="قيد المراجعة"></i> 
            {{ trans('cruds.beneficiary.extra.in_review_text') }}
        </div> 
    @elseif($beneficiary->profile_status == 'rejected')
        <div class="alert alert-danger">
            <i class="ri-indeterminate-circle-fill text-danger fs-14" data-bs-toggle="tooltip" title="مرفوض"></i> 
            {{ trans('cruds.beneficiary.extra.rejected_text') }}
            <br>
            <span class="fw-medium text-default">{{ trans('cruds.beneficiary.fields.rejection_reason') }}
                : </span>
            {{ $beneficiary->rejection_reason }}
        </div>
    @endif
@endsection 
