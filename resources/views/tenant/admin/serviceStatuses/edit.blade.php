@extends('tenant.layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.serviceStatus.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.service-statuses.update", [$serviceStatus->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.serviceStatus.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $serviceStatus->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.serviceStatus.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.serviceStatus.fields.badge_class') }}</label>
                <select class="form-control {{ $errors->has('badge_class') ? 'is-invalid' : '' }}" name="badge_class" id="badge_class" required>
                    <option value disabled {{ old('badge_class', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ServiceStatus::BADGE_CLASS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('badge_class', $serviceStatus->badge_class) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('badge_class'))
                    <div class="invalid-feedback">
                        {{ $errors->first('badge_class') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.serviceStatus.fields.badge_class_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ordering">{{ trans('cruds.serviceStatus.fields.ordering') }}</label>
                <input class="form-control {{ $errors->has('ordering') ? 'is-invalid' : '' }}" type="number" name="ordering" id="ordering" value="{{ old('ordering', $serviceStatus->ordering) }}" step="1" required>
                @if($errors->has('ordering'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ordering') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.serviceStatus.fields.ordering_helper') }}</span>
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