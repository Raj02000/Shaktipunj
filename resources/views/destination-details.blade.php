@extends('layouts.main')

@section('title', $destination->meta_title)

@section('css')
    <style>
        .image-overlay {
            position: relative;
            display: inline-block;
            width: 100%;
            overflow: hidden;
        }

        .image-overlay img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.3s ease;
            /* Add smooth zoom effect */
        }

        .image-overlay:hover img {
            transform: scale(1.1);
            /* Zoom in the image on hover */
        }

        .image-overlay .overlay-text {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            padding: 10px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
            z-index: 2;
        }

        .image-overlay::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
            transition: height 0.3s ease;
            z-index: 1;
        }

        .image-overlay:hover::after {
            height: 50%;
            /* Overlay fades to 50% of the height on hover */
        }
    </style>


@stop

@section('meta-info')
    <x-meta-info ogUrl="{{ url()->current() }}" ogImage="{{ asset($destination->image) }}" :title="$destination->meta_title" :description="$destination->meta_description"
        :keywords="$destination->meta_keywords" />
@endsection

@section('content')
    <main id="content" class="site-main">
        <!-- Inner Banner html end-->
        <div class="border border-1" style="height: 550px;">
            <img src="{{ asset($destination->image) }}" alt="{{ $destination->name }}"
                style="height: 100%; width:100%; object-fit:cover;">
        </div>

        <div class="w-100 d-flex align-items-center" style="height: 100px; background-color: #37517E;">
            <div class="container">
                <a class="text-white" href="/">Home</a> <span class="text-white">></span>
                <a class="text-white" href="{{ route('page.all-destinations') }}">Destination</a> <span
                    class="text-white">></span>
                @if ($destination->parent)
                    <a class="text-white"
                        href="{{ route('page.destination', $destination->parent?->slug) }}">{{ $destination->parent?->name }}</a>
                    <span class="text-white">></span>
                @endif
                <a class="text-white"
                    href="{{ route('page.destination', $destination->slug) }}">{{ $destination->name }}</a>
            </div>
        </div>

        <div class="container mb-5">
            <div class="mt-4">
                <h1 class="deepblue-color mb-20" style="font-size: 36px;">{{ $destination->name }}</h1>
                <div>{!! $destination->description !!}</div>
            </div>

            <div class="row mt-5">
                @foreach ($destination->children as $child)
                    <div class="col-lg-6 mb-4">
                        <a href="{{ route('page.destination', $child->slug) }}">
                            <div class="image-overlay rounded-sm" style="height: 300px;">
                                <img src="{{ asset($child->image) }}" alt="{{ $child->name }}"
                                    style="height: 100%; width: 100%; object-fit:cover;">
                                <div class="overlay-text"><span>{{ $child->name }}</span></div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            @if (count($destination->packages) > 0)
                <div class="row mt-5">
                    @foreach ($destination->packages as $package)
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ route('page.package.details', $package->slug) }}">
                                <x-home.package :package="$package" />
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif

    </main>

@stop
