@props(['data'])
<style>
    .image-div {
        position: relative;
        z-index: 1;
    }

    .top-box {
        left: 30px;
        position: absolute;
        width: 423px;
        z-index: -1;
        height: 297px;
        background: rgba(254, 8, 8, 1);
    }

    .bottom-box {
        z-index: -1;
        top: 550px;
        left: 200px;
        width: 423px;
        height: 297px;
        background: rgba(254, 8, 8, 1);
    }

    .director-image {
        top: 50px;
        left: 60px;
        z-index: 1;
        padding-left: 50px;
        padding-top: 25px;
    }

    .message-div {
        z-index: -1;
        margin-top: 70px;
        max-width: 120%;
        background: rgba(255, 246, 246, 1);
        width: 799px;
    }

    .message-title {
        font-size: 24px;
        font-weight: 700;
    }

    .regards {
        font-size: 24px;
        font-weight: 700;
    }

    .arrow-right {
        position: absolute;
        right: -10px;
        top: -39px;
        width: 0;
        height: 0;
        border-top: 60px solid transparent;
        border-bottom: 60px solid transparent;
        rotate: 315deg;
        border-left: 60px solid rgba(254, 8, 8, 1);
    }

    @media only screen and (max-width: 1200px) {
        .director-image {
            z-index: 1;
            padding-left: 50px;
            padding-top: 25px;
            max-width: 100%;

        }

        .top-box {
            left: 30px;
            position: absolute;
            width: 223px;
            z-index: -1;
            height: 220px;
            background: rgba(254, 8, 8, 1);
        }

        .message-div {
            margin-left: -30px;
            max-width: 130%;
        }
    }
</style>
<div class="mb-5">
    <div class="row">
        <div class="col-5 image-div">

            <div class="top-box">

            </div>
            <img class="director-image" src="{{ asset($data->extra['images'][0]) }}" alt="">
            {{-- <div class="bottom-box">

            </div> --}}
        </div>

        <div class="col-6">
            <div class="message-div px-3 px-xl-5 pt-xl-5 pt-4">
                {{-- <div class="arrow-right"></div> --}}
                <div class="container px-3 px-xl-5 pt-1">

                    <div class="message-title pb-xl-5 pb-5 pb-sm-4">{{ $data->value }}</div>
                    <div>
                        <p>{!! $data->extra['descriptions'] !!}</p>
                        <br>

                        <p class="regards
                        py-xl-5 py-sm-4 py-5">

                            {!! $data->extra['sections'][0]['id'] !!} <br> {!! $data->extra['sections'][0]['detail'] !!}
                        </p>

                    </div>
                </div>

            </div>
        </div>


    </div>
</div>
