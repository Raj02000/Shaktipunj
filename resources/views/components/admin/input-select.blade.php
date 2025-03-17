@props(['name', 'label' => null, 'values', 'displayColumn' => 'name', 'oldvalue' => null, 'multiple' => false])

<div {{ $attributes->merge(['class' => 'form-group mt-3']) }}>
    @isset($label)
        <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    @endisset
    <select name="{{ $multiple ? $name . '[]' : $name }}" id="{{ $name }}"
        @if ($multiple) multiple @endif class="form-select">
        <option value="" @if (!$oldvalue && !old($name)) selected @endif>Select...</option>
        @if (!empty(trim($slot)))
            {{ $slot }}
        @endif
        @foreach ($values as $value)
            <option value="{{ $value->id }}"
                @if ($multiple && in_array($value->id, (array) old($name, $oldvalue))) selected
                @elseif (!$multiple && $value->id == old($name, $oldvalue)) selected @endif>
                {{ $value->$displayColumn ?? 'N/A' }}
            </option>
        @endforeach
    </select>
    @if ($errors->has(str_replace(['[', ']'], ['.', ''], $name)))
        <div class="form-text text-danger">
            {{ $errors->first(str_replace(['[', ']'], ['.', ''], $name)) }}
        </div>
    @endif
</div>
