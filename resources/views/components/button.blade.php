@props([
    'type' => 'button',
    'variant' => 'primary',
    'size' => 'md',
    'label' => 'Button',
    'tag' => 'button', // Default to button; can be 'a'
    'route' => '#',
])

@if ($tag === 'a')
    <a
        {{ $attributes->merge([
            'class' => "btn btn-sm mb-sm-1 btn-$variant btn-$size",
            'href' => $route, // Provide a default href if not set
        ]) }}>
        {{ $label }}
    </a>
@else
    <button type="{{ $type }}"
        {{ $attributes->merge([
            'class' => "btn btn-sm mb-sm-1 btn-$variant btn-$size",
        ]) }}>
        {{ $label }}
    </button>
@endif
