@extends('central.layouts.master')
@section('content')
    @php
        $breadcrumbs = [
            ['title' => trans('cruds.userManagement.title'), 'url' => '#'],
            ['title' => trans('cruds.charity.title'), 'url' => '#'],
            ['title' => trans('global.create') . ' ' . trans('cruds.charity.title_singular')],
        ]; 
    @endphp

    @include('central.partials.breadcrumb')
    <div class="card">
        <div class="card-header p-3">
            <h6 class="card-title">
                {{ trans('global.create') }} {{ trans('cruds.charity.title_singular') }}
            </h6>
        </div>
        <div class="card-body p-3">
            <form method="POST" action="{{ route('admin.charities.store') }}" enctype="multipart/form-data">
                @csrf
                @include('utilities.form.text', [
                    'name' => 'name', 
                    'label' => 'cruds.charity.fields.name',
                    'isRequired' => true
                ])
                @include('utilities.form.text', [
                    'name' => 'phone', 
                    'label' => 'cruds.charity.fields.phone',
                    'isRequired' => true
                ])
                @include('utilities.form.text', [
                    'name' => 'address', 
                    'label' => 'cruds.charity.fields.address',
                    'isRequired' => true
                ])
                @include('utilities.form.dropzone', [
                    'name' => 'logo', 
                    'label' => 'cruds.charity.fields.logo',
                    'url' => route('admin.charities.storeMedia'),
                    'isRequired' => true
                ])
                @include('utilities.form.text', [
                    'name' => 'domain', 
                    'label' => 'cruds.charity.fields.domain',
                    'isRequired' => true
                ]) 
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection 