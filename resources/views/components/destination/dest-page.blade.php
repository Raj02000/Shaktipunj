@props(['destContent', 'name'])
<style>
    .small-image {
        position: relative;
    }

    .img-small {
        width: 352px;
        height: 308px;
        object-fit: cover;
    }

    .overlay-title {
        z-index: 1;
        position: absolute;
        top: 10%;
        color: white;
        font-size: 32px;
        font-weight: 700;
        margin-inline-end: 55px;
    }

    .overlay-text {
        font-size: 16px;
        font-weight: 600;
    }

    .image-study {
        height: 100%;
        width: 450px;
        object-fit: fill
    }

    @media only screen and (max-width: 512px) {
        .overlay-title {
            font-size: 28px;
            left: 7%;
        }

        .overlay-text {
            font-size: 16px;
            font-weight: 600;
        }

        .img-small {
            width: 352px;
            height: 308px;
        }
    }
</style>
<section>
    <div class="container-lg mb-4">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="page-topic mb-4">
                    Why study in {{ $destContent->name }}?
                </div>
                <div class="col-12 col-md-9 col-xl-7 mb-5">
                    {!! $destContent['content_description'] !!}
                </div>
                <div class="row pe-md-5 ">
                    {{-- {{ dd($destContent) }} --}}

                    @for ($i = 1; $i <= 4; $i++)
                        @php
                            $name = 'section' . $i;
                        @endphp
                        {{-- {{dd($destContent->$name['section_name'])}} --}}
                        @isset($destContent->$name)
                            <div class="col-sm-6 mb-4 small-image d-flex justify-content-center justify-content-sm-start">
                                @isset($destContent->$name['section_image'])
                                    <img class="img-small rounded-4" src="{{ asset($destContent->$name['section_image']) }}"
                                        alt="ranking">
                                @else
                                    <img class="img-small rounded-4" src="{{ asset('img/ranking.png') }}" alt="ranking">
                                @endisset
                                <div class="overlay-title ms-4">
                                    {{ $destContent->$name['section_name'] }}
                                    <div class="overlay-text mt-2">{!! Str::limit($destContent->$name['section_description'], 220) !!}</div>
                                </div>
                            </div>
                        @endisset
                    @endfor

                </div>
            </div>
            <div class="col-4 d-none d-lg-block">
                <img class="image-study" src="{{ asset($destContent['content_image']) }}" alt="">
            </div>
        </div>
    </div>
</section>
