<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .count-heading {
            font-size: 32px;
            font-weight: 700;
            line-height: 44.81px;
            text-align: left;
        }

        .count-subheading {
            font-size: 16px;
            font-weight: 400;
            line-height: 22.41px;
            text-align: left;
            margin-top: 20px;
        }

        .section-count {
            margin: 0px 20% 0px 0px;
        }

        .section-position {
            position: relative;
        }

        .section-absolute {
            position: absolute;
            bottom: 12%;
            left: 15%;
        }

        .section-image-count-1 {
            width: 45%;
            height: 246px;
            gap: 0px;
        }

        .section-image-count-2 {
            width: 45%;
            height: 170px;
            border-radius: 30px;
        }

        .section-image-count-4 {
            margin-top: -50px;
        }

        .section-image-count-3 {
            margin-top: 20px;
        }

        .image-count-1 {
            height: 100%;
            width: 100%;
            object-fit: cover;
            border-radius: 30px;
            overflow: hidden;
        }

        .image-count-3 {
            background: #913E3E;
        }

        .counter-number {
            font-size: 32px;
            font-weight: 700;
            text-align: left;
            color: white;
        }

        .counter-description {
            font-size: 21px;
            font-weight: 600;
            line-height: 29.41px;
            text-align: left;
            color: white;
            margin: 0px 5% 0px -5%;
        }

        .section-banners-image {
            position: relative;
            margin: 5% 0px;
        }

        .section-sun-image {
            position: absolute;
            bottom: 0;
            left: 0;
        }

        .section-airplane1-image {
            position: absolute;
            bottom: -75px;
            left: 0;
        }

        .section-airplane2-image {
            position: absolute;
            bottom: 11%;
            left: 25%;
        }

        .section-airplane3-image {
            position: absolute;
            bottom: 50%;
            left: 66%;
        }

        @media screen and (max-width:1200px) {

            .section-airplane2-image {
                display: none;
            }

            .section-airplane3-image {
                display: none;
            }
        }

        @media screen and (max-width:991px) {
            .section-count {
                margin: 0px 0% 0px 0px;
            }

            .section-image-count {
                width: 100%;
                height: auto;
            }

            .section-image-count-2 {
                height: 160px;
                border-radius: 30px;
            }

            .section-image-count {
                margin-top: 30px;
            }

            .section-airplane1-image {
                position: absolute;
                bottom: -120px;
                left: 0;
            }

            .counter-description {
                font-size: 19px;
                font-weight: 600;
                text-align: left;
                color: white;
                margin: 0px 5% 0px -5%;
            }

            .section-absolute {
                bottom: 12%;
                left: 15%;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid section-banners-image">
        <div class="section-sun-image">
            <img src="{{ asset('img/sun.png') }}" alt="">
        </div>
        <div class="section-sun-image d-none d-sm-block">
            <img src="{{ asset('img/vector-line.png') }}" width="100%" alt="">
        </div>
        <div class="section-airplane1-image d-none d-sm-block">
            <img src="{{ asset('img/airplane-half.png') }}" alt="">
        </div>
        <div class="section-airplane2-image d-none d-sm-block">
            <img src="{{ asset('img/airplane-gif.gif') }}" height="160px" alt="">
        </div>
        <div class="section-airplane3-image d-none d-sm-block">
            <img src="{{ asset('img/airplane-half.png') }}" height="160px" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-12">
                    <div class="section-count container">
                        <div class="count-heading">
                            {{ $data['value'] }}
                        </div>
                        <div class="count-subheading">
                            {!! $data->extra['descriptions'] !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-sm-12">
                    <div class="section-image-count">
                        <div class="row d-flex justify-content-evenly">
                            @isset($data->extra['sections'])
                                @foreach ($data->extra['sections'] as $index => $section)
                                    @if ($index > 4)
                                    @break
                                @endif
                                @if ($index == 0 || $index == 3)
                                    <div class="col-lg-6 col-sm-12 section-image-count-1 section-position">
                                        @isset($data->extra['images'][$index])
                                            <img src="{{ asset($data->extra['images'][$index]) }}" class="image-count-1"
                                                alt="">
                                        @else
                                            @isset($data->extra['images'][0])
                                                <img src="{{ asset($data->extra['images'][0]) }}" class="image-count-1"
                                                    alt="">
                                            @else
                                                <img src="{{ asset('img/count-1.png') }}" class="image-count-1" alt="">
                                            @endisset
                                        @endisset
                                        <div class="section-absolute">
                                            <div class="counter-number counter-number{{ $index + 1 }}"></div>
                                            <div class="counter-description">{!! $section['id'] !!}</div>
                                        </div>
                                    </div>
                                @elseif ($index == 1 || $index == 2)
                                    <div class="col-lg-6 col-sm-12 section-image-count-2 section-position">
                                        @isset($data->extra['images'][$index])
                                            <img src="{{ asset($data->extra['images'][$index]) }}"
                                                class="image-count-1 mt-4" alt="">
                                        @else
                                            @isset($data->extra['images'][1])
                                                <img src="{{ asset($data->extra['images'][1]) }}" class="image-count-1 mt-4"
                                                    alt="">
                                            @else
                                                <img src="{{ asset('img/count-2.png') }}" class="image-count-1 mt-4"
                                                    alt="">
                                            @endisset
                                        @endisset
                                        <div class="section-absolute">
                                            <div class="counter-number counter-number{{ $index + 1 }}"></div>
                                            <div class="counter-description">{!! $section['id'] !!}</div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function startCounter(targetElement, endValue) {
        let currentValue = 0;
        const increment = Math.ceil(endValue / 100); // Divide the end value by 100 for a smoother animation

        const interval = setInterval(() => {
            if (currentValue >= endValue) {
                clearInterval(interval);
                currentValue = endValue;
            }

            targetElement.textContent = currentValue + "+";
            currentValue += increment;
        }, 20);
    }

    // Usage
    const counterElement1 = document.querySelector('.counter-number1');
    const counterElement2 = document.querySelector('.counter-number2');
    const counterElement3 = document.querySelector('.counter-number3');
    const counterElement4 = document.querySelector('.counter-number4');

    @isset($data->extra['sections'])
        const sections = {!! json_encode($data->extra['sections']) !!};
        const counters = [{
                element: counterElement1,
                value: sections[0].detail
            },
            {
                element: counterElement2,
                value: sections[1].detail
            },
            {
                element: counterElement3,
                value: sections[2].detail
            },
            {
                element: counterElement4,
                value: sections[3].detail
            }
        ];
    @else
        const counters = [{
                element: counterElement1,
                value: 9999
            },
            {
                element: counterElement2,
                value: 200
            },
            {
                element: counterElement3,
                value: 245
            },
            {
                element: counterElement4,
                value: 320
            }
        ];
    @endisset

    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    function handleIntersection(entries, observer) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = counters.find(c => c.element === entry.target);
                if (counter) {
                    startCounter(counter.element, counter.value);
                }
                observer.unobserve(entry.target);
            }
        });
    }

    const observer = new IntersectionObserver(handleIntersection, observerOptions);
    counters.forEach(counter => {
        observer.observe(counter.element);
    });
</script>
</body>

</html>
