@props(['video'])
<style>
    .section-agency-container {
        position: relative;
        margin-top: 40px;

    }

    .section-agency {
        width: 100%;
        height: 506px;
        background: linear-gradient(180deg, rgba(250, 25, 25, 0.2) 64.92%, rgba(117, 164, 255, 0.2) 110.38%);




    }

    .section-video {
        display: flex;
        justify-content: center;

        padding-top: 1%;
    }

    .agency-title {

        font-size: 32px;
        font-weight: 700;
        line-height: 44.81px;
        text-align: center;
        padding: 20px;


    }

    .agency-title-span {
        color: var(--Primary-Color, #BF1E2E);

    }

    .agency-bottom-image {
        position: absolute;
        bottom: 0;
        width: 100%;
        overflow: hidden;
        object-fit: fill;
        z-index: -1;


    }

    .frame-video {
        width: 80%;
        height: 320px;

    }

    @media (max-width: 512px) {
        .frame-video {
            width: 100%;
            height: 300px;

        }
    }
</style>
<div class="section-agency-container">

    <img src="{{ asset('img/agency-bottom.png') }}" class="agency-bottom-image" alt="">

    <div class="section-agency">
        <div class="container">
            <div class="agency-title">What Agency <span class="agency-title-span">?</span> </div>
            <div class="section-video">
                @php
                    $trimmedString = explode('=', $video->link)[1];
                @endphp

                {{-- {{ dd($video->source) }} --}}
                @if (strtolower($video->source) == 'youtube')
                    @php
                        $key = explode('&', $trimmedString)[0];
                    @endphp

                    <iframe class="frame-video"
                        src="https://www.youtube.com/embed/{{ $key }}?si=4A7j912KuxDse_Cc"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                @endif
            </div>
        </div>
    </div>
</div>
