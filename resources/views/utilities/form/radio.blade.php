<div class="form-group mb-3 {{ $grid ?? '' }}">
    <label class="form-label" for="{{ $name }}">
        {{ trans($label) }}
        @if ($isRequired)
            <span class="text-danger">*</span>
        @endif
    </label>
    @foreach ($options as $key => $option)
        <div class="form-check {{ $errors->has($name) ? 'is-invalid' : '' }}">
            <input class="form-check-input" type="radio" id="{{ $name }}_{{ $key }}"
                name="{{ $name }}" value="{{ $key }}"
                {{ old($name, $value) === (string) $key ? 'checked' : '' }} required>
            <label class="form-check-label" for="{{ $name }}_{{ $key }}">{{ $option }}</label>
        </div>
    @endforeach
    @if ($errors->has($name))
        <div class="invalid-feedback">
            {{ $errors->first($name) }}
        </div>
    @endif
    <span class="help-block">{{ trans($label . '_helper') }}</span>
</div>
