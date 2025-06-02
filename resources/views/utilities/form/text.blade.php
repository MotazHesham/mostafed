<div class="form-group mb-3">
    <label class="form-label {{ $isRequired ? 'required' : '' }}" for="{{ $name }}">{{ trans($label) }}</label>
    <input class="form-control rounded-pill {{ $errors->has($name) ? 'is-invalid' : '' }}"
        type="text" 
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, '') }}" 
        @if ($isRequired) required @endif>
    @if ($errors->has($name))
        <div class="invalid-feedback">
            {{ $errors->first($name) }}
        </div>
    @endif
    <span class="help-block">{{ trans($label . '_helper') }}</span>
</div>
