<div class="form-group mb-3">
    <label class="form-label" for="{{ $name }}">
        {{ trans($label) }}
        @if ($isRequired)
            <span class="text-danger">*</span>
        @endif
    </label>
    <input class="form-control rounded-pill {{ $errors->has($name) ? 'is-invalid' : '' }}"
        type="{{ $type ?? 'text' }}" 
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, isset($value) ? $value : '') }}" 
        @if ($isRequired) required @endif>
    @if ($errors->has($name))
        <div class="invalid-feedback">
            {{ $errors->first($name) }}
        </div>
    @endif
    <span class="help-block">{{ trans($label . '_helper') }}</span>
</div>
