@extends('layouts.main')
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

@section('content')
    <div class="container">
        <div class="mt-3">
            <p style="font-size: 30px; font-weight: 600;" class="mb-0">Destinations</p>
        </div>
        <div class="row mt-4 mb-5">
            @foreach ($destinations as $destination)
                <div class="col-lg-6 mb-4">
                    <a href="{{ route('page.destination', $destination->slug) }}">
                        <div class="image-overlay rounded-sm" style="height: 300px;">
                            <img src="{{ asset($destination->image) }}" alt="{{ $destination->name }}"
                                style="height: 100%; width: 100%; object-fit:cover;">
                            <div class="overlay-text"><span>{{ $destination->name }}</span></div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@stop
