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

@section('scripts')
    @parent
    <script>
        /* filepond */
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginFileValidateSize,
            FilePondPluginFileValidateType
        );
        const element = document.getElementById('{{ $id }}-filepond');
        const pond = FilePond.create(
            element, {
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
                        const formData = new FormData();

                        // Upload the original file as-is without any modifications
                        formData.append('file', file, file.name);
                        formData.append('size', 5);
                        formData.append('width', 4096);
                        formData.append('height', 4096);

                        const request = new XMLHttpRequest();
                        request.open('POST', '{{ $url }}');
                        request.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

                        request.upload.onprogress = (e) => {
                            progress(e.lengthComputable, e.loaded, e.total);
                        };

                        request.onload = function() {
                            if (request.status >= 200 && request.status < 300) {
                                const response = JSON.parse(request.responseText);

                                // Remove existing hidden input if any
                                const form = document.getElementById('{{ $id }}-filepond').closest(
                                    'form');

                                // Create new hidden input with response data
                                const input = document.createElement('input');
                                input.type = 'hidden';
                                input.name = '{{ $name }}';
                                input.value = response.name;
                                form.appendChild(input);

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
                            const form = document.querySelector('form');
                            const input = form.querySelector(`input[name="{{ $name }}"]`);
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
            const form = document.querySelector('form');
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = '{{ $name }}';
            input.value = '{{ $model->{$name}->file_name ?? $model->{$name} }}';
            form.appendChild(input);
        @endif
    </script>
@endsection
