@extends('tenant.layouts.master-beneficiary')
@section('content')
    @php
        $pageTitle = trans('global.complete_profile');
    @endphp
    @include('tenant.partials.breadcrumb')

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title"> 
                    </div>
                </div>
                <div class="card-body p-0">
                    <div id="basicwizard">
                        <ul class="nav nav-tabs nav-justified flex-md-row flex-column mb-4 tab-style-6 p-0">
                            <li class="nav-item" data-target-form="#login_informationForm">
                                <a class="nav-link icon-btn d-flex align-items-center justify-content-md-center gap-1 @if ($beneficiary->form_step == 'login_information') active @endif"
                                    data-bs-toggle="tab" data-toggle="tab"
                                    href="#login_information"><span>{{ trans('cruds.beneficiary.form_steps.login_information') }}</span></a>
                            </li>
                            <li class="nav-item" data-target-form="#basic_informationForm">
                                <a class="nav-link icon-btn d-flex align-items-center justify-content-md-center gap-1 @if ($beneficiary->form_step == 'basic_information') active @endif"
                                    data-bs-toggle="tab" data-toggle="tab"
                                    href="#basic_information"><span>{{ trans('cruds.beneficiary.form_steps.basic_information') }}</span></a>
                            </li>
                            <li class="nav-item" data-target-form="#work_informationForm">
                                <a class="nav-link icon-btn d-flex align-items-center justify-content-md-center gap-1 @if ($beneficiary->form_step == 'work_information') active @endif"
                                    data-bs-toggle="tab" data-toggle="tab"
                                    href="#work_information"><span>{{ trans('cruds.beneficiary.form_steps.work_information') }}</span></a>
                            </li>
                            <li class="nav-item" data-target-form="#family_informationForm">
                                <a class="nav-link icon-btn d-flex align-items-center justify-content-md-center gap-1 @if ($beneficiary->form_step == 'family_information') active @endif"
                                    data-bs-toggle="tab" data-toggle="tab"
                                    href="#family_information"><span>{{ trans('cruds.beneficiary.form_steps.family_information') }}</span></a>
                            </li>
                            <li class="nav-item" data-target-form="#economic_informationForm">
                                <a class="nav-link icon-btn d-flex align-items-center justify-content-md-center gap-1 @if ($beneficiary->form_step == 'economic_information') active @endif"
                                    data-bs-toggle="tab" data-toggle="tab"
                                    href="#economic_information"><span>{{ trans('cruds.beneficiary.form_steps.economic_information') }}</span></a>
                            </li>
                            <li class="nav-item" data-target-form="#documentsForm">
                                <a class="nav-link icon-btn d-flex align-items-center justify-content-md-center gap-1 @if ($beneficiary->form_step == 'documents') active @endif"
                                    data-bs-toggle="tab" data-toggle="tab"
                                    href="#documents"><span>{{ trans('cruds.beneficiary.form_steps.documents') }}</span></a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane @if ($beneficiary->form_step == 'login_information') show active @endif" id="login_information">
                            @include('tenant.partials.beneficiaryForm.login-information', [
                                'routeName' => 'beneficiary.profile.update',
                                'storeMediaUrl' => 'beneficiary.profile.storeMedia',
                            ])
                        </div>
                        <div class="tab-pane @if ($beneficiary->form_step == 'basic_information') show active @endif" id="basic_information">
                            @include('tenant.partials.beneficiaryForm.basic-information', [
                                'routeName' => 'beneficiary.profile.update',
                            ])
                        </div>
                        <div class="tab-pane @if ($beneficiary->form_step == 'work_information') show active @endif" id="work_information">
                            @include('tenant.partials.beneficiaryForm.work-information', [
                                'routeName' => 'beneficiary.profile.update',
                            ])
                        </div>
                        <div class="tab-pane @if ($beneficiary->form_step == 'family_information') show active @endif" id="family_information">
                            @include('tenant.partials.beneficiaryForm.family-information', [
                                'routeName' => 'beneficiary.beneficiary-families.create',
                                'viewName' => 'tenant.beneficiary.families.index',
                            ])
                        </div>
                        <div class="tab-pane @if ($beneficiary->form_step == 'economic_information') show active @endif"
                            id="economic_information">
                            @include('tenant.partials.beneficiaryForm.economic-information', [
                                'routeName' => 'beneficiary.profile.update',
                            ])
                        </div>
                        <div class="tab-pane @if ($beneficiary->form_step == 'documents') show active @endif" id="documents">
                            @include('tenant.partials.beneficiaryForm.documents', [
                                'routeName' => 'beneficiary.profile.update',
                                'storeMediaUrl' => 'beneficiary.profile.storeMedia',
                            ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        (function() {
            "use strict";

            const wizard = new Wizard1('#basicwizard', {
                validate: true,
            });

            // Function to disable a step
            function disableStep(stepIndex) {
                const navItems = document.querySelectorAll('#basicwizard .nav-item');
                if (navItems[stepIndex]) {
                    navItems[stepIndex].classList.add('disabled');
                    navItems[stepIndex].querySelector('a').style.pointerEvents = 'none';
                    navItems[stepIndex].querySelector('a').style.opacity = '0.5';
                }
            }

            // Function to enable a step
            function enableStep(stepIndex) {
                const navItems = document.querySelectorAll('#basicwizard .nav-item');
                if (navItems[stepIndex]) {
                    navItems[stepIndex].classList.remove('disabled');
                    navItems[stepIndex].querySelector('a').style.pointerEvents = 'auto';
                    navItems[stepIndex].querySelector('a').style.opacity = '1';
                }
            }

            @if ($beneficiary->form_step == 'login_information')
                disableStep(1);
                disableStep(2);
                disableStep(3);
                disableStep(4);
                disableStep(5);
            @elseif ($beneficiary->form_step == 'basic_information')
                disableStep(2);
                disableStep(3);
                disableStep(4);
                disableStep(5);
            @elseif ($beneficiary->form_step == 'work_information')
                disableStep(3);
                disableStep(4);
                disableStep(5);
            @elseif ($beneficiary->form_step == 'family_information')
                disableStep(5);
            @elseif ($beneficiary->form_step == 'economic_information')
                disableStep(5);
            @endif

        })();
    </script>
@endsection
