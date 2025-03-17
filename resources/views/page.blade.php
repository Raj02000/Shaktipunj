@extends('layouts.main')

@section('title', $page->meta_title)

@section('meta-info')
<x-meta-info ogUrl="{{ url()->current() }}" :title="$page->meta_title" :description="$page->meta_description" :keywords="$page->meta_keywords" />
@endsection

@section('content')
<main id="content" class="site-main">
    <!-- Inner Banner html end-->
    <div class="single-tour-section">

        <div class="wrap w-100">

            <div class="contain common-box w-100">
                <div class="w-100 px-0">
                    <div>

                        <div class="banner-wrapper w-100">
                            <div class="banner-box d-block w-100 position-relative" style="height: 480px">
                                <img class="position-absolute w-100 h-100 start-0" style="object-fit: cover;"
                                    src="{{ asset($page->image) }}" alt="" />
                            </div>

                        </div>
                    </div>

                    {{-- breadcrumb --}}
                    <div class="w-100 d-flex align-items-center" style="height: 100px; background-color: #37517E;">
                        <div class="container">

                            <div class="mx-lg-3">
                                <a class="text-white" href="/">Home</a> <span class="text-white">></span>
                                <a class="text-white">{{ $model }}</a> <span class="text-white">></span>
                                <a class="text-white">{{ $page->title }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="container">

                        <div class="mx-lg-3 row mt-5">
                            <div class="col-lg-9">
                                <div>
                                    <p style="font-size: 30px; font-weight: 600;font-family: 'Rubik', sans-serif;"
                                        class="mb-0">
                                        {{ $page->title }}
                                    </p>
                                </div>

                                <div class="article" id="overview">

                                    <div class="articleSection mt-4 text-justify" style="text-align: justify">
                                        {!! $page->content !!}
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@stop

@section('css')
<style>
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



    html {
        scroll-behavior: smooth;
    }

    .page-nav {
        top: 55px;
        background-color: #19A1E5;
        z-index: 100;
    }

    .trip-fact::before {
        position: absolute;
        left: -5%;
        right: 50%;
        top: 0;
        bottom: 0;
        content: "";
        background-color: #1d2532;
        z-index: -1;
        transform: translateX(-50%);
        width: 200vw;
        /* Adjust as needed */
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
</style>
@endsection

@section('scripts')

@endsection