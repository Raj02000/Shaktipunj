@props(['package', 'title' => 'Best seller', 'noTag' => false])

@php
    $reviews = $package->reviews ?? collect(); // Ensure it's a collection, even if null
$reviewCount = $reviews->count();
$totalRating = $reviews->sum('rating'); // Sum ratings using collection method
    $avgRating = $reviewCount > 0 ? $totalRating / $reviewCount : 0; // Avoid division by zero
@endphp

<div class="package-wrap mr-3 my-4 position-relative">
    <figure class="feature-image">
        <a href="{{ route('page.package.details', $package->slug) }}" style="width: 100%">
            <div class="zoom-hover-wrapper">
                <img src="{{ asset($package->image) }}" alt="{{ $package->name }}" class="w-100 zoom-hover"
                    style="height: 270px; object-fit: cover;">
            </div>
        </a>
    </figure>
    @isset($package->tag?->name)
        <div class="package-price">
            <h6>
                <span>{{ $package->tag->name }}</span>
            </h6>
        </div>
    @endisset
    <div class="border p-3">
        <div class="text-sm">
            <i class="fas fa-map-marker-alt"></i>
            {{ $package->location }}
        </div>
        <div class="my-3">
            <a href="{{ route('page.package.details', $package->slug) }}">
                <h4 class="mb-0" style="font-family: 'poppins'; font-weight: 600;">{{ $package->name }}</h4>
            </a>
            <div>
                <div class="rating-start" title="Rated {{ number_format($avgRating, 1) }} out of 5">
                    <span style="width: {{ ($avgRating / 5) * 100 }}%;"></span> <!-- Dynamic rating width -->
                </div>
                <span class="review-text">{{ $reviewCount }} reviews</span>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <div>
                <i class="fa fa-calendar-alt pr-2"></i> {{ $package->duration }} Days
            </div>

            <div>
                <h4>US${{ $package->price }}</h4>
            </div>
        </div>
    </div>
</div>
