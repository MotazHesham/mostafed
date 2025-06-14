<div class="form-group mb-3 {{ $grid ?? '' }}">
    <label class="mb-2 form-label" for="{{ $name }}">
        {{ trans($label) }}
        @if ($isRequired)
            <span class="text-danger">*</span>
        @endif
    </label>
    <select class="form-select {{ $errors->has($name) ? ' is-invalid' : '' }}" 
        aria-label="Default select example" name="{{ $name }}" id="{{ $id ?? $name }}"
        @if ($isRequired) required @endif>
        @foreach ($options as $rawId => $entry)
            <option value="{{ $rawId }}"
                {{ (old($name) ? old($name) : (isset($value) ? $value : '')) == $rawId ? 'selected' : '' }}>
                {{ $entry }}</option>
        @endforeach
    </select> 
    @if ($errors->has($name))
        <span class="text-danger">
            {{ $errors->first($name) }}
        </span>
    @endif 
    @if (isset($helperBlock))
        <span class="help-block">{{ trans($helperBlock) }}</span>
    @else
        <span class="help-block">{{ trans($label . '_helper') }}</span>
    @endif
</div>
@isset ($search)
    @section('scripts')
        @parent
        <script>
            new Choices(document.getElementById('{{ $id ?? $name }}'), {
                allowHTML: true,
                shouldSort: false,
                placeholderValue: "{{ trans($label) }}",
                searchPlaceholderValue: "{{ trans('global.search') }}",
            });
        </script>
    @endsection
@endisset
