@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.taskPriority.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.task-priorities.update", [$taskPriority->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.taskPriority.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $taskPriority->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.taskPriority.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.taskPriority.fields.badge_class') }}</label>
                <select class="form-control {{ $errors->has('badge_class') ? 'is-invalid' : '' }}" name="badge_class" id="badge_class" required>
                    <option value disabled {{ old('badge_class', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TaskPriority::BADGE_CLASS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('badge_class', $taskPriority->badge_class) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('badge_class'))
                    <div class="invalid-feedback">
                        {{ $errors->first('badge_class') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.taskPriority.fields.badge_class_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection