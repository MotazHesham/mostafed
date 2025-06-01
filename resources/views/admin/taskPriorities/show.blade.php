@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.taskPriority.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.task-priorities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.taskPriority.fields.id') }}
                        </th>
                        <td>
                            {{ $taskPriority->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taskPriority.fields.name') }}
                        </th>
                        <td>
                            {{ $taskPriority->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taskPriority.fields.badge_class') }}
                        </th>
                        <td>
                            {{ App\Models\TaskPriority::BADGE_CLASS_SELECT[$taskPriority->badge_class] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.task-priorities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection