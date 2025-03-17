@props(['enabled', 'data'])
<style>
    .container-services {
        position: relative;
    }

    .row123 {
        display: flex;
        flex-direction: row;
        position: relative;
    }

    .col123 {
        flex: 1;
        padding: 30px 43px 30px 58px;
    }

    .image {
        order: 2;
    }

    .description {
        order: 1;
    }

    .row:nth-child(odd) .image {
        order: 2;
    }

    .row:nth-child(odd) .description {
        order: 1;
    }

    .services-image {
        max-width: 460px;
        width: 460px;
        height: 298px;
        border-radius: 20px;
        object-fit: cover;
    }



    .dotted {
        width: 2px;
        height: 100%;
        border: none;
        border-left: 2px dashed black;
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        z-index: -1;

    }

    .arrow {
        height: 15px;
        width: 20px;


        position: absolute;
        top: 0px;
        left: 49.7%;
        transform: translateX(-50%);
        z-index: 0;
        transition: all 0.3s;
    }

    .sample {
        height: 1000px;
    }

    .right {
        text-align: left;
    }

    .services-title {
        font-family: 'AOK Buenos Aires', sans-serif;


        font-size: 25px;
        font-weight: 700;
        line-height: 35.01px;
        text-align: left;
        margin-bottom: 15px;

    }

    .services-description {
        font-family: 'AOK Buenos Aires', sans-serif;


        font-size: 16px;
        font-weight: 400;
        line-height: 22px;
        text-align: justified;

    }

    .services-background {
        background: rgba(217, 217, 217, 0.2);


    }

    .services-head {
        text-align: center;
        font-size: 32px;
        font-weight: 700;
        line-height: 44.81px;



    }

    .container-card {
        display: none;

    }

    .services-card {
        width: 90%;
        border-radius: 20px;
    }

    .enroll-button {
        background: linear-gradient(90deg, #F86A6A 0%, #EF0606 100%);


        width: 117px;

        border-radius: 18px 18px 19px 18px;
        opacity: 0px;
        color: white;



    }

    .enroll-button:hover {

        color: white;



    }

    @media screen and (max-width:1095px) {
        .container-services {
            display: none;
        }

        .container-card {
            display: block;
            border-radius: 40px;
        }

    }
</style>
</head>

{{-- {{ dd($data) }} --}}

<div class="container my-5">
    <div class="services-head">Study abroad <span class="primary-text"> with us!</span></div>
</div>
<div class="container-services">




    @foreach ($data as $key => $item)
        <div class="row123">
            @if ($key % 2 === 0)
                <div class="col123 d-flex justify-content-center ">

                    <img src="{{ asset($item->image) }}" alt="Image" class="services-image">
                </div>
                <div class="col123 {!! $key % 2 ? 'description' : 'image' !!}">
                    <div class="services-title">{!! $item->title !!}</div>
                    <p class="services-description">{!! $item->description !!}</p>
                    <div
                        @isset($enabled) class=" d-flex justify-content-start" @else class="d-none"
                     @endisset>
                        <a href="{{ route('enquiry.form') }}" type="button"
                            class="btn text-light enroll-button ">Enroll now</a>
                    </div>
                </div>
            @else
                <div class="col123 services-background ">
                    <div class="services-title text-end">{{ $item->title }}</div>
                    <p class="services-description text-end">{!! $item->description !!}</p>
                    <div
                        @isset($enabled) class=" d-flex justify-content-end" @else class="d-none"
                     @endisset>
                        <a href="{{ route('enquiry.form') }}" type="button"
                            class="btn text-light enroll-button ">Enroll now</a>
                    </div>
                </div>
                <div class="col123 services-background d-flex justify-content-center ">
                    <img src="{{ asset($item->image) }}" alt="Image" class="services-image">
                </div>
            @endif
        </div>
    @endforeach
    <div class="arrow">
        <img src="{{ asset('img/arrow.png') }}" alt="">
    </div>
    <div class="dotted"></div>



</div>

<div class="container-fluid container-card">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-4 ">

        @foreach ($data as $item)
            <div class="col d-flex justify-content-center">
                <div class="card services-card ">
                    <img src="{{ asset($item->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title services-title">{!! $item->title !!}</h5>
                        <p class="card-text services-description">{!! $item->description !!}</p>
                    </div>
                </div>
            </div>
        @endforeach


    </div>

</div>


<script>
    const arrow = document.querySelector('.arrow');
    const section = document.querySelector('.container-services');
    let sectionTop = section.offsetTop - 200;
    let sectionHeight = section.offsetHeight;
    let windowHeight = window.innerHeight;

    function scrollHandler() {
        const scrollPosition = window.scrollY;
        const sectionBottom = sectionTop + sectionHeight;
        const isSectionVisible = scrollPosition + windowHeight > sectionTop && scrollPosition < sectionBottom;

        if (isSectionVisible) {
            let scrollPercentage = ((scrollPosition - sectionTop) / sectionHeight) * 100;
            scrollPercentage = Math.max(0, Math.min(100, scrollPercentage)); // Clamp between 0 and 100
            arrow.style.top = `${scrollPercentage}%`;

        }
    }

    document.addEventListener('scroll', scrollHandler);
</script>
