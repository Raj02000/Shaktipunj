@props(['testimonals'])

<!-- TESTIMONIALS-1
                                                                                                                                                                                                                                                                                                                                                                                                                                                            ============================================= -->
<section id="reviews-1" class="bg-tra-city bg-lightgrey wide-100 reviews-section division">
    <div class="container">


        <!-- SECTION TITLE -->
        <div class="row">
            <div class="col-md-12 section-title center">

                <!-- Title -->
                <h2 class="h2-xs">What Our Clients Say</h2>

                <!-- Text -->
                <p class="p-md">
                    Our clients rave about the personalized support and seamless experience we provide throughout their
                    study abroad journey.
                </p>

            </div>
        </div> <!-- END SECTION TITLE -->


        <!-- TESTIMONIALS CONTENT -->
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme reviews-holder">

                    @foreach ($testimonals as $testimonial)
                        <div class="review-1">

                            <!-- Testimonial Author -->
                            <div class="author-data clearfix">

                                <!-- Author Avatar -->
                                <div class="testimonial-avatar">
                                    <img src="{{ asset($testimonial->image) }}" alt="testimonial-avatar">
                                </div>

                                <!-- Author Data -->
                                <div class="review-author">
                                    <h5 class="h5-sm">{{ $testimonial->name }}</h5>
                                    <span>({{ $testimonial->qualification }})</span>
                                </div>

                            </div> <!-- End Testimonial Author -->

                            <!-- Testimonial Text -->
                            <p>
                                {{ $testimonial->message }}
                            </p>

                        </div>
                    @endforeach

                </div>
            </div>
        </div> <!-- END TESTIMONIALS CONTENT -->


    </div> <!-- End container -->
</section> <!-- END TESTIMONIALS-1 -->
