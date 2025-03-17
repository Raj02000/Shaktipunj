@props(['policy', 'index'])

<style>
    .single-image {
        width: 644px;
        height: 298px;
        border-radius: 20px;
        overflow: hidden;
        object-fit: cover;
    }

    .policy-title {
        font-size: 24px;
        font-weight: 700;
    }

    .multi-image-div {
        width: 550px;
        height: 298px;
        border-radius: 20px;
        position: relative;
    }

    .multi-image0 {
        position: absolute;
        width: 330px;
        left: 0;
        height: 298px;
        border-radius: 20px;
    }

    .multi-image1 {
        position: absolute;
        width: 206px;
        right: 0;
        height: 168px;
        border-radius: 20px;
    }

    .policy-points {
        font-size: 16px;
        font-weight: 400;
    }

    @media only screen and (max-width: 576px) {
        .multi-image0 {
            width: 235px;
            height: 200px;
        }

        .multi-image1 {
            width: 130px;
            height: 120px;
        }

        .single-image {
            width: 372px;
            height: 210px;
        }

        .multi-image-div {
            width: 372px;
            height: 200px;
            border-radius: 20px;
            position: relative;
        }

    }
</style>
<div class="row d-sm-flex justify-content-sm-center mt-5 mb-5">

    <div class="policy-title d-sm-none d-block mb-4 text-center">
        {{ $policy->title }}
    </div>

    <div class="col-sm order-2 @if ($index % 2 == 0) order-sm-1
        @else
        order-sm-2 @endif">
        <div class="policy-title d-none d-sm-block text-center">
            {{ $policy->title }}
        </div>
        <div class="policy-points">
            {!! $policy->description !!}
        </div>



    </div>

    <div
        class="col-sm d-flex justify-content-center p-0 order-1 @if ($index % 2 == 0) order-sm-2
        @else
        order-sm-1 @endif">
        @if (count($policy->images) >= 2)
            <div class="multi-image-div">
                @foreach ($policy->images as $image)
                    @if ($loop->iteration > 2)
                    @break
                @endif
                <img class="multi-image{{ $loop->index }}" src="{{ asset($image) }}" alt="">
            @endforeach
        </div>
    @else
        <div class="m-0">
            <img class="single-image" src="{{ asset($policy->images[0]) }}" alt="">
        </div>
    @endif

</div>

</div>
