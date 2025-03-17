@props(['iconClass', 'title', 'content', 'route'])

<div class="col-md-6 col-lg-4">
    <div class="sbox-4 icon-sm">
        <a href="{{ $route }}">

            <!-- Icon -->
            <div class="sbox-4-icon grey-color">
                <i class="{{ $iconClass }} fa-3x"></i>
            </div>
            <!-- Text -->
            <div class="sbox-4-txt">
                <h5 class="h5-md">{{ $title }}</h5>
                <p>{{ $content }}</p>
            </div>
        </a>
    </div>
</div>
