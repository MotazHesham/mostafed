@extends('tenant.layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.lettersOrganization.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.letters-organizations.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.lettersOrganization.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lettersOrganization.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contact_person">{{ trans('cruds.lettersOrganization.fields.contact_person') }}</label>
                <input class="form-control {{ $errors->has('contact_person') ? 'is-invalid' : '' }}" type="text" name="contact_person" id="contact_person" value="{{ old('contact_person', '') }}">
                @if($errors->has('contact_person'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contact_person') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lettersOrganization.fields.contact_person_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contact_phone">{{ trans('cruds.lettersOrganization.fields.contact_phone') }}</label>
                <input class="form-control {{ $errors->has('contact_phone') ? 'is-invalid' : '' }}" type="text" name="contact_phone" id="contact_phone" value="{{ old('contact_phone', '') }}">
                @if($errors->has('contact_phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contact_phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lettersOrganization.fields.contact_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contact_email">{{ trans('cruds.lettersOrganization.fields.contact_email') }}</label>
                <input class="form-control {{ $errors->has('contact_email') ? 'is-invalid' : '' }}" type="text" name="contact_email" id="contact_email" value="{{ old('contact_email', '') }}">
                @if($errors->has('contact_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contact_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lettersOrganization.fields.contact_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.lettersOrganization.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lettersOrganization.fields.address_helper') }}</span>
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