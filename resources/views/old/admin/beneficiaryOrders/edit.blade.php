@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.beneficiaryOrder.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.beneficiary-orders.update", [$beneficiaryOrder->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="beneficiary_id">{{ trans('cruds.beneficiaryOrder.fields.beneficiary') }}</label>
                <select class="form-control select2 {{ $errors->has('beneficiary') ? 'is-invalid' : '' }}" name="beneficiary_id" id="beneficiary_id" required>
                    @foreach($beneficiaries as $id => $entry)
                        <option value="{{ $id }}" {{ (old('beneficiary_id') ? old('beneficiary_id') : $beneficiaryOrder->beneficiary->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('beneficiary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('beneficiary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryOrder.fields.beneficiary_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.beneficiaryOrder.fields.service_type') }}</label>
                <select class="form-control {{ $errors->has('service_type') ? 'is-invalid' : '' }}" name="service_type" id="service_type">
                    <option value disabled {{ old('service_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\BeneficiaryOrder::SERVICE_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('service_type', $beneficiaryOrder->service_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('service_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('service_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryOrder.fields.service_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="service_id">{{ trans('cruds.beneficiaryOrder.fields.service') }}</label>
                <select class="form-control select2 {{ $errors->has('service') ? 'is-invalid' : '' }}" name="service_id" id="service_id">
                    @foreach($services as $id => $entry)
                        <option value="{{ $id }}" {{ (old('service_id') ? old('service_id') : $beneficiaryOrder->service->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('service'))
                    <div class="invalid-feedback">
                        {{ $errors->first('service') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryOrder.fields.service_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.beneficiaryOrder.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" required>{{ old('description', $beneficiaryOrder->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryOrder.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="attachment">{{ trans('cruds.beneficiaryOrder.fields.attachment') }}</label>
                <div class="needsclick dropzone {{ $errors->has('attachment') ? 'is-invalid' : '' }}" id="attachment-dropzone">
                </div>
                @if($errors->has('attachment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('attachment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryOrder.fields.attachment_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="status_id">{{ trans('cruds.beneficiaryOrder.fields.status') }}</label>
                <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status_id" id="status_id" required>
                    @foreach($statuses as $id => $entry)
                        <option value="{{ $id }}" {{ (old('status_id') ? old('status_id') : $beneficiaryOrder->status->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryOrder.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.beneficiaryOrder.fields.accept_status') }}</label>
                @foreach(App\Models\BeneficiaryOrder::ACCEPT_STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('accept_status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="accept_status_{{ $key }}" name="accept_status" value="{{ $key }}" {{ old('accept_status', $beneficiaryOrder->accept_status) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="accept_status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('accept_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('accept_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryOrder.fields.accept_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.beneficiaryOrder.fields.note') }}</label>
                <textarea class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note" id="note">{{ old('note', $beneficiaryOrder->note) }}</textarea>
                @if($errors->has('note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('note') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryOrder.fields.note_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="refused_reason">{{ trans('cruds.beneficiaryOrder.fields.refused_reason') }}</label>
                <textarea class="form-control {{ $errors->has('refused_reason') ? 'is-invalid' : '' }}" name="refused_reason" id="refused_reason">{{ old('refused_reason', $beneficiaryOrder->refused_reason) }}</textarea>
                @if($errors->has('refused_reason'))
                    <div class="invalid-feedback">
                        {{ $errors->first('refused_reason') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryOrder.fields.refused_reason_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('done') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="done" id="done" value="1" {{ $beneficiaryOrder->done || old('done', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="done">{{ trans('cruds.beneficiaryOrder.fields.done') }}</label>
                </div>
                @if($errors->has('done'))
                    <div class="invalid-feedback">
                        {{ $errors->first('done') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryOrder.fields.done_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="specialist_id">{{ trans('cruds.beneficiaryOrder.fields.specialist') }}</label>
                <select class="form-control select2 {{ $errors->has('specialist') ? 'is-invalid' : '' }}" name="specialist_id" id="specialist_id" required>
                    @foreach($specialists as $id => $entry)
                        <option value="{{ $id }}" {{ (old('specialist_id') ? old('specialist_id') : $beneficiaryOrder->specialist->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('specialist'))
                    <div class="invalid-feedback">
                        {{ $errors->first('specialist') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaryOrder.fields.specialist_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.attachmentDropzone = {
    url: '{{ route('admin.beneficiary-orders.storeMedia') }}',
    maxFilesize: 4, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4
    },
    success: function (file, response) {
      $('form').find('input[name="attachment"]').remove()
      $('form').append('<input type="hidden" name="attachment" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="attachment"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($beneficiaryOrder) && $beneficiaryOrder->attachment)
      var file = {!! json_encode($beneficiaryOrder->attachment) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="attachment" value="' + file.file_name + '">')
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