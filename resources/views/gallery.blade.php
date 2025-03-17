@extends('layouts.main')


@section('title', $page->meta_title)

@section('meta-info')
    <x-meta-info ogUrl="{{ url()->current() }}" :title="$page->meta_title" :description="$page->meta_description" :keywords="$page->meta_keywords" />
@endsection

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center my-4">
                    <h2>{{ $page->title }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($page->content as $index => $content)
                <div class="col-lg-3 col-md-4 mb-4">
                    <div class="image-overlay">
                        <div class="image-container">
                            <a href="{{ asset($content['image']) }}" data-fancybox="page-gallery"
                                data-caption="{{ $content['title'] }}">
                                <img src="{{ asset($content['image']) }}" alt="{{ $content['title'] }}"
                                    class="gallery-image m-3" style="cursor: pointer;">
                            </a>
                        </div>
                    </div>
                    <div class="image-text text-center mt-2">{{ $content['title'] }}</div>
                </div>
            @endforeach

        </div>
    </div>


@endsection

@section('css')
    <style>
        .modal-content {
            position: relative;
            /* Ensure the close button aligns with this container */
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.8);
            padding: 1rem;
            border-radius: 10px;
        }

        .gallery-item {
            width: 70vw;
            height: auto;
            max-height: 80vh;
            object-fit: contain;
            margin: auto;
        }

        .image-container {
            height: 400px;
            overflow: hidden;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .image-container img {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

        .image-overlay {
            position: relative;
            cursor: pointer;
            overflow: hidden;
            border-radius: 10px;
        }

        .image-overlay:hover .image-container {
            transform: scale(1.1);
        }

        .image-text {
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }
    </style>
@endsection


@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Fancybox.bind("[data-fancybox='page-gallery']", {
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
@endsection
