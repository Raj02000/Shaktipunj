@props([
    'name',
    'type' => 'text',
    'placeholder' => null,
    'oldvalue' => null,
    'label' => null,
    'pattern' => null,
    'required' => false,
    'multiple'=>false
])
<div {{ $attributes->merge(['class' => 'mt-2 form-group mb-3']) }}>
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input
        {{ $attributes->merge([
            'type' => $type,
            'name' => $name,
            'placeholder' => $placeholder,
            'id' => $name,
            'value' => old($name, $oldvalue),
            'class' => 'form-control',
            'aria-describedby' => 'defaultFormControlHelp',
        ]) }}
        @if ($required) required @endif @if($multiple) multiple @endif>
    @error($name)
        <div class="form-text text-danger">
            {{ $message }}
        </div>
    @enderror
</div>
