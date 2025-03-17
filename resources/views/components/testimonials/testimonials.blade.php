@props(['data'])
<style>
    .testimonial {
        position: relative;
        margin: 50px 0px 0px;
        height: 550px;
        overflow: hidden;


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

    @media screen and (max-width:500px) {
        .testimonial {
            height: 600px;
        }

    }
</style>
<div class="container-fluid testimonial">


    <div class="testimonial-success pb-5"> Our Success Stories</div>
    <div class="row align-items-center  ">
        <div class="container">
            <div class="position-relative">

                <!-- Slider main container -->
                <div class="swiper mySwiper-RANDOMID position-relative">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper mb-5">
                        <!-- Slides -->
                        @foreach ($data as $item)
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
