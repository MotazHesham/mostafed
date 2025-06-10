@extends('tenant.layouts.master')
@section('content')
    @php
        $breadcrumbs = [
            ['title' => trans('cruds.taskManagement.title'), 'url' => '#'],
            [
                'title' => trans('global.list') . ' ' . trans('cruds.taskPriority.title'),
                'url' => route('admin.task-priorities.index'),
            ],
            [
                'title' => trans('global.create') . ' ' . trans('cruds.taskPriority.title_singular'),
                'url' => route('admin.task-priorities.create'),
            ],
        ];
    @endphp
    @include('tenant.partials.breadcrumb')
    <div class="card">
        <div class="card-header p-3">
            <h5 class="card-title mb-0">
                {{ trans('global.create') }} {{ trans('cruds.taskPriority.title_singular') }}
            </h5>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.task-priorities.store') }}" enctype="multipart/form-data">
                @csrf
                @include('utilities.form.text', [
                    'name' => 'name',
                    'label' => 'cruds.taskPriority.fields.name',
                    'isRequired' => true,
                ])
                @include('utilities.form.select', [
                    'name' => 'badge_class',
                    'label' => 'cruds.taskPriority.fields.badge_class',
                    'isRequired' => true,
                    'options' => App\Models\TaskPriority::BADGE_CLASS_SELECT,
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
