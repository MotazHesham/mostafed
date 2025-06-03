@extends('tenant.layouts.master')
@section('content')
@php
    $breadcrumbs = [
        ['title' => trans('cruds.userManagement.title'), 'url' => '#'],
        ['title' => trans('cruds.section.title'), 'url' => route('admin.sections.index')],
        ['title' => trans('global.edit') . ' ' . trans('cruds.section.title_singular'), 'url' => '#'],
    ];
@endphp
@include('tenant.partials.breadcrumb')

<div class="card">
    <div class="card-header p-3">
        <h6 class="card-title">
            {{ trans('global.edit') }} {{ trans('cruds.section.title_singular') }}
        </h6>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sections.update", [$section->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @include('utilities.form.text', [
                'name' => 'name',
                'label' => 'cruds.section.fields.name',
                'isRequired' => true,
                'value' => $section->name,
            ])
            @include('utilities.form.select', [
                'name' => 'department_id',
                'label' => 'cruds.section.fields.department',
                'options' => $departments,
                'isRequired' => true,
                'value' => $section->department_id,
            ]) 
            <div class="form-group">
                <button class="btn btn-primary-light rounded-pill btn-wave" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection