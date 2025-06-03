@extends('tenant.layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.familyRelationship.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.family-relationships.update", [$familyRelationship->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.familyRelationship.fields.gender') }}</label>
                @foreach(App\Models\FamilyRelationship::GENDER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="gender_{{ $key }}" name="gender" value="{{ $key }}" {{ old('gender', $familyRelationship->gender) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="gender_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('gender'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gender') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.familyRelationship.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.familyRelationship.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $familyRelationship->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.familyRelationship.fields.name_helper') }}</span>
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