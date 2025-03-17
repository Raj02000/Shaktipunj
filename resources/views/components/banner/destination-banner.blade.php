@props(['destinationBanner'])
<style>
    .section-banner {
        background: linear-gradient(to right, #F93D50, #1C0104);
        margin-bottom: 35px;
    }

    .banner-image {
        position: relative;
    }

    .banner-img {
        width: 100%;
        overflow: hidden;
    }

    .banner-desc {
        position: absolute;
        font-size: 24px;
        font-weight: 600;
    }

    .dest-name {
        font-size: 85px;
        font-weight: 900;
    }

    .study {
        font-size: 60px;
        font-weight: 600;
    }

    @media only screen and (max-width: 552px) {
        .dest-name {
            font-size: 55px;
            font-weight: 900;
        }

        .study {
            font-size: 40px;
            font-weight: 600;
        }

        .banner-desc {
            font-size: 15px;
            font-weight: 600;
            position: relative;
        }
    }

    @media only screen and (max-width: 1024px) {
        .banner-desc {
            position: relative;
        }
    }
</style>

<div class="section-banner white-text pt-5">
    <div class="container">

        <div class="mb-3">
            <pre>
        <div class="d-flex align-items-center study">Study in <p class="dest-name">{{ $destinationBanner['name'] }}</p>
        </div></pre>
        </div>
        <div class="col-12 col-sm-11 col-xl-4 m-0 banner-desc"> {!! $destinationBanner['banner_description'] !!}
        </div>
    </div>
    <div class="cotainer-fluid">
        <div class="banner-image">
            <img class="m-0 p-0 banner-img" src="{{ asset($destinationBanner['banner_image']) }}" alt="">
        </div>
    </div>
</div>
