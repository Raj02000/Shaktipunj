@props(['data'])

<style>
    .card-tag {
        padding: 10px;
        width: max-content;
        border-radius: 10px;
        background-color: rgba(255, 255, 255, 1);
        box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
        font-size: 21px;
        font-weight: 600;
    }

    .single-image-div {
        width: 644px;
        height: 391px;
        overflow: hidden;
        border-radius: 0px 20px 20px 0px;
    }

    .single-image {
        max-width: 100%;
        object-fit: cover;
        border-radius: 0px 20px 20px 0px;
    }

    .two-image-div {
        position: relative;
        width: 631px;
        height: 391px;
    }

    .two-image-div .image-0 {
        position: absolute;
        top: 0;
        left: 0;
        max-width: 100%;
        object-fit: cover;
        width: 352px;
        height: 246px;
        border-radius: 30px;
    }

    .two-image-div .image-1 {
        position: absolute;
        width: 352px;
        height: 246px;
        max-width: 100%;
        object-fit: cover;
        border-radius: 30px;
        right: 0;
        bottom: 0;
    }

    .three-image-div {
        position: relative;
    }

    .three-image-div {
        width: 644px;
        height: 401px;
        border-radius: 20px;
    }

    .three-image-div .image-0 {
        position: absolute;
        width: 200px;
        height: 298px;
        border-radius: 20px;
        bottom: 0;
    }

    .three-image-div .image-1 {
        position: absolute;
        width: 280px;
        height: 411px;
        border-radius: 20px;
        left: 207px;
        object-fit: cover;
    }

    .three-image-div .image-2 {
        position: absolute;
        width: 150px;
        height: 193px;
        border-radius: 20px;
        right: 0;
        object-fit: cover;
    }

    .card-title {
        font-size: 24px;
        font-weight: 700;
    }


    @media only screen and (max-width: 1024px) {

        .three-image-div .image-1 {
            width: 42%;
            height: 90%;
            left: 32.5%;
            object-fit: cover;
        }

        .three-image-div .image-2 {
            height: 30%;
            object-fit: cover;
        }

        .three-image-div .image-0 {
            height: 55%;
            width: 30%;
            object-fit: cover;
        }
    }

    @media only screen and (max-width: 576px) {
        .two-image-div .image-0 {
            width: 60%;
            object-fit: cover;

        }

        .two-image-div .image-1 {
            width: 60%;
            object-fit: cover;
        }

        .three-image-div {
            height: 270px;
            border-radius: 20px;
        }

        .three-image-div .image-0 {
            width: 25%;
            object-fit: cover;
            border-radius: 9px;
        }

        .three-image-div .image-1 {
            width: 45%;
            height: 80%;
            left: 28%;
            border-radius: 9px;
            object-fit: cover;
        }

        .three-image-div .image-2 {
            width: 24%;
            height: 35%;
            object-fit: cover;
            border-radius: 9px;
        }

        .card-title {
            font-size: 16px;
            font-weight: 700;
        }

        .card-text {
            font-size: 14px;
        }

        .card-tag {
            padding: 10px;
            font-size: 10px;
            font-weight: 600;
        }

        .single-image-div {
            height: 280px;
        }

    }
</style>
<div class="row my-xl-5 my-3 py-0">
    @forelse ($data as $item)
        @if ($item->key == 'our-moto')
            <div class="row my-5 ms-0" style="background: rgba(255, 246, 246, 1);">

                <div class="col-xl my-4 order-2 order-xl-1 px-4">
                    @if ($item->display_name != '')
                        <div class="card-tag mb-2 d-none d-xl-block">{{ $item->display_name }}</div>
                    @endif
                    <div class="card-title">{{ $item->value }}</div>
                    <div class="card-text">{!! $item->extra['descriptions'] !!}</div>
                </div>
                <div class="col-xl my-0 order-1 order-xl-2 d-flex justify-content-center">

                    <div class="single-image-div">
                        @if ($item->display_name != '')
                            <div class="card-tag d-block d-xl-none mt-3 mb-4">{{ $item->display_name }}</div>
                        @endif
                        <img class="single-image" src="{{ asset($item->extra['images'][0]) }}" alt="">
                    </div>
                </div>
            </div>
        @endif
        @if ($item->key == 'why-choose-us')
            <div class="row mt-3 ms-0" style="background: rgba(255, 246, 246, 1);">
                <div class="col-xl my-2 order-2 order-xl-1  px-4">
                    {{-- @if ($item->display_name != '')
                        <div class="card-tag mb-2 d-none d-xl-block">{{ $item->display_name }}</div>
                    @endif --}}
                    <div class="card-title">{!! $item->value !!}</div>
                    <div class="card-text">{!! $item->extra['descriptions'] !!}</div>
                </div>
                <div class="col-xl my-3 order-1 order-xl-2 d-flex justify-content-center">

                    <div class="two-image-div">
                        @if ($item->display_name != ' ')
                            <div class="card-tag d-block d-xl-none  mb-4">{{ $item->display_name }}</div>
                        @endif
                        @foreach ($item->extra['images'] as $image)
                            @if ($loop->index == 2)
                            @break

                        @else
                            <img class="image-{{ $loop->index }}" src="{{ asset($image) }}" alt="">
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    @if ($item->key == 'our-story')
        <div class="row mt-3 pt-3 pt-sm-0 ms-0" style="background: rgba(255, 246, 246, 1);">
            <div class="col-xl my-5 order-2 order-xl-1 px-4">
                @if ($item->display_name != '')
                    <div class="card-tag mb-2 d-none d-xl-block">{{ $item->display_name }}</div>
                @endif
                <div class="card-text">{!! $item->extra['descriptions'] !!}</div>
            </div>
            <div class="col-xl order-1 order-xl-2 d-flex justify-content-center">
                <div class="three-image-div">
                    @if ($item->display_name != ' ')
                        <div class="card-tag d-block d-xl-none  mb-4">{{ $item->display_name }}</div>
                    @endif
                    @foreach ($item->extra['images'] as $image)
                        @if ($loop->index == 3)
                        @break

                    @else
                        <img class="image-{{ $loop->index }}" src="{{ asset($image) }}" alt="">
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endif

@empty

@endforelse

</div>
