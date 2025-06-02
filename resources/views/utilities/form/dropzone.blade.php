<div class="form-group mb-3">
    <label class="form-label {{ $isRequired ? 'required' : '' }}">{{ trans($label) }}</label>
    <div class="needsclick dropzone {{ $errors->has($name) ? 'is-invalid' : '' }}" id="{{ $name }}-dropzone">
    </div>
    @if ($errors->has($name))
        <div class="invalid-feedback">
            {{ $errors->first($name) }}
        </div>
    @endif
    <span class="help-block">{{ trans($label . '_helper') }}</span>
</div>

@section('scripts')
    <style>
        .dropzone .dz-preview .dz-remove {
            display: none !important; /* Hide the default remove link */
        }

        .dropzone .dz-preview .dz-image {
            position: relative;
        }

        .dropzone .dz-preview .custom-remove-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: rgba(224, 52, 52, 0.678);
            border: 1px solid rgba(233, 212, 212, 0.3);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 1000;
            cursor: pointer;
        }

        .dropzone .dz-preview .custom-remove-btn:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        [data-bs-theme="light"] .dropzone .dz-preview .custom-remove-btn {
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(0, 0, 0, 0.3);
            color: #333;
        }

        [data-bs-theme="light"] .dropzone .dz-preview .custom-remove-btn:hover {
            background: rgba(0, 0, 0, 0.3);
        }

        /* Ensure the button stays on top of Dropzone's hover overlay */
        .dropzone .dz-preview .dz-details {
            z-index: 20 !important;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .dropzone .dz-preview:hover .dz-details {
            opacity: 1;
        }

        .dropzone .dz-preview .dz-progress,
        .dropzone .dz-preview .dz-success-mark,
        .dropzone .dz-preview .dz-error-mark {
            z-index: 20 !important;
        }

        /* Make sure the image container doesn't block the button */
        .dropzone .dz-preview .dz-image img {
            z-index: 1;
        }

        /* Ensure the preview container doesn't block the button */
        .dropzone .dz-preview {
            position: relative;
        }
    </style>
    <script>
        const dropzoneConfig = {
            url: '{{ $url }}',
            maxFilesize: 5, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 5,
                width: 4096,
                height: 4096
            },
            success: function(file, response) {
                const form = document.querySelector('form');
                const existingInput = form.querySelector(`input[name="{{ $name }}"]`);
                if (existingInput) {
                    existingInput.remove();
                }
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = '{{ $name }}';
                input.value = response.name;
                form.appendChild(input);
            },
            removedfile: function(file) {
                const previewElement = file.previewElement;
                if (previewElement) {
                    previewElement.remove();
                }
                
                if (file.status !== 'error') {
                    const form = document.querySelector('form');
                    const input = form.querySelector(`input[name="{{ $name }}"]`);
                    if (input) {
                        input.remove();
                    }
                    this.options.maxFiles = this.options.maxFiles + 1;
                }
            },
            init: function() {
                @if (isset($model) && $model->{$name})
                    const file = {!! json_encode($model->{$name}) !!};
                    this.displayExistingFile(file, file.preview ?? file.preview_url);
                    const form = document.querySelector('form');
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = '{{ $name }}';
                    input.value = file.file_name;
                    form.appendChild(input);
                    this.options.maxFiles = this.options.maxFiles - 1; 
                @endif

                this.on("success", function(file) {
                    // Add custom remove button
                    const removeBtn = document.createElement('div');
                    removeBtn.className = 'custom-remove-btn';
                    removeBtn.innerHTML = '<i class="ti ti-x" style="cursor: pointer;"></i>';
                    removeBtn.onclick = (e) => {
                        e.preventDefault();
                        e.stopPropagation();
                        this.removeFile(file);
                    };
                    file.previewElement.appendChild(removeBtn);
                });
            },
            error: function(file, response) {
                let message = '';
                if (typeof response === 'string') {
                    message = response;
                } else if (response && response.errors && response.errors.file) {
                    message = response.errors.file;
                } else {
                    message = 'An error occurred while uploading the file.';
                }

                const previewElement = file.previewElement;
                if (previewElement) {
                    previewElement.classList.add('dz-error');
                    const errorElements = previewElement.querySelectorAll('[data-dz-errormessage]');
                    errorElements.forEach(element => {
                        element.textContent = message;
                    });
                }
            }
        };

        // Initialize Dropzone
        new Dropzone(`#{{ $name }}-dropzone`, dropzoneConfig);
    </script>
@endsection
