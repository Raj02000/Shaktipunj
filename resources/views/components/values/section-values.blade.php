@props(['values'])
<style>
    .values-card {
        height: 420px;
        box-shadow: 1px 1px 1px 1px rgba(0, 0, 0, 0.2);
    }

    .values-main-title {

        font-size: 24px;
        font-weight: 700;
        line-height: 33.61px;
        text-align: left;

    }

    .value-image {
        width: 20%;
        height: 20%;
        object-fit: cover;
        object-position: 50% 50%;
        border-radius: 10px;
        margin-bottom: 10px;
        margin-top: 10px;


    }

    .values-card {
        background: #FFF6F6;
        padding: 10px;
        transition: all 0.8s;

    }

    .values-title {

        font-size: 18px;
        font-weight: 700;
        line-height: 26px;
        text-align: left;
        background-color: white;

        padding: 13px;
        border-radius: 10px;


        display: inline-block;
        gap: 10px;
        box-shadow: 2px 4px 2px rgba(0, 0, 0, 0.3);



    }

    .values-description {
        margin: 12px 0px 30px 0px !important;

        font-size: 16px;
        font-weight: 500;
        line-height: 26px;
        text-align: left;

    }

    .col:hover .values-card {

        box-shadow: 1px 1px 20px 10px #FFE8D29E;

    }
</style>


<div class="container">
    <div class="values-main-title my-5 text-center">Experience matters. We have tons of it.</div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-3">
        @forelse ($values as $value)
            <div class="col   ">
                <div class="card  values-card ">
                    <div class="card-body ">
                        <div><img src="{{ asset($value->images[0]) }}" class="value-image" alt="">
                        </div>

                        <span class="card-title values-title my-2">{{ $value->title }}</span>

                        <p class="card-text values-description">{!! $value->description !!}</p>
                    </div>
                </div>
            </div>

            {{-- <div
                class="@if ($loop->iteration == 3) row w-100 d-block
                @else
                d-none @endif
            ">
                <img src="{{ asset('img/values-banner.png') }}" alt="">
            </div> --}}

        @empty
            <h2>No values available</h2>
        @endforelse

    </div>

</div>
