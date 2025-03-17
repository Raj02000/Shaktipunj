@props(['path', 'alt' => '', 'height' => 45, 'width' => 45])

<div class="image-container" style='{{ "height: {$height}px; width: {$width}px;" }}'>
    <img src="{{ asset($path) }}" :alt="$alt" style="height: 100%; width: 100%; object-fit: cover">
</div>
