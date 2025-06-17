@extends('tenant.layouts.master')
@section('styles')
    <style>
        .profile-card .profile-banner-img::before {
            opacity: 0.5;
        }

        .profile-card .profile-banner-img {
            max-height: 300px;
            overflow: hidden;
        }
    </style>
@endsection
@section('content')
    @php
        $breadcrumbs = [
            ['title' => trans('cruds.beneficiariesManagment.title'), 'url' => '#'],
            [
                'title' => trans('global.list') . ' ' . trans('cruds.beneficiary.title'),
                'url' => route('admin.beneficiaries.index'),
            ],
            ['title' => trans('global.show') . ' ' . trans('cruds.beneficiary.title_singular')],
        ];
    @endphp
    @include('tenant.partials.breadcrumb')

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card profile-card">
                <div class="profile-banner-img">
                    <img src="{{ global_asset('assets/profile-cover.png') }}" class="card-img-top" alt="...">
                </div>
                <div class="card-body pb-0 position-relative">
                    <div class="row profile-content">
                        <div class="col-xl-9">
                            <div class="card custom-card overflow-hidden border">
                                <div class="card-body">
                                    <ul class="nav nav-tabs tab-style-6 mb-3 p-0" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link w-100 text-start active" id="profile-about-tab"
                                                data-bs-toggle="tab" data-bs-target="#profile-about-tab-pane" type="button"
                                                role="tab" aria-controls="profile-about-tab-pane"
                                                aria-selected="true">{{ trans('cruds.beneficiary.profile.about') }}</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link w-100 text-start" id="edit-profile-tab"
                                                data-bs-toggle="tab" data-bs-target="#edit-profile-tab-pane" type="button"
                                                role="tab" aria-controls="edit-profile-tab-pane"
                                                aria-selected="true">{{ trans('cruds.beneficiary.profile.edit_profile') }}</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link w-100 text-start" id="family-info-tab"
                                                data-bs-toggle="tab" data-bs-target="#family-info-tab-pane" type="button"
                                                role="tab" aria-controls="family-info-tab-pane"
                                                aria-selected="false">{{ trans('cruds.beneficiary.profile.family_info') }}</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link w-100 text-start" id="economic-info-tab"
                                                data-bs-toggle="tab" data-bs-target="#economic-info-tab-pane" type="button"
                                                role="tab" aria-controls="economic-info-tab-pane"
                                                aria-selected="false">{{ trans('cruds.beneficiary.profile.economic_info') }}</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link w-100 text-start" id="documents-tab"
                                                data-bs-toggle="tab" data-bs-target="#documents-tab-pane" type="button"
                                                role="tab" aria-controls="documents-tab-pane"
                                                aria-selected="false">{{ trans('cruds.beneficiary.profile.documents') }}</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link w-100 text-start" id="activity-tab" data-bs-toggle="tab"
                                                data-bs-target="#activity-tab-pane" type="button" role="tab"
                                                aria-controls="activity-tab-pane"
                                                aria-selected="false">{{ trans('cruds.beneficiary.profile.activity') }}</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="profile-tabs">
                                        <div class="tab-pane show active p-0 border-0" id="profile-about-tab-pane"
                                            role="tabpanel" aria-labelledby="profile-about-tab" tabindex="0">
                                            @include('tenant.admin.beneficiaries.partials.about')
                                        </div>
                                        <div class="tab-pane p-0 border-0" id="edit-profile-tab-pane" role="tabpanel"
                                            aria-labelledby="edit-profile-tab" tabindex="0">
                                            @include('tenant.admin.beneficiaries.partials.edit-info')
                                        </div>
                                        <div class="tab-pane" id="family-info-tab-pane" role="tabpanel"
                                            aria-labelledby="family-info-tab" tabindex="0">
                                            @include('tenant.partials.beneficiaryForm.family-information')
                                        </div>
                                        <div class="tab-pane" id="economic-info-tab-pane" role="tabpanel"
                                            aria-labelledby="economic-info-tab" tabindex="0">
                                            @include('tenant.admin.beneficiaries.partials.economic-information')
                                        </div>
                                        <div class="tab-pane" id="documents-tab-pane" role="tabpanel"
                                            aria-labelledby="documents-tab" tabindex="0">
                                            @include('tenant.admin.beneficiaries.partials.documents')
                                        </div>
                                        <div class="tab-pane" id="activity-tab-pane" role="tabpanel"
                                            aria-labelledby="activity-tab" tabindex="0">
                                            @include('tenant.partials.activity', ['activityLogs' => $activityLogs])
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            @include('tenant.admin.beneficiaries.partials.sidebar')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
<script>
    new SimpleBar(document.getElementById('activity-timeline'), {
        autoHide: true
    });
    document.addEventListener('DOMContentLoaded', function() {
        const loadMoreBtn = document.getElementById('load-more-activities');
        if (!loadMoreBtn) return;
    
        loadMoreBtn.addEventListener('click', function() {
            const button = this;
            const page = parseInt(button.dataset.page) + 1;
            const beneficiaryId = '{{ $beneficiary->id }}';
            
            button.disabled = true;
            button.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...';
    
            fetch(`/admin/beneficiaries/${beneficiaryId}?page=${page}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newItems = doc.querySelectorAll('#activity-timeline li');
                
                const timeline = document.getElementById('activity-timeline');
                newItems.forEach(item => {
                    timeline.appendChild(item);
                });
    
                button.dataset.page = page;
                button.disabled = false;
                button.innerHTML = 'Load More';
    
                // Hide button if no more pages
                if (!doc.querySelector('#load-more-activities')) {
                    button.parentElement.remove();
                }
            })
            .catch(error => {
                console.error('Error loading more activities:', error);
                button.disabled = false;
                button.innerHTML = 'Load More';
            });
        });
    });
    </script> 
@endsection