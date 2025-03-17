@props(['destinations', 'title' => 'Packages'])
{{-- <section class="package-section py-5" style="background-color: #F1F5F7">
    <div class="container">
        <div class="mb-3 text-center">
            <div class="row d-flex justify-content-between">

                <h5 class="dash-style">EXPLORE GREAT PACKAGES</h5>
                <div>
                    <p style="font-size: 30px; font-weight: 600; position: relative;" class="mb-0">
                        {{ $title }}
<span
    style="position: absolute; bottom: 0px;left: 0; width: 50%; height: 3px; background-color: #CB9331;"></span>
</p>
</div>
<div>
    <a href="{{ route('page.all-destinations') }}" class="btn view-all-btn">
        VIEW ALL PACKAGES
        <i class="fa fa-chevron-right" aria-hidden="true"></i>
    </a>
</div>
</div>
</div>
<div class="px-2">
    <div class="row ">
        <div id="carouselExampleIndicators" class="carousel slide w-100" data-ride="carousel">
            <!-- Indicators -->
            <!-- Carousel Items -->
            <div class="carousel-inner">
                @forelse ($destinations as $index=>$item)
                <div
                    class="carousel-item @if ($index == 0) active @endif position-relative">
                    @if (isset($item->image))
                    <img src="{{ asset($item->image) }}" class="w-100 zoom-hover"
                        alt="{{ $item->name }}" style="object-fit: cover; height: 440px;">
                    <div class="carousel-overlay"></div>
                    @else
                    <img src="https://via.placeholder.com/1200x500?text=Annapurna+Region"
                        class="d-block w-100 zoom-hover" style="object-fit: contain;"
                        alt="Annapurna Region">
                    <div class="carousel-overlay"></div>
                    @endif
                    <div class="carousel-caption">
                        <h2 class="carousel-caption text-white">{{ $item->name }}</h2>
                    </div>
                </div>

                @empty
                @endforelse

            </div>

            <!-- Controls -->
        </div>
    </div>
    <div class="row mt-3 pb-4 d-flex justify-content-center ">

        <a class=" btn btn-primary mx-2 d-flex align-items-center text-sm" href="#carouselExampleIndicators"
            role="button" data-slide="prev">
            <i class="fa fa-chevron-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a class=" btn btn-primary mx-2 d-flex align-items-center text-sm" href="#carouselExampleIndicators"
            role="button" data-slide="next">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
</div>
</section> --}}

@php
$count = count($destinations);
@endphp
@if ($count > 0)
<section class="destination-section py-5">
    <div class="container">
        <div class="section-heading">
            <div class="row d-flex justify-content-between align-items-end">
                <div>
                    <p class="mb-0 section-title position-relative">
                        {{ $title }}
                        <span
                            style="position: absolute; bottom: -5px;left: 0; width: 50%; height: 3px; background-color: #CB9331;"></span>
                    </p>
                </div>
                <div>
                    <a href="{{ route('page.all-destinations') }}" class="btn view-all-btn">
                        VIEW ALL PACKAGES
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="destination-inner destination-three-column">
            <div class="row">

                @forelse ($destinations as $index=>$item)
                @if ($index == 4)
                @break
                @endif
                <div class="col-lg-3 col-md-6">
                    <div class="desti-item overlay-desti-item">
                        @isset($item->thumbnail)
                        <a href="{{ route('page.destination', $item->slug) }}">
                            <figure class="desti-image">
                                <img src="{{ asset($item->thumbnail) }}" alt=""
                                    style="object-fit: cover; height: 555px;">
                            </figure>
                        </a>
                        @endisset
                        <div class="meta-cat bg-meta-cat">
                            <a href="{{ route('page.destination', $item->slug) }}">{{ $item->name }}</a>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse


            </div>
            <div class="btn-wrap text-center mobile-view-all-btn">
                <a href="{{ route('page.all-destinations') }}" class="button-primary">VIEW ALL DESTINATION</a>
            </div>
        </div>
    </div>
</section>
@endif