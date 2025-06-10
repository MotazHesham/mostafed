@extends('tenant.layouts.master')
@section('content')
    @php
        $breadcrumbs = [
            ['title' => trans('cruds.taskManagement.title'), 'url' => '#'],
            [
                'title' => trans('global.list') . ' ' . trans('cruds.taskStatus.title'),
                'url' => route('admin.task-statuses.index'),
            ],
            [
                'title' => trans('global.create') . ' ' . trans('cruds.taskStatus.title_singular'),
                'url' => route('admin.task-statuses.create'),
            ],
        ];
    @endphp
    @include('tenant.partials.breadcrumb')
    <div class="card">
        <div class="card-header p-3">
            <h6 class="card-title">
                {{ trans('global.create') }} {{ trans('cruds.taskStatus.title_singular') }}
            </h6>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.task-statuses.store') }}" enctype="multipart/form-data">
                @csrf
                @include('utilities.form.text', [
                    'name' => 'name',
                    'label' => 'cruds.taskStatus.fields.name',
                    'isRequired' => true,
                ])
                @include('utilities.form.select', [
                    'name' => 'badge_class',
                    'label' => 'cruds.taskStatus.fields.badge_class',
                    'isRequired' => true,
                    'options' => App\Models\TaskStatus::BADGE_CLASS_SELECT,
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
