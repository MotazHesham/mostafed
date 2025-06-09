@extends('tenant.layouts.master')
@section('content')
    @php
        $breadcrumbs = [
            ['title' => trans('cruds.beneficiariesManagment.title'), 'url' => '#'],
            [
                'title' => trans('global.list') . ' ' . trans('cruds.beneficiary.title'),
                'url' => route('admin.beneficiaries.index'),
            ],
            ['title' => trans('global.edit') . ' ' . trans('cruds.beneficiary.title'), 'url' => '#'],
        ];
    @endphp
    @include('tenant.partials.breadcrumb')

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">
                        {{ trans('global.edit') }} {{ trans('cruds.beneficiary.title_singular') }}
                    </div>
                </div>
                <div class="card-body p-0">
                    <form class="wizard wizard-tab horizontal" method="POST" action="{{ route('admin.beneficiaries.update', $beneficiary->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <aside class="wizard-content container">
                            <div class=" wizard-step "
                                data-title="{{ trans('cruds.beneficiary.form_steps.login_information') }}"
                                data-id="2e8WqSV3slGIpTbnjcJzmDwBQaHrfh0Z">
                                @include('tenant.partials.beneficiaryForm.login-information')
                            </div>
                            <div class=" wizard-step active"
                                data-title="{{ trans('cruds.beneficiary.form_steps.basic_information') }}"
                                data-id="2e8WqSV3slGIpTbnjcJzmDwBQaHrfh0Z">
                                @include('tenant.partials.beneficiaryForm.basic-information')
                            </div>
                            <div class="wizard-step"
                                data-title="{{ trans('cruds.beneficiary.form_steps.work_information') }}"
                                data-id="H53WJiv9blN17MYTztq4g8U6eSVkaZDx">
                                @include('tenant.partials.beneficiaryForm.work-information')
                            </div>
                            <div class="wizard-step"
                                data-title="{{ trans('cruds.beneficiary.form_steps.family_information') }}"
                                data-id="dOM0iRAyJXsLTr9b3KZfQ2jNv4pgn6Gu" data-limit="3">
                                @include('tenant.partials.beneficiaryForm.family-information')
                            </div>
                            <div class="wizard-step"
                                data-title="{{ trans('cruds.beneficiary.form_steps.economic_information') }}"
                                data-id="dOM0iRAyJXsLTr9b3KZfQ2jNv4pgn6Gu" data-limit="3">
                                @include('tenant.partials.beneficiaryForm.economic-information')
                            </div>
                            <div class="wizard-step" data-title="{{ trans('cruds.beneficiary.form_steps.documents') }}"
                                data-id="dOM0iRAyJXsLTr9b3KZfQ2jNv4pgn6Gu" data-limit="3">
                                @include('tenant.partials.beneficiaryForm.documents')
                            </div>
                        </aside>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        (function() {
            "use strict";

            /* Form Wizard 1 */
            let args = {
                "wz_class": ".wizard-tab",
                highlight: true,
                highlight_time: 1000,
            };
            const wizard = new Wizard1(args, {
                validate: false,
            });
            wizard.init();
            /* Form Wizard 1 */ 

        })();
    </script>
@endsection
