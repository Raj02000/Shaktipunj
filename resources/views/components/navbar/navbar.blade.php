@props(['home'])

<style>
    .logo-image {
        width: 120px;
        height: 70px;
        opacity: 1;
    }

    .navbar-image {
        font-size: 16px;
        font-weight: 400;
    }

    .nav-height {
        top: 0;
        position: sticky;
        width: 100%;
        opacity: 1;

    }

    .nav-text {
        font-size: 17px;
        font-weight: 500;
        color: rgba(0, 0, 0, 1);

    }

    .nav-child {
        font-size: 16px;
        font-weight: 400;
        color: rgba(0, 0, 0, 1);

    }

    .search-div {
        position: fixed;
        top: 100px;
        left: 33%;
        z-index: 999;
        width: 34%;
        height: 47px;
        border-radius: 10px;
        border: 0.5px;
        background: rgba(255, 255, 255, 1);
    }

    .search-input {
        border-radius: 10px 0 0 10px;
        text-decoration: none;
        border: none;
    }

    .section-navbar {
        z-index: 999;
    }

    .trapezoid1 {
        position: fixed;
        border-bottom: 20px solid #f8f9fa;
        z-index: 999;
        border-left: 25px solid transparent;
        height: 0;
        width: 10%;
        rotate: 180deg;
    }

    .trapezoid2 {
        position: fixed;
        border-bottom: 20px solid #f8f9fa;
        z-index: 999;
        border-right: 25px solid transparent;
        height: 0;
        right: 0;
        width: 10%;
        rotate: 180deg;
    }

    .navbar-social {
        rotate: 180deg;
        padding-left: 5px;
    }
</style>


{{-- {{ dd($media) }} --}}
<nav class="navbar navbar-expand-lg nav-height bg-body-tertiary" style="z-index: 999; background-color: #e3f2fd;">
    <div class="container-fluid section-navbar">
        @isset($organization?->extra['image'])
        <a class="nav-text navbar-brand" href="{{ route('home') }}"><img class="logo-image"
                src="{{ asset($organization?->extra['images'][0]) }}" alt=""></a>
        @else
        <a class="nav-text navbar-brand" href="{{ route('home') }}"><img class="logo-image"
                src="{{ asset('img/logo.png') }}" alt=""></a>
        @endisset
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-lg-flex justify-content-lg-end" id="navbarTogglerDemo02">


            <form class="d-flex my-4 d-lg-none" role="search" action="{{ route('search.destination') }}"
                method="get">
                <input class="form-control me-2" name="search" value="{{ request('search') }}" type="search"
                    placeholder="Search..." aria-label="Search">
            </form>


            <div>
                <ul class="navbar-nav me-auto my-2 my-lg-0">

                    <li class="nav-item">
                        <a class="nav-text nav-link active navbar-image" aria-current="page" href="/">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-text nav-link active navbar-image" aria-current="page"
                            href="{{ route('about.introduction') }}">About Us</a>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-text nav-link dropdown-toggle" href="" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu">
                            @if (isset($serviceNav))
                            @foreach ($serviceNav as $child)
                            <li><a class="nav-child dropdown-item"
                                    href="{{ route('services.view', $child->id) }}">{!! $child->title !!}</a>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-text nav-link dropdown-toggle" href="" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Our Destination
                        </a>
                        <ul class="dropdown-menu">
                            @if (isset($destinationNav))
                            @foreach ($destinationNav as $child)
                            <li><a class="nav-child dropdown-item"
                                    href="{{ route('destination', $child->id) }}">{{ $child->name }}</a></li>
                            @endforeach
                            @endif
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-text nav-link active navbar-image" aria-current="page"
                            href="{{ route('event.view') }}">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-text nav-link active navbar-image" aria-current="page"
                            href="{{ route('blogs.view') }}">Blogs</a>
                    </li>



                    <li class="nav-item dropdown">
                        <a class="nav-text nav-link dropdown-toggle" href="" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Media
                        </a>
                        <ul class="dropdown-menu">
                            @if (isset($media))
                            @foreach ($media as $child)
                            <li><a class="nav-child dropdown-item"
                                    href="{{ route($child->link) }}">{{ $child->name }}</a></li>
                            @endforeach
                            @endif
                        </ul>
                    </li>



                    <li class="nav-item">
                        <a class="nav-text nav-link active navbar-image" aria-current="page"
                            href="{{ route('contact') }}">Contact</a>
                    </li>



                    <li class="nav-item d-none d-lg-block">
                        <button class="btn h-100 border-0" onclick="showInput()">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</nav>
<div class="trapezoid1 d-none d-lg-block"></div>
<div class="trapezoid2 d-none d-lg-block">
    <div class="navbar-social">
        @if ($organization?->extra['sections'])

        @foreach ($organization->extra['sections'] as $section)
        @if (strtolower($section['id']) == 'facebook')
        <a class="text-decoration-none" href="{{ $section['detail'] }}">
            <i class="fa fa-facebook-official text-primary fs-6 mx-xl-1 me-1 mt-2" aria-hidden="true"></i>
        </a>
        @endif

        @if (strtolower($section['id']) == 'instagram')
        <a class="text-decoration-none" href="{{ $section['detail'] }}"> <i
                class="fa fa-instagram text-danger fs-6 mx-xl-1 me-1 mt-2" aria-hidden="true"></i>
        </a>
        @endif

        @if (strtolower($section['id']) == 'linkedin')
        <a class="text-decoration-none" href="{{ $section['detail'] }}"> <i
                class="fa fa-linkedin-square text-primary fs-6 mx-xl-1 me-1 mt-2" aria-hidden="true"></i>
        </a>
        @endif
        @endforeach

        @endif
    </div>
</div>
<form id="search-bar" class="row search-div d-none" action="{{ route('search.destination') }}" method="get">

    <div class="col-10 ps-0 d-flex align-items-center; ">
        <input type="text" name="search" class="ps-3 search-input border-0 w-100"
            value="{{ request('search') }}" placeholder="Search...">
    </div>
    <div class="col-1 pe-3">
        <button type="submit" class="btn border-0 h-100">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </div>
</form>
<script>
    function showInput() {
        const searchBar = document.getElementById('search-bar');
        searchBar.classList.toggle('d-lg-flex')
    }
</script>