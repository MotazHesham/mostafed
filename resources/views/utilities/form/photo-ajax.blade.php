<div class="form-group mb-3 text-center">
    <input type="file" class="single-fileupload" accept="image/png, image/jpeg, image/gif"
        id="{{ $id }}-filepond">
    <label for="{{ $id }}-filepond"
        class="form-label mt-4 {{ $isRequired ? 'required' : '' }}">{{ trans($label) }}</label>
    <span class="help-block">{{ trans($label . '_helper') }}</span>
    @if ($errors->has($name))
        <div class="invalid-feedback">
            {{ $errors->first($name) }}
        </div>
    @endif
</div>


<script>
    /* filepond */
    FilePond.registerPlugin(
        FilePondPluginImagePreview,
        FilePondPluginFileValidateSize,
        FilePondPluginFileValidateType
    );
    var element{{ $id }} = document.getElementById('{{ $id }}-filepond');
    var form{{ $id }} = document.getElementById('{{ $id }}-filepond').closest('form');
    var pond{{ $id }} = FilePond.create(
        element{{ $id }}, {
            labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,
            imagePreviewHeight: 170,
            stylePanelLayout: 'compact circle',
            styleLoadIndicatorPosition: 'center bottom',
            styleButtonRemoveItemPosition: 'center bottom',

            // Disable all image transformations to preserve original file
            allowImageTransform: false,
            allowImageResize: false,
            allowImageCrop: false,
            allowImageEdit: false,

            // Server configuration for AJAX upload
            server: {
                process: (fieldName, file, metadata, load, error, progress, abort) => {
                    var formData = new FormData();

                    // Upload the original file as-is without any modifications
                    formData.append('file', file, file.name);
                    formData.append('size', 5);
                    formData.append('width', 4096);
                    formData.append('height', 4096);

                    var request = new XMLHttpRequest();
                    request.open('POST', '{{ $url }}');
                    request.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

                    request.upload.onprogress = (e) => {
                        progress(e.lengthComputable, e.loaded, e.total);
                    };

                    request.onload = function() {
                        if (request.status >= 200 && request.status < 300) {
                            var response = JSON.parse(request.responseText);

                            // Remove existing hidden input if any
                            var existingInput = form{{ $id }}.querySelector(`input[name="{{ $name }}"]`);
                            if (existingInput) {
                                existingInput.remove();
                            }

                            // Create new hidden input with response data
                            var input = document.createElement('input');
                            input.type = 'hidden';
                            input.name = '{{ $name }}';
                            input.value = response.name;
                            form{{ $id }}.appendChild(input);

                            load(response.name);
                        } else {
                            error('Upload failed');
                            console.log(request.responseText);
                        }
                    };

                    request.onerror = function() {
                        error('Upload failed');
                    };

                    request.send(formData);

                    return {
                        abort: () => {
                            request.abort();
                            abort();
                        }
                    };
                },
                revert: {
                    url: '{{ $url }}',
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    onload: () => {
                        // Remove hidden input when file is removed
                        var input = form{{ $id }}.querySelector(`input[name="{{ $name }}"]`);
                        if (input) {
                            input.remove();
                        }
                    }
                }
            },

            // Handle existing files
            @if (isset($model) && $model->{$name})
                files: [{
                    source: '{{ $model->{$name}->file_name ?? $model->{$name} }}',
                    options: {
                        type: 'local',
                        file: {
                            name: '{{ $model->{$name}->original_name ?? $model->{$name} }}',
                            size: {{ $model->{$name}->size ?? 0 }},
                            type: '{{ $model->{$name}->mime_type ?? 'image/jpeg' }}'
                        }
                    }
                }]
            @endif
        }
    );

    @if (isset($model) && $model->{$name})
        // Add hidden input for existing file 
        var input{{ $id }} = document.createElement('input');
        input{{ $id }}.type = 'hidden';
        input{{ $id }}.name = '{{ $name }}';
        input{{ $id }}.value = '{{ $model->{$name}->file_name ?? $model->{$name} }}';
        form{{ $id }}.appendChild(input{{ $id }});
    @endif
</script>
