@extends('tenant.layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.courseStudent.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.course-students.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="course_id">{{ trans('cruds.courseStudent.fields.course') }}</label>
                <select class="form-control select2 {{ $errors->has('course') ? 'is-invalid' : '' }}" name="course_id" id="course_id" required>
                    @foreach($courses as $id => $entry)
                        <option value="{{ $id }}" {{ old('course_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('course'))
                    <div class="invalid-feedback">
                        {{ $errors->first('course') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.courseStudent.fields.course_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="beneficiary_id">{{ trans('cruds.courseStudent.fields.beneficiary') }}</label>
                <select class="form-control select2 {{ $errors->has('beneficiary') ? 'is-invalid' : '' }}" name="beneficiary_id" id="beneficiary_id">
                    @foreach($beneficiaries as $id => $entry)
                        <option value="{{ $id }}" {{ old('beneficiary_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('beneficiary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('beneficiary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.courseStudent.fields.beneficiary_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="beneficiary_family_id">{{ trans('cruds.courseStudent.fields.beneficiary_family') }}</label>
                <select class="form-control select2 {{ $errors->has('beneficiary_family') ? 'is-invalid' : '' }}" name="beneficiary_family_id" id="beneficiary_family_id">
                    @foreach($beneficiary_families as $id => $entry)
                        <option value="{{ $id }}" {{ old('beneficiary_family_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('beneficiary_family'))
                    <div class="invalid-feedback">
                        {{ $errors->first('beneficiary_family') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.courseStudent.fields.beneficiary_family_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.courseStudent.fields.note') }}</label>
                <textarea class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note" id="note">{{ old('note') }}</textarea>
                @if($errors->has('note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('note') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.courseStudent.fields.note_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prev_courses">{{ trans('cruds.courseStudent.fields.prev_courses') }}</label>
                <textarea class="form-control {{ $errors->has('prev_courses') ? 'is-invalid' : '' }}" name="prev_courses" id="prev_courses">{{ old('prev_courses') }}</textarea>
                @if($errors->has('prev_courses'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prev_courses') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.courseStudent.fields.prev_courses_helper') }}</span>
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