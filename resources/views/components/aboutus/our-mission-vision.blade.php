@props(['data'])
<style>
    .section-title {
        font-size: 24px;
        font-weight: 700;
    }

    .vision-img {
        width: 156px;
        height: 130px;
        max-width: 100%;
    }

    .mission-img {
        width: 156px;
        height: 130px;

    }

    .mission-title {
        font-size: 24px;
        font-weight: 700;
        max-width: 100%;



    }

    .mission-div {
        background: rgba(255, 246, 246, 1);

    }

    @media only screen and (max-width: 576px) {
        .mission-title {
            font-size: 15px;
            font-weight: 700;
        }

        .vision-img {
            width: 110px;
            height: 90px;
            object-fit: cover;
        }

        .mission-img {
            width: 110px;
            height: 90px;
            object-fit: cover;
        }


    }
</style>
<div class="row">
    <div class="my-4 section-title">{{ $data->value }}</div>
    <div class="col-xl-6">
        <div>{!! $data->extra['descriptions'] !!}
        </div>
    </div>
    <div class="col-xl-6 my-xl-4 mt-5">
        <div class="d-flex align-items-center pb-4">
            <img class="vision-img" src="{{ asset('img/vision.jpeg') }}" alt="">
            <div class="ms-3 ps-3 pe-2 ps-xl-5 mission-div">
                <p class="mission-title">{{ $data->extra['sections'][0]['id'] }}</p>
                <p>{!! $data->extra['sections'][0]['detail'] !!}</p>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <img class="mission-img" src="{{ asset('img/mission.jpeg') }}" alt="">
            <div class="ms-3 ps-3 pe-2 ps-xl-5 mission-div">
                <p class="mission-title">{{ $data->extra['sections'][1]['id'] }}</p>
                <p>{!! $data->extra['sections'][1]['detail'] !!}</p>
            </div>
        </div>
    </div>
</div>
