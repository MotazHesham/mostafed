<div class="form-group mb-3 {{ $grid ?? '' }}">
    <label class="form-label" for="{{ $name }}">
        {{ trans($label) }}
        @if ($isRequired)
            <span class="text-danger">*</span>
        @endif
    </label>
    <div class="input-group">
        <div class="input-group-text text-muted">
            <i class="ri-calendar-line"></i>
        </div>
        <input type="text" class="form-control flatpickr-input active  {{ $errors->has($name) ? 'is-invalid' : '' }}"
            id="{{ $id }}" name="{{ $name }}" placeholder="{{ trans($label) }}"
            @if ($isRequired) required @endif value="{{ old($name, isset($value) ? $value : '') }}">
    </div>
    @if ($errors->has($name))
        <div class="invalid-feedback">
            {{ $errors->first($name) }}
        </div>
    @endif
    <span class="help-block">{{ trans($label . '_helper') }}</span>
</div>

@section('scripts')
    @parent
    <script>
        $(document).ready(function() {
            initializeFlatpickr('{{ $id }}');
        });
    </script>
@endsection
