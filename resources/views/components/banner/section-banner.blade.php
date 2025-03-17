@props(['title', 'subtitle'])
<style>
    .section-banner {
        max-width: 100%;
        background: linear-gradient(0deg, #B54444, #B54444),
            linear-gradient(112.88deg, rgba(249, 61, 80, 0.39) 5.24%, rgba(28, 1, 4, 0.39) 81.5%);
        margin-bottom: 35px;
        position: relative;
        padding-bottom: 35px;
    }

    .banner-title {
        font-size: 40px;
        font-weight: 700;
        color: white;
        padding-top: 30px;
    }

    .banner-subtitle {
        font-size: 18px;
        font-weight: 700;
        text-align: center;
        color: white;
        margin: 3px 20%;
    }

    @media screen and (max-width:800px) {


        .banner-subtitle {
            margin: 3px 0px;
        }

        .banner-title {
            font-size: 25px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .banner-subtitle {
            font-size: 15px;
            font-weight: 600;

        }
    }
</style>



<div class="container-fluid section-banner">
    @isset($title)
        <div class="banner-title text-center">{!! $title !!}</div>
    @endisset
    @isset($subtitle)
        <div class="banner-subtitle text-center">{!! $subtitle !!}</div>
    @endisset
</div>
