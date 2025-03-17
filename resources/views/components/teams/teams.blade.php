@props(['data'])
<style>
    .card-gallery {
        margin-bottom: 20px;

        overflow: hidden;
        height: 506px;
        width: 332px;
        margin-bottom: -260px;
        border: none !important;
        ;




    }

    .card-gallery .card-gallery-img-top {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .card-gallery .overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 25%;
        background-color: rgba(0, 0, 0, 0.7);
        transition: height 0.7s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        font-size: 20px;
        font-weight: bold;
        transition: all 0.3s;
    }

    .card-gallery .image-title {
        position: absolute;
        bottom: 25px;
        left: 0;
        width: 100%;
        height: 23%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        font-size: 25px;



        z-index: 1;


        font-weight: 700;
        line-height: 39.21px;
        transition: all 0.3s;


    }

    .card-gallery .image-subtitle {
        position: absolute;
        bottom: 0px;
        left: 0;
        width: 100%;
        height: 18%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        font-size: 25px;



        z-index: 1;


        font-weight: 700;
        line-height: 39.21px;
        transition: all 0.3s;


    }

    .card-gallery:hover .image-title {
        height: 33%;
        bottom: 30px;
        font-size: 30px;


    }

    .card-gallery:hover .image-subtitle {
        height: 17%;
        bottom: 30px;
        font-size: 30px;



    }

    .card-gallery:hover .overlay {
        height: 30%;


    }

    .linkedin-logo {
        position: absolute;
        z-index: 1;
        bottom: 10px;
        left: 45%;
        transition: all 0.3s;

    }



    .card-gallery:hover .linkedin-logo {
        opacity: 1;

    }

    .linkedin-logo {
        height: 30px;
        width: 30px;
        opacity: 0;
    }

    .team-background {
        background: #BF1E2ED6;

        height: 296px;
        width: 100%;
        display: inline;
        /* position: relative;
        top: -300px;
        z-index: -1; */
    }

    @media screen and (max-width:991px) {
        .team-background {
            display: none;
        }

        .card-gallery {
            margin-bottom: 20px;

            overflow: hidden;
            height: 506px;
            width: 332px;

            border: none !important;
            ;
        }

    }
</style>

<div class="container-fluid px-4">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3  g-5">
        @foreach ($data as $members)
            @foreach ($members as $member)
                {{-- @dd($member) --}}
                <div class="col">
                    <div class="d-flex justify-content-center mt-4">

                        <div class="card card-gallery">
                            <img src="{{ asset($member->image) }}" class="card-gallery-img-top" alt="{{ $member->name }}">
                            <div class="image-title">{{ $member->name }}</div>
                            <div class="image-subtitle">{{ $member->designation }}</div>

                            <div class="linkedin-logo">
                                @foreach (json_decode($member->links) as $link)
                                    @php
                                        $trimmedString = explode('.', $link)[1];
                                    @endphp
                                    @if ($trimmedString == 'linkedin')
                                        <a href="{{ $link }}" class="text-white" target="_blank">
                                            <i class="fa fa-linkedin-square fs-3" aria-hidden="true"></i>
                                        </a>
                                    @elseif ($trimmedString == 'facebook')
                                        <a href="{{ $link }}" class="text-white" target="_blank">
                                            <i class="fa fa-facebook-square fs-3" aria-hidden="true"></i>
                                        </a>
                                    @endif
                                @endforeach
                            </div>

                            <div class="overlay"></div>
                            <!-- <div class="image-view">View Image</div> -->

                        </div>
                    </div>
                </div>
            @endforeach
            <span class="team-background"></span>
        @endforeach

    </div>

</div>
