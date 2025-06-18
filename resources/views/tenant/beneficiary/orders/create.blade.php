@extends('tenant.layouts.master-beneficiary')
@section('content')
    @php
        $page_title = trans('global.create') . ' ' . trans('cruds.beneficiaryOrder.extra.title_singular');
    @endphp
    @include('tenant.partials.breadcrumb')
    <div class="card">
        <div class="card-header p-3"> 
            <h6 class="card-title">
                {{ trans('global.create') . ' ' . trans('cruds.beneficiaryOrder.extra.title_singular') }}
            </h6>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('beneficiary.beneficiary-orders.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="beneficiary_id" value="{{ auth()->user()->beneficiary->id }}">

                <div class="row">  
                    @include('utilities.form.select', [
                        'name' => 'service_type',
                        'label' => 'cruds.beneficiaryOrder.fields.service_type',
                        'isRequired' => true,
                        'grid' => 'col-md-6',
                        'options' => App\Models\Service::TYPE_SELECT,
                    ]) 
                    @include('utilities.form.text', [
                        'name' => 'title',
                        'label' => 'cruds.beneficiaryOrder.fields.title',
                        'isRequired' => true,
                        'grid' => 'col-md-12',
                    ])
                    @include('utilities.form.textarea', [
                        'name' => 'description',
                        'label' => 'cruds.beneficiaryOrder.fields.description',
                        'isRequired' => true,
                        'grid' => 'col-md-12',
                        'editor' => true,
                    ])
                    @include('utilities.form.dropzone', [
                        'name' => 'attachment',
                        'id' => 'attachment',
                        'label' => 'cruds.beneficiaryOrder.fields.attachment',
                        'isRequired' => false,
                        'grid' => 'col-md-12',
                        'url' => route('beneficiary.beneficiary-orders.storeMedia'),
                    ]) 
                </div>
                <div class="form-group">
                    <button class="btn btn-primary-light rounded-pill btn-wave" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection 
