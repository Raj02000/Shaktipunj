<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @yield('title', 'ShaktiPunj')
    </title>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('/images/logo.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/css/bootstrap.min.css') }}" media="all">
    <!-- Fonts Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/fontawesome/css/all.min.css') }}">
    <!-- jquery-ui css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/jquery-ui/jquery-ui.min.css') }}">
    <!-- modal video css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/modal-video/modal-video.min.css') }}">
    <!-- light box css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/lightbox/dist/css/lightbox.min.css') }}">
    <!-- slick slider css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/slick/slick-theme.css') }}">

    <!-- google fonts -->
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/my.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <link rel="stylesheet" href="{{ asset('css/custom-css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom-css/footer.css') }}">

    @section('meta-info')
    <x-meta-info title="{{ $title ?? 'ShaktiPunj' }}"
        description="{{ $description ?? 'Explore Nepal with ShaktiPunj Pvt. Ltd., the leading DMC for Nepal. We specialize in trekking (Everest Base Camp, Annapurna, Langtang), pilgrimage tours (Muktinath, Kailash), luxury tours, and adventure activities like paragliding, rafting, and jungle safari. Your trusted tour operator in Nepal.'}}"
        keywords="{{ $keywords ?? 'Nepal tour operator, trekking in Nepal, Everest Base Camp trek, Annapurna Base Camp trek, Muktinath tour package, pilgrimage tour in Nepal, luxury tour in Nepal, adventure activities in Nepal, paragliding in Nepal, jungle safari Nepal, Kailash tour from Nepal, hiking in Nepal, cultural tours Nepal, Kathmandu Pokhara tour, Nepal travel agency, best DMC in Nepal' }}" />
    @show
    @yield('css')


</head>


<body class="home">
    {{-- <div id="siteLoader" class="site-loader">
        <div class="preloader-content">
            <img src="{{ asset('images/loader1.gif') }}" alt="">
    </div>
    </div> --}}
    <div id="page" class="full-page">
        @include('layouts.header')
        @yield('content')
        @include('layouts.footer')
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const navbar = document.querySelector('.navbar');
            const stickyClass = 'navbar-sticky'; // Add custom class for styling when sticky

            window.addEventListener('scroll', () => {
                if (window.scrollY > 0) {
                    navbar?.classList?.add(stickyClass);
                } else {
                    navbar?.classList?.remove(stickyClass);
                }
            });
        });
    </script>
    @if (session()->has('success'))
    <div class="toast-container position-fixed " style="z-index: 11;right:1rem; top:1rem;">
        <div class="toast fade  align-items-center text-white bg-success border-0" role="alert"
            aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body fs-5">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    </div>
    @endif

    @if ($errors->any())
    <div class="toast-container position-fixed " style="z-index: 11;right:1rem; top:1rem;">
        <div class="toast fade  align-items-center text-white bg-danger border-0" role="alert"
            aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body fs-5">
                    {{ $errors->first() }}
                </div>
            </div>
        </div>
    </div>
    @endif
    <script type="text/javascript">
        // toast
        document.addEventListener('DOMContentLoaded', function() {
            var toastEl = document.querySelector('.toast');
            if (toastEl) {
                var option = {
                    autohide: true,
                    delay: 3000
                };
                var toast = new bootstrap.Toast(toastEl, option);
                toast.show();
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

    @yield('scripts')


</body>

</html>