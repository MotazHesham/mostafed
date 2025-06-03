@extends('tenant.layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.beneficiaryFamily.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.beneficiary-families.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="beneficiary_id">{{ trans('cruds.beneficiaryFamily.fields.beneficiary') }}</label>
                <select class="form-control select2 {{ $errors->has('beneficiary') ? 'is-invalid' : '' }}" name="beneficiary_id" id="beneficiary_id" required>
                    @foreach($beneficiaries as $id => $entry)
                        <option value="{{ $id }}" {{ old('beneficiary_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('beneficiary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('beneficiary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryFamily.fields.beneficiary_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name">{{ trans('cruds.beneficiaryFamily.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryFamily.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.beneficiaryFamily.fields.gender') }}</label>
                <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender">
                    <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\BeneficiaryFamily::GENDER_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('gender', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('gender'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gender') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryFamily.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dob">{{ trans('cruds.beneficiaryFamily.fields.dob') }}</label>
                <input class="form-control date {{ $errors->has('dob') ? 'is-invalid' : '' }}" type="text" name="dob" id="dob" value="{{ old('dob') }}">
                @if($errors->has('dob'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dob') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryFamily.fields.dob_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.beneficiaryFamily.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryFamily.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.beneficiaryFamily.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', '') }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryFamily.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="family_relationship_id">{{ trans('cruds.beneficiaryFamily.fields.family_relationship') }}</label>
                <select class="form-control select2 {{ $errors->has('family_relationship') ? 'is-invalid' : '' }}" name="family_relationship_id" id="family_relationship_id">
                    @foreach($family_relationships as $id => $entry)
                        <option value="{{ $id }}" {{ old('family_relationship_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('family_relationship'))
                    <div class="invalid-feedback">
                        {{ $errors->first('family_relationship') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryFamily.fields.family_relationship_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="marital_status_id">{{ trans('cruds.beneficiaryFamily.fields.marital_status') }}</label>
                <select class="form-control select2 {{ $errors->has('marital_status') ? 'is-invalid' : '' }}" name="marital_status_id" id="marital_status_id">
                    @foreach($marital_statuses as $id => $entry)
                        <option value="{{ $id }}" {{ old('marital_status_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('marital_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('marital_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryFamily.fields.marital_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="health_condition_id">{{ trans('cruds.beneficiaryFamily.fields.health_condition') }}</label>
                <select class="form-control select2 {{ $errors->has('health_condition') ? 'is-invalid' : '' }}" name="health_condition_id" id="health_condition_id">
                    @foreach($health_conditions as $id => $entry)
                        <option value="{{ $id }}" {{ old('health_condition_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('health_condition'))
                    <div class="invalid-feedback">
                        {{ $errors->first('health_condition') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryFamily.fields.health_condition_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="disability_type_id">{{ trans('cruds.beneficiaryFamily.fields.disability_type') }}</label>
                <select class="form-control select2 {{ $errors->has('disability_type') ? 'is-invalid' : '' }}" name="disability_type_id" id="disability_type_id">
                    @foreach($disability_types as $id => $entry)
                        <option value="{{ $id }}" {{ old('disability_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('disability_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('disability_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryFamily.fields.disability_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.beneficiaryFamily.fields.can_work') }}</label>
                <select class="form-control {{ $errors->has('can_work') ? 'is-invalid' : '' }}" name="can_work" id="can_work">
                    <option value disabled {{ old('can_work', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\BeneficiaryFamily::CAN_WORK_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('can_work', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('can_work'))
                    <div class="invalid-feedback">
                        {{ $errors->first('can_work') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryFamily.fields.can_work_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.beneficiaryFamily.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryFamily.fields.photo_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.beneficiary-families.storeMedia') }}',
    maxFilesize: 4, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($beneficiaryFamily) && $beneficiaryFamily->photo)
      var file = {!! json_encode($beneficiaryFamily->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection