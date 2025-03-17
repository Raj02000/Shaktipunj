@extends('layouts.main')

@section('title', $package->meta_title)

@php
    $breadcrumbs = [];

    $currentDestination = $package['destination'];
    while ($currentDestination) {
        $breadcrumbs[] = [
            'name' => $currentDestination['name'],
            'slug' => $currentDestination['slug'],
        ];
        $currentDestination = $currentDestination['parent'] ?? null;
    }

    $breadcrumbs = array_reverse($breadcrumbs);
@endphp

@section('meta-info')
    <x-meta-info ogUrl="{{ url()->current() }}" :title="$package->meta_title" :description="$package->meta_description" :keywords="$package->meta_keywords" />
@endsection

@section('content')
    <main id="content" class="site-main">
        <!-- Inner Banner html end-->
        <div class="single-tour-section">

            <div class="page-nav w-100  sticky-top" id="pageNav">
                <div class="">
                    <div class="row mx-5 page-nav-container">
                        <a class="page-nav-link text-decoration-none text-center text-white py-2 px-2 col text-uppercase font-weight-bold"
                            href="#overview">Overview</a>
                        @isset($package->itinerary)
                            <a class="page-nav-link text-decoration-none text-center text-white py-2 px-2 col text-uppercase font-weight-bold"
                                href="#itinerary">Itinerary</a>
                        @endisset
                        @isset($package->trip_map)
                            <a class="page-nav-link text-decoration-none text-center text-white py-2 px-2 col text-uppercase font-weight-bold"
                                href="#trip-map">Trip Map</a>
                        @endisset
                        @if ($package->include || $package->exclude)
                            <a class="page-nav-link text-decoration-none text-center text-white py-2 px-2 col text-uppercase font-weight-bold"
                                href="#trip-inclusions">What To
                                Expect</a>
                        @endif
                        @isset($package->cost_dates)
                            <a class="page-nav-link text-decoration-none text-center text-white py-2 px-2 col text-uppercase font-weight-bold"
                                href="#cost-dates">Departures</a>
                        @endisset
                        @isset($package->useful_info)
                            <a class="page-nav-link text-decoration-none text-center text-white py-2 px-2 col text-uppercase font-weight-bold"
                                href="#useful-info">Useful info</a>
                        @endisset
                        @if (!empty($package->extra['video']) && !empty($package->extra['video']['video_link']))
                            <a class="page-nav-link text-decoration-none text-center text-white py-2 px-2 col text-uppercase font-weight-bold"
                                href="#trip-video">Trip Video</a>
                        @endif
                        @if (!empty($package->extra['gallery']))
                            <a class="page-nav-link text-decoration-none text-center text-white py-2 px-2 col text-uppercase font-weight-bold"
                                href="#gallery">Gallery</a>
                        @endif
                        @if (!empty($package->faqs))
                            <a class="page-nav-link text-decoration-none text-center text-white py-2 px-2 col text-uppercase font-weight-bold"
                                href="#faq">FAQs</a>
                        @endif
                        @if (!empty($package->reviews))
                            <a class="page-nav-link text-decoration-none text-center text-white py-2 px-2 col text-uppercase font-weight-bold"
                                href="#reviews">Reviews</a>
                        @endif
                    </div>
                </div>
            </div>



            <div class="banner-wrapper w-100">
                <div class="banner-box d-block w-100  package-banner">
                    @isset($package->image)
                        <img class=" w-100 h-auto start-0 object-fit-cover" src="{{ asset($package->image) }}" alt="" />
                    @endisset
                </div>

            </div>

            {{-- breadcrumbs  --}}
            <div class="w-100 d-flex align-items-center" style="height: 100px; background-color: #37517E;">
                <div class="container">
                    <a class="text-white" href="/">Home</a> <span class="text-white">></span>
                    @foreach ($breadcrumbs as $breadcrumb)
                        <a class="text-white"
                            href="{{ route('page.destination', ['slug' => $breadcrumb['slug']]) }}">{{ $breadcrumb['name'] }}</a>
                        <span class="text-white">></span>
                    @endforeach
                    <a class="text-white"
                        href="{{ route('page.package.details', $package->slug) }}">{{ $package->name }}</a>
                </div>
            </div>

            <div class="container">
                <div class="row mt-5">
                    <div class="package-title d-flex flex-md-row justify-content-md-between flex-column">
                        <p style="font-size: 30px; font-weight: 600;font-family: 'Rubik', sans-serif;"
                            class="mb-0 position-relative ">{{ $package->name }}

                            <span
                                style="position: absolute; bottom: 0px;left: 0; width: 50%; height: 3px; background-color: #CB9331;"></span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row ">
                    <div class="col-lg-8 col-xl-9">
                        <div class="mob-pdf-download">
                            @if (array_key_exists('pdf', $package->extra))
                                <div class="my-4">
                                    <a href="{{ asset($package->extra['pdf']) }}" download="true" class="btn btn-outline"
                                        style="border: 1px solid black;font-size:14px ">
                                        <i class="fa fa-solid fa-download text-primary h6"></i>
                                        <span class="px-3 h6" style="font-weight: 600">
                                            Download PDF
                                        </span>
                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="mt-4 mb-4">
                            @isset($package->extra['short_description'])
                                {!! $package->extra['short_description'] !!}
                            @endisset
                        </div>
                        <section style="background: #1eb4ff10;" class="rounded">
                            <div class="position-relative px-4 py-4" id="metaSection">
                                <!-- Section Heading -->
                                <div class="trip-head row mb-3 ">
                                    <span class="h4 font-weight-bold">At a Glance</span>
                                </div>

                                <!-- Highlights Content -->
                                <div class="row articleSection mt-4 gy-4">
                                    <!-- Destination -->

                                    @isset($package->extra['extra_destination'])
                                        <div class="col-6 col-sm-4 mt-2 col-md-3 d-flex align-items-center">
                                            <img src="{{ asset('icons/location.png') }}" alt="location" class="icon-responsive">
                                            <div class="text-container">
                                                <div class="fw-bold">Destination</div>
                                                <div class="text-primary">
                                                    {{ $package->extra['extra_destination'] ?? 'N/A' }}
                                                </div>
                                            </div>
                                        </div>
                                    @endisset

                                    <!-- Trip Duration -->
                                    @isset($package->duration)
                                        <div class="col-6 col-sm-4 mt-2 col-md-3 d-flex align-items-center">
                                            <img src="{{ asset('icons/event.png') }}" alt="duration" class="icon-responsive">
                                            <div class="text-container">
                                                <div class="fw-bold">Package Duration</div>
                                                <div class="text-primary">
                                                    {{ $package->duration }} Days
                                                </div>
                                            </div>
                                        </div>
                                    @endisset

                                    <!-- Difficulty Level -->
                                    @isset($package->extra['difficulty'])
                                        <div class="col-6 col-sm-4 mt-2 col-md-3 d-flex align-items-center">
                                            <img src="{{ asset('icons/gauge.png') }}" alt="difficulty" class="icon-responsive">
                                            <div class="text-container">
                                                <div class="fw-bold">Difficulty Level</div>
                                                <div class="text-primary">
                                                    {{ $package->extra['difficulty'] }}
                                                </div>
                                            </div>
                                        </div>
                                    @endisset

                                    <!-- Activities -->
                                    @isset($package->extra['activities'])
                                        <div class="col-6 col-sm-4 mt-2 col-md-3 d-flex align-items-center">
                                            <img src="{{ asset('icons/activities.png') }}" alt="activities"
                                                class="icon-responsive">
                                            <div class="text-container">
                                                <div class="fw-bold">Activities</div>
                                                <div class="text-primary">
                                                    {{ $package->extra['activities'] }}
                                                </div>
                                            </div>
                                        </div>
                                    @endisset
                                </div>

                                <!-- Additional Details -->
                                <div class="row mt-2 mt-md-4 gy-4">
                                    @isset($package->extra['accommodation'])
                                        <div class="col-6 col-sm-4 col-md-3  mt-1 d-flex align-items-center">
                                            <img src="{{ asset('icons/sleep.png') }}" alt="accommodation"
                                                class="icon-responsive">
                                            <div class="text-container">
                                                <div class="fw-bold">Accommodation</div>
                                                <div class="text-primary">
                                                    {{ $package->extra['accommodation'] }}
                                                </div>
                                            </div>
                                        </div>
                                    @endisset

                                    @isset($package->extra['season'])
                                        <div class="col-6 col-sm-4 col-md-3  mt-1 d-flex align-items-center">
                                            <img src="{{ asset('icons/database.png') }}" alt="season"
                                                class="icon-responsive">
                                            <div class="text-container">
                                                <div class="fw-bold">Best Season</div>
                                                <div class="text-primary">
                                                    {{ $package->extra['season'] }}
                                                </div>
                                            </div>
                                        </div>
                                    @endisset

                                    @isset($package->extra['meals'])
                                        <div class="col-6 col-sm-4 col-md-3 mt-1 d-flex align-items-center">
                                            <img src="{{ asset('icons/food.png') }}" alt="meals" class="icon-responsive">
                                            <div class="text-container">
                                                <div class="fw-bold">Meals</div>
                                                <div class="text-primary">
                                                    {{ $package->extra['meals'] }}
                                                </div>
                                            </div>
                                        </div>
                                    @endisset

                                    @isset($package->extra['altitude'])
                                        <div class="col-6 col-sm-4 col-md-3  mt-1 d-flex align-items-center">
                                            <img src="{{ asset('icons/mountains.png') }}" alt="altitude"
                                                class="icon-responsive">
                                            <div class="text-container">
                                                <div class="fw-bold">Max Altitude</div>
                                                <div class="text-primary">
                                                    {{ $package->extra['altitude'] }}
                                                </div>
                                            </div>
                                        </div>
                                    @endisset
                                </div>
                            </div>
                        </section>


                        <section class="article w-100 mt-5" id="overview">
                            <div class="trip-head d">
                                <i class="fa fa-solid fa-list h5"></i>
                                <span class="h4 font-weight-bold ml-3">Overview</span>
                            </div>

                            <div class="articleSection mt-4 text-justify" style="text-align: justify">
                                {!! $package->overview !!}
                            </div>
                        </section>

                        @if (!empty($package->itinerary))
                            <section class="itinerary w-100 mt-5" id="itinerary">
                                <div class="itinerary-head d-flex justify-content-between">
                                    <div class="trip-head ">
                                        <i class="fa fa-solid fa-map-pin h5"></i>
                                        <span class="h4 font-weight-bold ml-3">Itinerary</span>
                                    </div>

                                    <div class="button">
                                        <button class="py-2 px-4 text-white" data-toggle="collapse"
                                            data-target=".multi-collapse" aria-expanded="false"
                                            aria-controls="@forelse ($package->itinerary as $index => $item) itinerary{{ $index + 1 }}
                                                        @empty @endforelse"
                                            style="
                                                            background-color: #37517e;
                                                            border-radius: 20px;
                                                            border: none;
                                                        ">
                                            Expand All
                                        </button>
                                    </div>
                                </div>
                                <div class="itinerary-content mt-4">
                                    @forelse ($package->itinerary as $index => $item)
                                        <div class="content-info mb-4">
                                            <button
                                                class="w-100 btn itineray-btn  d-flex align-items-center justify-content-between"
                                                type="button" data-toggle="collapse"
                                                data-target="#itinerary{{ $index + 1 }}" aria-expanded="false"
                                                aria-controls="itinerary{{ $index + 1 }}">

                                                <div class="ms-3 mb-0 font-weight-bold">
                                                    <span
                                                        class="text-primary font-weight-bold m-0">{{ $item['question'] }}:</span>
                                                    {{ $item['answer'] }}
                                                </div>
                                                <span
                                                    class="btn rounded-circle d-flex align-items-center justify-content-center"
                                                    style="font-size: 12px; width: 25px; height: 25px; padding: 0; border: 1px solid #dee2e6;">
                                                    <i class="fa fa-solid fa-chevron-down toggle-icon"></i>
                                                </span>
                                            </button>
                                            <div class="collapse multi-collapse ms-lg px-2 mt-3"
                                                id="itinerary{{ $index + 1 }}">

                                                <div class="d-flex flex-wrap" style="font-size: 0.85rem;">
                                                    @isset($item['iti_max_elevation'])
                                                        <div style="margin-right: 1rem;">
                                                            <i class="fa fa-solid fa-mountain text-primary"></i>
                                                            <span class="text-muted" style="font-size: 0.85rem;">Max
                                                                Elevation:
                                                            </span>
                                                            <span class="text-dark"
                                                                style="font-weight: 600; font-size: 0.85rem;">
                                                                {{ $item['iti_max_elevation'] }}
                                                            </span>
                                                        </div>
                                                    @endisset
                                                    @isset($item['iti_duration'])
                                                        <div style="margin-right: 1rem;">
                                                            <i class="fa fa-regular fa-clock text-primary"></i>
                                                            <span class="text-muted"
                                                                style="font-size: 0.85rem;">Duration:</span>
                                                            <span class="text-dark"
                                                                style="font-weight: 600; font-size: 0.85rem;">

                                                                {{ $item['iti_duration'] }}
                                                            </span>
                                                        </div>
                                                    @endisset
                                                    @isset($item['iti_hike_distance'])
                                                        <div style="margin-right: 1rem;">
                                                            <i class="fas fa-walking fa-lg text-primary"></i>
                                                            <span class="text-muted"
                                                                style=" font-size: 0.85rem;">Distance:</span>
                                                            <span class="text-dark"
                                                                style="font-weight: 600; font-size: 0.85rem;">
                                                                {{ $item['iti_hike_distance'] }}
                                                            </span>
                                                        </div>
                                                    @endisset
                                                </div>
                                                <p class=" " id="itinerary{{ $index + 1 }}">
                                                    {!! $item['description'] !!}
                                                </p>

                                                <div class="d-flex flex-wrap" style="font-size: 0.85rem;">
                                                    @isset($item['iti_acc_type'])
                                                        <div style="margin-right: 1rem;">
                                                            <i class="fa fa-solid fa-bed text-primary"></i>
                                                            <span class="text-muted"
                                                                style=" font-size: 0.85rem;">Accommodation:</span>
                                                            <span class="text-dark"
                                                                style="font-weight: 600; font-size: 0.85rem;">
                                                                {{ $item['iti_acc_type'] }}
                                                            </span>
                                                        </div>
                                                    @endisset
                                                    @isset($item['iti_meals'])
                                                        <div style="margin-right: 1rem;">
                                                            <i class="fas fa-utensils text-primary"></i>
                                                            <span class="text-muted" style="; font-size: 0.85rem;">Meals:
                                                            </span>
                                                            <span class="text-dark"
                                                                style="font-weight: 600; font-size: 0.85rem;">
                                                                {{ $item['iti_meals'] }}
                                                            </span>
                                                        </div>
                                                    @endisset

                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse

                                </div>
                            </section>
                        @endif

                        @isset($package->trip_map)
                            <section class="Trip-map mt-5" id="trip-map">
                                <div class="trip-head d">
                                    <i class="fa fa-solid fa-map h5"></i>
                                    <span class="h4 font-weight-bold ml-3">Package Map</span>
                                </div>
                                <div class="map-box w-100 position-relative p-0 mt-3"
                                    style="height: 450px; overflow-y: scroll">
                                    <a href="{{ asset($package->trip_map) }}" data-fancybox="trip-map"
                                        data-caption="Trip Route">
                                        <img id="mapImage" class="position-absolute w-100 h-auto"
                                            src="{{ asset($package->trip_map) }}" alt="route image"
                                            style="object-fit: contain; cursor: pointer;" />
                                    </a>
                                </div>
                            </section>
                        @endisset

                        @if (isset($package->include) || isset($package->exclude))
                            <section class="FAQs mt-5" id="trip-inclusions">
                                <h2 class="h4 font-weight-bold">
                                    <i class="fa fa-solid fa-handshake ms-3"></i>
                                    Package Inclusions
                                </h2>
                                <div class="FAQs-accordion accordion" id="tripInclusionsAccordion">
                                    <!-- Includes Button -->
                                    <button data-toggle="collapse" data-target="#inclusion" aria-expanded="true"
                                        aria-controls="inclusion" style="border-radius:50px !important;"
                                        class="text-decoration-none btn tripInclusionBtn mx-2 inclusion-btn">
                                        <span class="d-flex align-items-center justify-content-between">
                                            <span>Includes</span>
                                        </span>
                                    </button>
                                    <!-- Excludes Button -->
                                    <button data-toggle="collapse" data-target="#excludes" aria-expanded="false"
                                        aria-controls="excludes" style="border-radius:50px !important;"
                                        class="text-decoration-none btn tripInclusionBtn mx-2 excludes-btn">
                                        <span class="d-flex align-items-center justify-content-between">
                                            <span>Excludes</span>
                                        </span>
                                    </button>
                                    <!-- Card Section -->
                                    <div class="Card py-0 mt-4 px-3">
                                        <!-- Includes Section -->
                                        <div class="collapse show" id="inclusion" data-parent="#tripInclusionsAccordion">
                                            {!! $package->include !!}
                                        </div>
                                        <!-- Excludes Section -->
                                        <div class="collapse" id="excludes" data-parent="#tripInclusionsAccordion">
                                            {!! $package->exclude !!}
                                        </div>
                                    </div>
                                </div>
                            </section>
                        @endif


                        @isset($package->cost_dates)
                            <section class="FAQs mt-5" id="cost-dates">
                                <h2 class="h4 font-weight-bold">
                                    <i class="fa fa-regular fa-dollar-sign h5 "></i>
                                    <span class="h4 font-weight-bold ml-3">Departure dates</span>
                                </h2>
                                <div class="border border-1 rounded-1 p-3">

                                    <div class="row border-bottom py-2">
                                        <div class="col-2">
                                            <strong class='fs-6'>Start Date</strong>
                                        </div>
                                        <div class="col-3">
                                            <strong class='fs-6'>End Date</strong>
                                        </div>
                                        <div class="col-3">
                                            <strong class='fs-6'>Price</strong>
                                        </div>
                                        <div class="col-2">
                                            <strong class='fs-6'>Status</strong>
                                        </div>
                                        <div class="col-2">
                                        </div>
                                    </div>

                                    @php
                                        $count = 0;
                                    @endphp
                                    @foreach ($package->cost_dates as $index => $item)
                                        @if (isset($item['start_date']) && strtotime($item['start_date']) > time())
                                            <div class="row py-3">
                                                <div class="col-2">
                                                    <span>{{ date('d M, Y', strtotime($item['start_date'])) }}</span>
                                                </div>
                                                <div class="col-3">
                                                    <span>{{ date('d M, Y', strtotime($item['end_date'])) }}</span>
                                                </div>
                                                <div class="col-3">
                                                    <span>US$ {{ $item['package_price'] }}</span>
                                                </div>
                                                <div class="col-2">
                                                    <span class="text-success">Available</span>
                                                </div>
                                                <div class="col-2">
                                                    <form action="{{ route('book.form') }}" method="get">
                                                        <input type="hidden" name="package_id" value="{{ $package->id }}">
                                                        <input type="hidden" name="date"
                                                            value="{{ $item['start_date'] }}">
                                                        <button type="submit" class="btn book-btn" style="">Book
                                                            Now</button>
                                                    </form>
                                                </div>
                                            </div>
                                            @php
                                                $count++;
                                            @endphp
                                        @endif
                                    @endforeach
                                    @if ($count == 0)
                                        <div class="row p-3">
                                            <div class="col-12">
                                                <h4 class="text-info">No available dates</h4>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </section>
                        @endisset

                        @isset($package->cost_dates)
                            <section class="FAQs mt-5" id="cost-dates-mobile">
                                <h2 class="h4 font-weight-bold">
                                    <i class="fa fa-regular fa-dollar-sign h5 "></i>
                                    <span class="h4 font-weight-bold ml-3">Departure dates</span>
                                </h2>
                                <div class="border border-1 rounded-1 p-3">
                                    @php
                                        $count = 0;
                                    @endphp
                                    @foreach ($package->cost_dates as $index => $item)
                                        @if (isset($item['start_date']) && strtotime($item['start_date']) > time())
                                            <div class="row py-3">
                                                <div class="col-8">
                                                    <div class="row">
                                                        <span class="col-4 font-weight-medium">From</span>
                                                        <span class="col-8 ">
                                                            {{ date('d M, Y', strtotime($item['start_date'])) }}
                                                        </span>
                                                    </div>
                                                    <div class="row">
                                                        <span class="col-4 font-weight-medium">
                                                            To
                                                        </span>
                                                        <span class="col-8 ">
                                                            {{ date('d M, Y', strtotime($item['end_date'])) }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <span class="font-weight-bold">US$ {{ $item['package_price'] }}</span>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <form action="{{ route('book.form') }}" class="px-4 text-center"
                                                        method="get">
                                                        <input type="hidden" name="package_id" value="{{ $package->id }}">
                                                        <input type="hidden" name="date"
                                                            value="{{ $item['start_date'] }}">
                                                        <button type="submit" class="px-5   btn book-btn"
                                                            style="">Book
                                                            Now</button>
                                                    </form>
                                                </div>
                                            </div>
                                            @php
                                                $count++;
                                            @endphp
                                        @endif
                                    @endforeach
                                    @if ($count == 0)
                                        <div class="row p-3">
                                            <div class="col-12">
                                                <h4 class="text-info">No available dates</h4>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </section>
                        @endisset

                        @isset($package->useful_info)
                            <section class="article w-100 mt-5" id="useful-info">
                                <div class="trip-head d">
                                    <i class="fa fa-solid fa-list h5"></i>
                                    <span class="h4 font-weight-bold ml-3">Useful Informations</span>
                                </div>

                                <div class="articleSection mt-4 text-justify" style="text-align: justify">
                                    {!! $package->useful_info !!}
                                </div>
                            </section>
                        @endisset

                        @if (!empty($package->extra['video']) && !empty($package->extra['video']['video_link']))
                            <section class="mt-5" id="trip-video">
                                <div class="trip-head d">
                                    <i class="fa fa-regular fa-video h5"></i>
                                    <span class="h4 font-weight-bold ml-3">Trip Video</span>
                                </div>
                                <div>
                                    <iframe class="mt-4 tripVideo" src="{{ $package->extra['video']['video_link'] }}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe>
                                </div>
                                @isset($package->extra['video']['video_description'])
                                    <p class="mt-4">
                                        {!! $package->extra['video']['video_description'] !!}
                                    </p>
                                @endisset
                            </section>
                        @endif
                        @if (!empty($package->extra['gallery']))
                            <section class="mt-5" id="gallery">
                                <h2 class="h4 font-weight-bold">
                                    <i class="fa fa-regular fa-image h5"></i>
                                    <span class="h4 font-weight-bold ml-3">Gallery</span>
                                </h2>
                                <div>
                                    @foreach ($package->extra['gallery'] as $index => $item)
                                        @php
                                            $name = str_replace('storage/', '', $item);
                                        @endphp
                                        <a href="{{ asset($item) }}" data-fancybox="gallery" data-caption="">
                                            <img src="{{ asset($item) }}" alt="{{ $name }}"
                                                class="gallery-image m-3" style="cursor: pointer; max-width: 350px;">
                                        </a>
                                    @endforeach
                                </div>
                            </section>
                        @endif

                        @if (!empty($package->faqs))
                            <section class="FAQs mt-5" id="faq">
                                <h2 class="h4 font-weight-bold">
                                    <i class="fa fa-solid fa-question h5 "></i>
                                    <span class="h4 font-weight-bold ml-3">FAQs</span>
                                </h2>
                                <div class="FAQs-accordion">
                                    @forelse ($package->faqs as $index => $item)
                                        <div class="Card  py-0 mb-3">
                                            <div class="card-header py-0 " style="background-color: #37517e">
                                                <button data-toggle="collapse" data-toggle="collapse"
                                                    data-target="#faq{{ $index + 1 }}" aria-expanded="false"
                                                    aria-controls="faq{{ $index + 1 }}" href=""
                                                    class="text-decoration-none btn text-white w-100">
                                                    <span class="d-flex align-items-center justify-content-between">

                                                        <span>{{ $item['question'] }}</span>
                                                        <i class="fa fa-solid fa-chevron-down faq-toggle-icon"></i>
                                                    </span>

                                                </button>
                                            </div>
                                            <div class="collapse mt-2 mb-3" id="faq{{ $index + 1 }}">
                                                {!! $item['answer'] !!}
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </section>
                        @endif

                        <section id='reviews' class="mt-5">
                            <h2 class="h4 font-weight-bold">
                                <i class="fa fa-regular fa-comment h5 "></i>
                                <span class="h4 font-weight-bold ml-3">Reviews</span>
                            </h2>
                            <x-review :reviews="$package->reviews" />
                        </section>
                        <x-review-form :package="$package" />
                    </div>


                    <div class="col-lg-4 col-xl-3 mt-lg-0 mt-5 ">
                        <div class="booking-module mt-4">

                            @if (array_key_exists('pdf', $package->extra) && isset($package->extra['pdf']))
                                <div class="mb-2">
                                    <a href="{{ asset($package->extra['pdf']) }}" download target="_blank"
                                        class="btn btn-outline d-block w-100 py-4"
                                        style="border: 1px solid rgb(37, 63, 123);">
                                        <i class="fa fa-solid fa-download text-primary h4"></i>
                                        <span class="px-3 h4 " style="font-weight: 600">
                                            Download PDF
                                        </span>
                                    </a>
                                </div>
                            @endif

                            <div class="booking-module-card w-100 pt-3 pb-3 rounded-1">
                                <div class="trip-price mx-3 d-flex flex-row align-items-center">
                                    <div class="price-wrapper py-2">
                                        <strong class="d-block h4 text-white">Book Now!</strong>
                                    </div>
                                </div>

                                <div class="group-price bg-white mx-3 pt-1 ">
                                    <div class="dropdown " name="group_price" id="group-price">
                                        <button class="btn border border-1 rounded dropdown-toggle w-100" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Group Price
                                        </button>
                                        <div class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                                            <p class="dropdown-item">
                                                <span class="d-flex justify-content-between font-weight-semibold">
                                                    <span>No. of People</span>
                                                    <span>Price</span>
                                                </span>
                                            </p>
                                            @php
                                                $prev = null; // Initialize previous range start as null
                                                $personRanges = array_column(
                                                    $package->extra['package_costs'],
                                                    'person_range',
                                                );

                                                // Get minimum and maximum values
                                                $minRange = min($personRanges);
                                                $maxRange = max($personRanges);

                                                $minItem = null;
                                                $maxItem = null;

                                                // Iterate through the package costs to find min and max
                                                foreach ($package->extra['package_costs'] as $item) {
                                                    // Check for min
                                                    if (
                                                        $minItem === null ||
                                                        (int) $item['person_range'] < (int) $minItem['person_range']
                                                    ) {
                                                        $minItem = $item;
                                                    }

                                                    // Check for max
                                                    if (
                                                        $maxItem === null ||
                                                        (int) $item['person_range'] > (int) $maxItem['person_range']
                                                    ) {
                                                        $maxItem = $item;
                                                    }
                                                }
                                            @endphp

                                            @forelse ($package->extra['package_costs'] as $key => $item)
                                                @php
                                                    $current = $item['person_range'];
                                                    if ($item['usd_amount'] > 0) {
                                                        $itemPrice = 'US $' . $item['usd_amount'];
                                                        $price = $item['usd_amount'];
                                                    } elseif ($item['npr_amount'] > 0) {
                                                        $itemPrice = 'NPR ' . $item['npr_amount'];
                                                        $price = $item['npr_amount'];
                                                    } elseif ($item['inr_amount'] > 0) {
                                                        $itemPrice = 'INR ' . $item['inr_amount'];
                                                        $price = $item['inr_amount'];
                                                    }
                                                @endphp
                                                <p class="dropdown-item d-flex justify-content-between">
                                                    <span> {{ $prev ?? 1 }} - {{ $current }}</span>
                                                    <span>
                                                        @if (isset($itemPrice))
                                                            {{ $itemPrice }}
                                                        @else
                                                            N/A
                                                        @endif
                                                    </span>
                                                </p>


                                                @php
                                                    $prev = $current + 1;
                                                @endphp
                                            @empty
                                                <p>Not Available!</p>
                                            @endforelse
                                        </div>
                                    </div>

                                </div>
                                <!-- Form -->
                                <form action="{{ route('book.form') }}" method="get"
                                    class="mt-2 mx-3 rounded bg-white" style="padding: 14px">
                                    @csrf
                                    <div class=" formContent-wrapper ">
                                        <div class="date">
                                            <label for="" class="fs-6" style="color: #37517e">Pick Your
                                                Date</label>
                                            <div class="Content">
                                                <i class="fa-solid fa-calendar-days fs-3"></i>
                                                <input type="date" class="custom-date-input"
                                                    value="{{ $package->cost_dates[0]['start_date'] }}" name="date"
                                                    min="{{ now()->format('Y-m-d') }}" id="package-date">
                                            </div>
                                        </div>
                                        <input type="hidden" name="package_id" value="{{ $package->id }}">
                                        <div class="price-calculator mt-3">
                                            <div class="content-title">
                                                <label for="" class="fs-6 fw-normal"
                                                    style="color: #37517e">Number of
                                                    Guests</label>
                                            </div>
                                            <div class="people-calculation">
                                                <div class="increment-decrement position-relative" style="padding: 2px;">
                                                    <input class="form-input" style="border:none" type="number"
                                                        name="guest" id="guest-count"
                                                        max="{{ $maxItem['person_range'] }}"
                                                        min="{{ $minItem['person_range'] }}"
                                                        value="{{ $minItem['person_range'] }}" readonly />

                                                    <div class="handler px-2">
                                                        <span class="increment plus-minus-btn" style="cursor: pointer;"><i
                                                                class="fa fa-solid fa-plus"></i></span>
                                                        <span class="decrement plus-minus-btn" style="cursor: pointer;"><i
                                                                class="fa fa-solid fa-minus"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="costing mt-2 w-100">
                                            <div class="costItem d-flex justify-content-between" style="color: #37517e">
                                                <span id="cost-per-guest">US
                                                    ${{ $minItem['usd_amount'] }} x
                                                    {{ $minItem['person_range'] }}
                                                    guests:</span>
                                                <span id="total-cost">US
                                                    ${{ $minItem['usd_amount'] * $minItem['person_range'] }}</span>
                                            </div>
                                            <hr class="my-1" />
                                            <div class="total d-flex justify-content-between" style="color: #37517e">
                                                <span>Total</span>
                                                <span id="total-cost-final">US
                                                    ${{ $minItem['usd_amount'] * $minItem['person_range'] }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="w-100 mt-2 btn book-btn  ">
                                        BOOK PACKAGE
                                    </button>


                                </form>
                            </div>


                        </div>



                    </div>
                </div>
            </div>
            @if (isset($otherPackage[0]))
                <div class="container">
                    <div class="row mt-5">
                        <div class="package-title d-flex flex-md-row justify-content-md-between flex-column">
                            <p style="font-size: 30px; font-weight: 600;font-family: 'Rubik', sans-serif;"
                                class="mb-0 position-relative other-package-title">Similar Packages

                                <span
                                    style="position: absolute; bottom: 0px;left: 0; width: 50%; height: 3px; background-color: #CB9331;"></span>
                            </p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        @forelse ($otherPackage as $package)
                            <div class="col-lg-4 col-md-6">
                                <a href="{{ route('page.package.details', $package->slug) }}">
                                    <x-home.package :package="$package" />
                                </a>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            @endif
        </div>
        <div class="float-book-now-btn">
            <form action="{{ route('book.form') }}">
                <input type="hidden" name="package_id" value="{{ $package->id }}">
                <button type="submit" class="btn package-book-btn" style="width:100%">Book
                    Now</button>
            </form>
        </div>
    </main>

@stop

@section('css')
    <style>
        .package-banner img {
            aspect-ratio: 21/9;
            object-fit: cover;
        }

        .gallery-item {
            width: 70vw;
            height: auto;
            max-height: 80vh;
            object-fit: contain;
            margin: auto;
        }

        .tripVideo {
            width: 100%;
            aspect-ratio: 16/9;
            height: auto;
        }

        .gallery-image {
            height: 250px;
            width: auto;
            aspect-ratio: 16/9;
            object-fit: cover;
        }

        .booking-module {
            position: sticky;
            top: 137px;

        }

        .booking-module-card {
            background-color: #37517E;
            border: 1px solid #37517E;
            box-shadow: 1px 1px 1px 1px #37517edf;
            border-radius: 10px;
        }

        .link-wrapper a {
            color: #37517E;
        }

        .plus-minus-btn {
            border-radius: 50%;
        }

        .icon-responsive {
            height: 40px;
        }

        .text-container {
            font-size: 16px;
            line-height: 1.5;
            margin-left: 0.5rem;
        }

        .mob-pdf-download {
            display: none;
        }

        @media (max-width: 768px) {
            .icon-responsive {
                height: 35px;
            }


            .text-container {
                font-size: 15px;
                line-height: 1.4;
            }
        }

        @media (max-width: 576px) {
            .icon-responsive {
                height: 30px;
            }

            .text-container {
                font-size: 14px;
                line-height: 1.3;
            }
        }


        .fw-500 {
            font-weight: 500;
        }

        #inclusion ul,
        #inclusion ol,
        #excludes ul,
        #excludes ol {
            list-style: none;
            /* Removes the default list circles */
            padding-left: 0;
            /* Aligns the list items with their parent container */
            margin-left: 0;
            /* Optional: Removes any left margin */
        }

        #inclusion ul li,
        #excludes ul li {
            display: flex;
            /* Allows alignment of icons and text */
            align-items: center;
            /* Vertically aligns the icon and text */
            gap: 5px;
            /* Adds some spacing between the icon and text */
        }


        .fa-check-circle {
            font-size: 1rem;
            vertical-align: middle;
        }

        .fa-times-circle {
            font-size: 1rem;
            vertical-align: middle;
        }

        /* Remove default border */
        .custom-date-input {
            background-color: transparent;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            color: #37517e;
            outline: none;
            width: 100%;
            transition: all 0.3s ease-in-out;
        }

        .custom-date-input::placeholder {
            color: #999;
            font-style: italic;
        }

        .itineray-btn {
            background: transparent;
            border: none;
            text-decoration: none;
        }

        .group-price option {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .title::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 10px;
            background: url(/images/title-shape.png) no-repeat;
        }

        .form-input {
            border: 0;
            background-color: transparent;
            font-weight: 600;
            color: #37517e;
            height: 38px;
            border-radius: 0;
            text-align: center;
            width: 100%;
            display: block;
        }

        .handler {
            position: absolute;
            right: 0;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            justify-content: space-between;
            flex-direction: row-reverse;
        }

        .handler span {
            background-color: #37517e;
            border: 0;
            color: #fff;
            font-size: 0.8375rem;
            height: 38px;
            width: 38px;
            border: 1px solid #d2d2d2;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            line-height: 1;
            font-size: 0.625rem;
            transition: 0.3s;
            cursor: pointer;
        }

        .page-nav-link:hover {
            background: white;
            color: #000 !important;
            transition: 100ms ease-in;
        }

        .price-wrapper {
            color: #37517E;
            font-weight: 600;
        }

        .book-btn {
            background-color: #37517E;
            border: 1px solid #37517E;
            color: white;
        }

        .book-btn:hover {
            background-color: #446399;
            border: 1px solid #446399;
            color: white;

        }

        html {
            scroll-behavior: smooth;
        }

        .page-nav {
            top: 84px;
            background-color: #19A1E5;
            z-index: 100;
            display: none;
            /* Hide initially */
        }

        .fact-item {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .trip-fact {
            background-color: #1d2532;
        }

        .itineraryPdfDownloader::before {
            position: absolute;
            left: -9px;
            top: 0;
            bottom: 0;
            width: 20px;
            content: "";
            z-index: -1;
            border-radius: 20px 0 0 20px;
            background-color: #37517e;
        }

        .tripInclusionBtn {
            border: 3px solid #19A1E5 !important;
            color: #19A1E5 !important;
            padding: 5px 15px !important;
        }

        .tripInclusionBtnActive {
            background-color: #19A1E5 !important;
            color: white !important;
        }

        .tripInclusionBtn:hover {
            background-color: #19A1E5 !important;
            color: white !important;
        }

        .page-nav a {
            font-size: 0.85rem !important;
            font-weight: 600;
        }

        @media screen and (max-width:991px) {
            #pageNav {
                display: none !important;
            }

            .fact-item {
                flex: 0 0 44%;
            }

            .mob-pdf-download {
                display: block;
            }
        }

        @media screen and (max-width:768px) {
            .package-banner img {
                aspect-ratio: 16/9;
            }
        }

        @media screen and (max-width:450px) {
            .package-banner img {
                aspect-ratio: 4/3;
            }
        }
    </style>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Fancybox.bind("[data-fancybox='gallery']", {
                // Fancybox v5 options
                Thumbs: {
                    autoStart: true
                },
                Toolbar: {
                    display: {
                        left: ["infobar"],
                        middle: ["zoomIn", "zoomOut", "toggle1to1", "rotateCCW", "rotateCW", "flipX",
                            "flipY"
                        ],
                        right: ["slideshow", "fullscreen", "thumbs", "close"],
                    }
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Fancybox.bind("[data-fancybox='trip-map']", {
                // Fancybox v5 options
                Thumbs: {
                    autoStart: true
                },
                Toolbar: {
                    display: {
                        left: ["infobar"],
                        middle: ["zoomIn", "zoomOut", "toggle1to1", "rotateCCW", "rotateCW", "flipX",
                            "flipY"
                        ],
                        right: ["slideshow", "fullscreen", "thumbs", "close"],
                    }
                }
            });
        });
    </script>
    <script>
        document.querySelectorAll('[data-toggle="collapse"]').forEach(button => {
            button.addEventListener('click', function() {
                const icon = this.querySelector('.toggle-icon');
                if (icon.classList.contains('fa-chevron-down')) {
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-up');
                } else {
                    icon.classList.remove('fa-chevron-up');
                    icon.classList.add('fa-chevron-down');
                }
            });
        });
        document.querySelectorAll('[data-toggle="collapse"]').forEach(button => {
            button.addEventListener('click', function() {
                const icon = this.querySelector('.faq-toggle-icon');
                if (icon.classList.contains('fa-chevron-down')) {
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-up');
                } else {
                    icon.classList.remove('fa-chevron-up');
                    icon.classList.add('fa-chevron-down');
                }
            });
        });
        document.querySelectorAll('#tripInclusionsAccordion [data-toggle="collapse"]').forEach(button => {
            button.addEventListener('click', function() {
                document.querySelectorAll('#tripInclusionsAccordion [data-toggle="collapse"]').forEach(
                    btn => {
                        btn.classList.remove('tripInclusionBtnActive');
                    });

                // Add btn-primary to clicked button
                this.classList.add('tripInclusionBtnActive');
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('#tripInclusionsAccordion .tripInclusionBtn').classList.add(
                'tripInclusionBtnActive');
        });

        document.addEventListener("scroll", () => {
            const pageNav = document.getElementById("pageNav");
            const overview = document.getElementById("metaSection");

            if (overview) {
                const overviewRect = overview.getBoundingClientRect();

                // Show `pageNav` if the top of #overview is out of view
                if (overviewRect.top <= 0) {
                    pageNav.style.display = "block";
                } else {
                    pageNav.style.display = "none";
                }
            }
        });

        // Add this function to handle active state
        function setActiveNavLink() {
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('.page-nav a');

            let currentSection = '';

            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.offsetHeight;
                const scrollPosition = window.pageYOffset - window.innerHeight - 200; // Adjust offset as needed

                if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                    currentSection = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('page-nav-active');
                if (link.getAttribute('href') === `#${currentSection}`) {
                    link.classList.add('page-nav-active');
                }
            });
        }

        // Add scroll event listener
        window.addEventListener('scroll', setActiveNavLink);

        // Set initial active state
        document.addEventListener('DOMContentLoaded', function() {
            setActiveNavLink();

            // Update active state when clicking links
            document.querySelectorAll(".page-nav a").forEach(anchor => {
                anchor.addEventListener("click", function(e) {
                    e.preventDefault();

                    document.querySelectorAll(".page-nav a").forEach(link => {
                        link.classList.remove('page-nav-active');
                    });
                    this.classList.add('page-nav-active');

                    const navHeight = document.querySelector('header').offsetHeight;
                    const targetId = this.getAttribute("href").substring(1);
                    const targetElement = document.getElementById(targetId);

                    if (targetElement) {
                        const targetPosition = targetElement.getBoundingClientRect().top;
                        const offsetPosition = targetPosition + window.pageYOffset - navHeight - 20;


                        window.scrollTo({
                            top: offsetPosition,
                            behavior: 'smooth'
                        });
                    }

                });
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            const incrementButton = document.querySelector('.increment');
            const decrementButton = document.querySelector('.decrement');
            const guestCountInput = document.querySelector('#guest-count');
            const groupPriceSelect = document.querySelector('#group-price');
            const costPerGuestElement = document.querySelector('#cost-per-guest');
            const totalCostElement = document.querySelector('#total-cost');
            const totalCostFinalElement = document.querySelector('#total-cost-final');

            let prev = 1;
            let groupPrice = [];
            let packageCosts = @json($package->extra['package_costs']);

            if (packageCosts.length > 0) {
                packageCosts.forEach((item) => {
                    const current = item.person_range;
                    let itemPrice = '';
                    let price = 0;

                    // Determine the price and label
                    if (item.usd_amount > 0) {
                        price = item.usd_amount;
                    } else if (item.npr_amount > 0) {
                        price = item.npr_amount;
                    } else if (item.inr_amount > 0) {
                        price = item.inr_amount;
                    }
                    groupPrice.push({
                        min: prev,
                        max: current,
                        value: price,
                    });
                    prev = parseInt(current) + parseInt(1);
                });
            }

            function updatePrice() {
                const guestCount = parseInt(guestCountInput.value, 10);
                let selectedOption = Array.from(groupPrice).find(option => {
                    console.log(option)
                    const min = parseInt(option.min, 10);
                    const max = parseInt(option.max, 10);
                    return guestCount >= min && guestCount <= max;
                });
                console.log(selectedOption)

                if (selectedOption) {
                    const pricePerPerson = parseInt(selectedOption.value, 10);
                    const totalCost = guestCount * pricePerPerson;

                    costPerGuestElement.textContent = `US$ ${pricePerPerson} x ${guestCount} guests:`;
                    totalCostElement.textContent = `US$ ${totalCost}`;
                    totalCostFinalElement.textContent = `US$ ${totalCost}`;
                }
            }

            incrementButton.addEventListener('click', () => {
                const currentValue = parseInt(guestCountInput.value, 10);
                const max = parseInt(guestCountInput.max, 10);
                if (currentValue < max) {
                    guestCountInput.value = currentValue + 1;
                    updatePrice();
                }
            });

            decrementButton.addEventListener('click', () => {

                const currentValue = parseInt(guestCountInput.value, 10);
                const min = parseInt(guestCountInput.min, 10);
                if (currentValue > min) {
                    guestCountInput.value = currentValue - 1;
                    updatePrice();
                }
            });

            // groupPriceSelect.addEventListener('change', updatePrice);
        });

        document.addEventListener("DOMContentLoaded", function() {
            // Target the "include" and "exclude" sections
            const includeSection = document.querySelector("#inclusion");
            const excludeSection = document.querySelector("#excludes");

            // Add green check icon to "include" list items
            if (includeSection) {
                includeSection.querySelectorAll("li").forEach((li) => {
                    li.innerHTML = `<i class="fa fa-check-circle text-success me-2"></i>${li.innerHTML}`;
                });
            }

            // Add red check icon to "exclude" list items
            if (excludeSection) {
                excludeSection.querySelectorAll("li").forEach((li) => {
                    li.innerHTML = `<i class="fa fa-times-circle text-danger me-2"></i>${li.innerHTML}`;
                });
            }
        });
    </script>
@endsection
