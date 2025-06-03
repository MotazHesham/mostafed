@extends('tenant.layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.userQuery.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.user-queries.update", [$userQuery->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="question">{{ trans('cruds.userQuery.fields.question') }}</label>
                <textarea class="form-control {{ $errors->has('question') ? 'is-invalid' : '' }}" name="question" id="question" required>{{ old('question', $userQuery->question) }}</textarea>
                @if($errors->has('question'))
                    <div class="invalid-feedback">
                        {{ $errors->first('question') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userQuery.fields.question_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="answer">{{ trans('cruds.userQuery.fields.answer') }}</label>
                <textarea class="form-control {{ $errors->has('answer') ? 'is-invalid' : '' }}" name="answer" id="answer">{{ old('answer', $userQuery->answer) }}</textarea>
                @if($errors->has('answer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('answer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userQuery.fields.answer_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.userQuery.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $userQuery->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userQuery.fields.user_helper') }}</span>
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