<div class="form-group mb-3">
    <label class="mb-2" for="{{ $name }}">
        {{ trans($label) }}
        @if ($isRequired)
            <span class="text-danger">*</span>
        @endif
    </label>
    <select class="form-select rounded-pill {{ $errors->has($name) ? ' is-invalid' : '' }}" data-trigger
        aria-label="Default select example" name="{{ $name }}" id="{{ $name }}"
        @if ($isRequired) required @endif>
        @foreach ($options as $id => $entry)
            <option value="{{ $id }}"
                {{ (old($name) ? old($name) : (isset($value) ? $value : '')) == $id ? 'selected' : '' }}>
                {{ $entry }}</option>
        @endforeach
    </select>

    @if ($errors->has($name))
        <span class="text-danger">
            {{ $errors->first($name) }}
        </span>
    @endif


    <span class="help-block">{{ trans($label . '_helper') }}</span>
</div>
