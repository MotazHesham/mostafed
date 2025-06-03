@extends('tenant.layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.outgoingLetter.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.outgoing-letters.update", [$outgoingLetter->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="letter_number">{{ trans('cruds.outgoingLetter.fields.letter_number') }}</label>
                <input class="form-control {{ $errors->has('letter_number') ? 'is-invalid' : '' }}" type="text" name="letter_number" id="letter_number" value="{{ old('letter_number', $outgoingLetter->letter_number) }}">
                @if($errors->has('letter_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('letter_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outgoingLetter.fields.letter_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="letter_date">{{ trans('cruds.outgoingLetter.fields.letter_date') }}</label>
                <input class="form-control date {{ $errors->has('letter_date') ? 'is-invalid' : '' }}" type="text" name="letter_date" id="letter_date" value="{{ old('letter_date', $outgoingLetter->letter_date) }}" required>
                @if($errors->has('letter_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('letter_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outgoingLetter.fields.letter_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="delivered_date">{{ trans('cruds.outgoingLetter.fields.delivered_date') }}</label>
                <input class="form-control date {{ $errors->has('delivered_date') ? 'is-invalid' : '' }}" type="text" name="delivered_date" id="delivered_date" value="{{ old('delivered_date', $outgoingLetter->delivered_date) }}" required>
                @if($errors->has('delivered_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('delivered_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outgoingLetter.fields.delivered_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="recevier_id">{{ trans('cruds.outgoingLetter.fields.recevier') }}</label>
                <select class="form-control select2 {{ $errors->has('recevier') ? 'is-invalid' : '' }}" name="recevier_id" id="recevier_id" required>
                    @foreach($receviers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('recevier_id') ? old('recevier_id') : $outgoingLetter->recevier->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('recevier'))
                    <div class="invalid-feedback">
                        {{ $errors->first('recevier') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outgoingLetter.fields.recevier_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="subject">{{ trans('cruds.outgoingLetter.fields.subject') }}</label>
                <input class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}" type="text" name="subject" id="subject" value="{{ old('subject', $outgoingLetter->subject) }}" required>
                @if($errors->has('subject'))
                    <div class="invalid-feedback">
                        {{ $errors->first('subject') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outgoingLetter.fields.subject_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="letter">{{ trans('cruds.outgoingLetter.fields.letter') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('letter') ? 'is-invalid' : '' }}" name="letter" id="letter">{!! old('letter', $outgoingLetter->letter) !!}</textarea>
                @if($errors->has('letter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('letter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outgoingLetter.fields.letter_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.outgoingLetter.fields.priority') }}</label>
                <select class="form-control {{ $errors->has('priority') ? 'is-invalid' : '' }}" name="priority" id="priority" required>
                    <option value disabled {{ old('priority', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\OutgoingLetter::PRIORITY_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('priority', $outgoingLetter->priority) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('priority'))
                    <div class="invalid-feedback">
                        {{ $errors->first('priority') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outgoingLetter.fields.priority_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.outgoingLetter.fields.outgoing_type') }}</label>
                <select class="form-control {{ $errors->has('outgoing_type') ? 'is-invalid' : '' }}" name="outgoing_type" id="outgoing_type" required>
                    <option value disabled {{ old('outgoing_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\OutgoingLetter::OUTGOING_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('outgoing_type', $outgoingLetter->outgoing_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('outgoing_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('outgoing_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outgoingLetter.fields.outgoing_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="attachments">{{ trans('cruds.outgoingLetter.fields.attachments') }}</label>
                <div class="needsclick dropzone {{ $errors->has('attachments') ? 'is-invalid' : '' }}" id="attachments-dropzone">
                </div>
                @if($errors->has('attachments'))
                    <div class="invalid-feedback">
                        {{ $errors->first('attachments') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outgoingLetter.fields.attachments_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.outgoingLetter.fields.note') }}</label>
                <textarea class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note" id="note">{{ old('note', $outgoingLetter->note) }}</textarea>
                @if($errors->has('note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('note') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outgoingLetter.fields.note_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="incoming_letter_id">{{ trans('cruds.outgoingLetter.fields.incoming_letter') }}</label>
                <select class="form-control select2 {{ $errors->has('incoming_letter') ? 'is-invalid' : '' }}" name="incoming_letter_id" id="incoming_letter_id">
                    @foreach($incoming_letters as $id => $entry)
                        <option value="{{ $id }}" {{ (old('incoming_letter_id') ? old('incoming_letter_id') : $outgoingLetter->incoming_letter->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('incoming_letter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('incoming_letter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outgoingLetter.fields.incoming_letter_helper') }}</span>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.outgoing-letters.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $outgoingLetter->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    var uploadedAttachmentsMap = {}
Dropzone.options.attachmentsDropzone = {
    url: '{{ route('admin.outgoing-letters.storeMedia') }}',
    maxFilesize: 4, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="attachments[]" value="' + response.name + '">')
      uploadedAttachmentsMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedAttachmentsMap[file.name]
      }
      $('form').find('input[name="attachments[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($outgoingLetter) && $outgoingLetter->attachments)
          var files =
            {!! json_encode($outgoingLetter->attachments) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="attachments[]" value="' + file.file_name + '">')
            }
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