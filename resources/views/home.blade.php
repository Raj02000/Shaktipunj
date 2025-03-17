@extends('layouts.main')

@section('content')
<main id="content" class="site-main home" style="font-size: 1rem;line-height: 1.8;">
    <!-- Home slider html start -->
    <section class="home-slider-section">
        <div class="home-slider">
            @foreach ($banners as $banner)
            <div class="home-banner-items">
                <div class="banner-inner-wrap" style="background-image: url({{ $banner['image'] }});">
                </div>
                <div class="banner-content-wrap">
                    <div class="container">
                        <div class="banner-content text-center">
                            <h2 class="banner-title">{{ $banner['title'] }}</h2>
                            <p>{{ $banner['description'] }}</p>
                            @isset($banner->extra['redirect_url'])
                            <a href="{{ $banner->extra['redirect_url'] }}" class="button-primary rounded"
                                style="background: #CB9331">{{ $banner->extra['button_label'] }}</a>
                            @endisset
                        </div>
                    </div>
                </div>
                <div class="overlay"></div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- slider html start -->
    <!-- Home search field html start -->
    <div class="trip-search-section shape-search-section pb-5">
        {{-- <div class="w-100 d-flex align-items-center"
                style="height: 150px; background-color: #37517E; background: url({{ asset('images/trekkeres-shape.png') }}) right bottom -1px / 65% no-repeat #1d2532;">
        <div class="container">
            <span class="text-white">Best offer, Everest Best Camp Trek</span>
        </div>
    </div> --}}
    {{-- <x-breadcrumb title="Best offer, Everest Best Camp Trek" /> --}}
    {{-- <div class="container">
                <div class="trip-search-inner white-bg d-flex">
                    <div class="input-group">
                        <label> Search Destination* </label>
                        <input type="text" name="s" placeholder="Enter Destination">
                    </div>
                    <div class="input-group">
                        <label> Pax Number* </label>
                        <input type="text" name="s" placeholder="No.of People">
                    </div>
                    <div class="input-group width-col-3">
                        <label> Checkin Date* </label>
                        <i class="far fa-calendar"></i>
                        <input class="input-date-picker" type="text" name="s" placeholder="MM / DD / YY"
                            autocomplete="off" readonly="readonly">
                    </div>
                    <div class="input-group width-col-3">
                        <label> Checkout Date* </label>
                        <i class="far fa-calendar"></i>
                        <input class="input-date-picker" type="text" name="s" placeholder="MM / DD / YY"
                            autocomplete="off" readonly="readonly">
                    </div>
                    <div class="input-group width-col-3">
                        <label class="screen-reader-text"> Search </label>
                        <input type="submit" name="travel-search" value="INQUIRE NOW">
                    </div>
                </div>
            </div> --}}
    </div>
    <!-- Home packages section html start -->
    @isset($bestSellerPackages)
    <x-home.packages-section :packages="$bestSellerPackages->packages" :category="$bestSellerPackages" />
    @endisset
    <!-- packages html end -->
    <!-- search search field html end -->
    <x-home.destination-section :destinations="$destinations" />

    @isset($trendingPackages)
    <div class="mt-5">
        <x-home.packages-section :packages="$trendingPackages->packages" :category="$trendingPackages" />
    </div>
    @endisset

    @isset($categories)
    @foreach ($categories as $category)
    <div class="mt-5">
        <x-home.packages-section :packages="$category->packages" :category="$category" />
    </div>
    @endforeach
    @endisset


    <!-- callback html end -->
    <!-- Home activity section html start -->
    {{-- <section class="mt-5">
            <div class="container">
                <div class="section-heading text-center">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <h5 class="dash-style">TRAVEL BY ACTIVITY</h5>
                            <h2>ADVENTURE & ACTIVITY</h2>
                        </div>
                    </div>
                </div>
                <div class="activity-inner row">
                    @forelse ($activities as $item)
                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <a href="{{ $item->url }}">
    <div class="activity-item">
        <div class="activity-icon">
            @isset($item->logo)
            <img src="{{ asset($item->logo) }}" alt="{{ $item->name }}"
                style="object-fit:contain;aspect-ratio: 16 / 9;">
            @endisset
        </div>
        <div class="activity-content">
            <p style="font-size:1.1rem; font-weight: 500;color:#535353">
                {{ $item->name }}
            </p>
        </div>
    </div>
    </a>
    </div>

    @empty
    @endforelse
    </div>
    </div>
    </section> --}}
    <!-- activity html end -->

    <!-- Home blog section html start -->
    <x-home.blog-section :blogs="$blogs" />
    <!-- best html end -->
    <!-- Home client section html start -->
    @if (isset($partners[0]))
    <div class="client-section  mt-5">
        <div class="container">
            <div class="row d-flex justify-content-center section-heading mb-0 ">
                <p class="text-center font-weight-bold h4 section-category">OUR PARTNERS</p>
            </div>

            <div class="activity-inner row">
                @forelse ($partners as $partner)
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="activity-item">
                        <div class="activity-icon">
                            <a href="javascript::void(0)">
                                @isset($partner->logo)
                                <img src="{{ asset($partner->logo) }}" alt="{{ $partner->name }}"
                                    style="object-fit:contain;aspect-ratio: 16 / 9;">
                                @endisset
                            </a>
                        </div>
                        <div class="activity-content">
                            <p style="font-size:1.1rem; font-weight: 500;color:#535353">
                                {{ $partner->name }}
                            </p>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
    @endif

</main>
@stop


{{-- @section('scripts')
<script>

        $(document).ready(function() {
            $('.home-slider').slick({
                dots: true, // Enable navigation dots
                arrows: true, // Enable next/prev arrows
                autoplay: true, // Enable autoplay
                autoplaySpeed: 3000, // Set interval to 3 seconds
                infinite: true, // Loop through slides
                slidesToShow: 1, // Show one slide at a time
                slidesToScroll: 1, // Scroll one slide at a time
                fade: true, // Enable fade transition
                cssEase: 'linear' // Smooth fade transition
            });
        });
</script>
@endsection --}}