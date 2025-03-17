@props(['data'])
<style>
    .director-image-mobile {
        height: 350px;
        overflow: hidden;
    }

    .image-mobile {
        max-width: 100%;
        object-fit: cover;
    }

    .regards-mobile {

        font-size: 18px;
        font-weight: 700;
    }

    @media only screen and (min-width: 512px) {
        .director-image-mobile {
            height: 500px;
            overflow: hidden;
        }

        .regards-mobile {

            font-size: 18px;
            font-weight: 700;
        }
    }
</style>
<div class="container">
    <div class="message-title my-4 text-center">{{ $data->value }}</div>
    <div class="director-image-mobile mb-5 d-flex justify-content-center">
        <img class="image-mobile " src="{{ asset($data->extra['images'][0]) }}" alt="">
    </div>


    <div class="flex-wrap text-left">
        <p>{!! $data->extra['descriptions'] !!}</p>

        <p class="regards-mobile my-5">

            {!! $data->extra['sections'][0]['id'] !!} <br> {!! $data->extra['sections'][0]['detail'] !!}
        </p>

    </div>




</div>
