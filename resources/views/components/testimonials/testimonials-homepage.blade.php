@props(['data1', 'data2'])
<style>
    .testimonial {
        margin: 50px 0px 0px;
        width: 100%;
        height: 720px;
        background: linear-gradient(180deg, rgba(250, 25, 25, 0.2) 64.92%, rgba(117, 164, 255, 0.2) 110.38%);

    }

    .testimonial1 {
        margin: 50px 0px 0px;
        width: 100%;
        height: 870px;
        background: linear-gradient(180deg, rgba(250, 25, 25, 0.2) 64.92%, rgba(117, 164, 255, 0.2) 110.38%);

    }

    .agency-bottom-image {
        position: absolute;
        bottom: 0;
        width: 100%;
        z-index: -1;

        object-fit: fill;

    }

    .testimonial-success {
        text-align: center;
        font-size: 41px;
        font-weight: 700;
        line-height: 57.42px;
        padding: 15px 0px;


    }

    .testimonial-card {
        border-radius: 25px;
    }

    @media screen and (max-width:1024px) {
        .testimonial {
            height: 870px;
        }
    }
</style>


@if ($data1->count() < 3)
    <div class="container-fluid testimonial1 pt-1">
        <x-section-logo.section-logo name="Our Testimonials"
            description="At Momentum Education Experts, we pride ourselves on delivering exceptional services to students." />
        <div class="row align-items-center  d-xl-none d-block ">
            <div class="container">
                <div class="position-relative">
                    <!-- Slider main container -->
                    <div class="swiper mySwiper-RANDOMID position-relative">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper mb-5">
                            <!-- Slides -->
                            @foreach ($data1 as $item)
                                <x-testimonials.testimonials-card :testimonial="$item" />
                            @endforeach
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-center ">
            <div class="container">
                <div class="position-relative d-xl-none d-block">
                    <!-- Slider main container -->
                    <div class="swiper mySwiper-RANDOMID position-relative">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper mb-5">
                            <!-- Slides -->
                            @foreach ($data1 as $item)
                                <x-testimonials.testimonials-card :testimonial="$item" />
                            @endforeach
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="container-fluid testimonial pt-1">
        <x-section-logo.section-logo name="Our Testimonials"
            description="At Momentum Education, we pride ourselves on delivering exceptional services to students." />
        <div class="row align-items-center  d-xl-none d-block ">
            <div class="container">
                <div class="position-relative">
                    <!-- Slider main container -->
                    <div class="swiper mySwiper-RANDOMID position-relative">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper mb-5">
                            <!-- Slides -->
                            @foreach ($data1 as $item)
                                <x-testimonials.testimonials-card :testimonial="$item" />
                            @endforeach
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-none d-xl-block mt-5">
            <x-testimonials.testimonial-shuffle :testimonials1="$data1" :testimonials2="$data2" />
        </div>
    </div>
@endif






<!-- lazily load the Swiper CSS file -->
<link rel="preload" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" as="style"
    onload="this.onload=null;this.rel='stylesheet'">

<!-- lazily load the Swiper JS file -->
<script defer="defer" src="https://unpkg.com/swiper@8/swiper-bundle.min.js" onload="initializeSwiperRANDOMID();">
</script>

<!-- lc-needs-hard-refresh -->
<script>
    function initializeSwiperRANDOMID() {
        // Launch SwiperJS  
        const swiper = new Swiper(".mySwiper-RANDOMID", {
            slidesPerView: 1,
            grabCursor: true,
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
            },
        });
    }
</script>
