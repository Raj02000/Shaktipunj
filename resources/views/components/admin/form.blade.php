@props(['name', 'label', 'type', 'value', 'required'])
<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="{{ $type }}" class="form-control" id="{{ $name }}" name="{{ $name }}"
        value="{{ $value }}" @isset($required) required @endisset>
</div>
