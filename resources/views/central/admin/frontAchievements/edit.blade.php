@extends('central.layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.frontAchievement.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.front-achievements.update", [$frontAchievement->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="icon">{{ trans('cruds.frontAchievement.fields.icon') }}</label>
                <input class="form-control {{ $errors->has('icon') ? 'is-invalid' : '' }}" type="text" name="icon" id="icon" value="{{ old('icon', $frontAchievement->icon) }}" required>
                @if($errors->has('icon'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icon') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.frontAchievement.fields.icon_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="icon_color">{{ trans('cruds.frontAchievement.fields.icon_color') }}</label>
                <input class="form-control {{ $errors->has('icon_color') ? 'is-invalid' : '' }}" type="text" name="icon_color" id="icon_color" value="{{ old('icon_color', $frontAchievement->icon_color) }}" required>
                @if($errors->has('icon_color'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icon_color') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.frontAchievement.fields.icon_color_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.frontAchievement.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $frontAchievement->title) }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.frontAchievement.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="achievement">{{ trans('cruds.frontAchievement.fields.achievement') }}</label>
                <input class="form-control {{ $errors->has('achievement') ? 'is-invalid' : '' }}" type="text" name="achievement" id="achievement" value="{{ old('achievement', $frontAchievement->achievement) }}" required>
                @if($errors->has('achievement'))
                    <div class="invalid-feedback">
                        {{ $errors->first('achievement') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.frontAchievement.fields.achievement_helper') }}</span>
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