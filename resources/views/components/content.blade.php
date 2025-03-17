@props(['title'])

<div>
    <div>
        <span class="font-bold text-xl">{{ $title }}</span>
    </div>

    <div>
        {{ $slot }}
    </div>
</div>
