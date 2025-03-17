@props(['data'])
<style>
    .destination-card {
        position: relative;
        height: 410px;
        width: 246px;
        border-radius: 10px;
    }

    .destination-img {
        height: 179px;
        width: 100%;
        object-fit: fill;
    }

    .flag-card {
        position: relative;

    }

    .small-flag {
        position: absolute;
        height: 30px;
        width: 30px;

        border: 3px solid white;
        border-radius: 100%;
        object-fit: fill;
        bottom: -7%;
        left: 100%;
        transition: all 0.4s;
        opacity: 0;
        box-shadow: 1px 3px 1px 3px rgba(0, 0, 0, 0.3);


    }

    .small-flag-image {
        position: absolute;
        top: 0;
        left: 0;
        height: 25px;
        width: 25px;
        object-fit: fill;
        overflow: hidden;
        border-radius: 100%;




    }

    .destination-card:hover .small-flag {
        left: 70%;
        opacity: 1;
    }

    .destination-title {

        font-size: 24px;
        font-weight: 700;
        line-height: 33.61px;
        text-align: left;
        margin: 12px 0px;
        transition: all 0.4s;

    }

    .destination-subtitle {

        font-size: 15px;
        font-weight: 400;
        line-height: 19.61px;
        text-align: left;
        transition: all 0.4s;


    }

    @media screen and (min-width: 769px) {

        .destination-card:hover .destination-title {
            margin-top: -0.1px;

        }

        .destination-card:hover .destination-subtitle {
            margin-top: -12px;

        }

        .destination-card:hover .destination-button {
            background: linear-gradient(to right, #F86A6A, #EF0606);
            color: white;
            border: none;
            cursor: pointer;



        }

        .destination-card:hover .destination-button a {

            color: white;


        }
    }

    .destination-button {
        position: absolute;
        bottom: 18px;



    }

    .destination-button a {
        text-decoration: none;

        font-size: 16px;
        font-weight: 400;
        line-height: 19.61px;
        text-align: left;




    }

    @media screen and (max-width: 991px) {
        .destination-card {
            position: relative;
            height: 410px;
            width: 90%;
        }

        .destination-img {
            height: 209px;
            width: 100%;
            object-fit: fill;
        }

        .destination-button a {

            color: white;

        }

        .destination-button {
            background: linear-gradient(to right, #F86A6A, #EF0606);
            color: white;
            border: none;
            cursor: pointer;

        }

        .small-flag {
            display: none;

        }

        .small-flag-image {
            display: none;
        }

    }

    .anchor {
        text-decoration: none;
        color: black;
    }
</style>

<div class="col d-flex justify-content-center">
    <a class="anchor" href="{{ route('destination', $data->id) }}">

        <div class="card destination-card">
            <div class="flag-card">

                <img src="{{ asset($data->thumbnail) }}" class="card-img-top destination-img" alt="...">
                <div class="small-flag">
                    <img src="{{ asset($data->flag) }}" alt=""class="small-flag-image">
                </div>
            </div>
            <div class="card-body">
                <h5 class="destination-title">Study in {{ $data->name }}</h5>
                <div class=" destination-subtitle">{!! Str::limit($data['description'], 100) !!}</div>
                <button class="destination-button btn btn-outline-secondary  d-flex justify-content-left "><a
                        href="{{ route('destination', $data->id) }}" class="align-self-start">Learn More</a>
                </button>
            </div>
        </div>
    </a>
</div>
