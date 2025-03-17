<section id="about-6" class="bg-scroll pt-100 about-section division">
    <div class="container white-color">
        <div class="row d-flex align-items-center">
            <!-- ABOUT IMAGE -->
            <div class="col-lg-6">
                <div class="about-6-img text-center">
                    <img class="img-fluid" src="images/image-08.png" alt="about-image" />
                </div>
            </div>


            <!-- ABOUT TEXT -->
            <div class="col-lg-6">
                <div class="about-6-txt pc-20">

                    <!-- Section ID -->
                    <span class="section-id id-color">Overseas Education</span>

                    <!-- Title -->
                    <h2 class="h2-xs">Looking for Quality Abroad Education?</h2>

                    <!-- Text -->
                    <p class="p-md">
                        Discover the best opportunities for studying abroad with Momentum Consultancy. We guide you
                        through selecting the right university and course tailored to your aspirations. With our
                        extensive network and expertise, we ensure you receive the highest quality education that aligns
                        with your career goals. Explore new cultures, expand your horizons, and gain an international
                        qualification that sets you apart.
                    </p>

                    <!-- Small Title -->
                    <h5 class="h5-lg">350+ Universities in 17 Countries:</h5>

                    <!-- Flags list -->
                    <ul class="flags-list">
                        @for ($i = 0; $i < 4; $i++)
                            <li style="width:60px; height:40px;"><a
                                    href="{{ route('page.abroad.details', $destinationsNav[$i]->slug) }}"><img
                                        src="{{ $destinationsNav[$i]->flag }}" alt="flag"
                                        style="width: 100%; height: 100%; object-fit:cover;" /><span>{{ $destinationsNav[$i]->name }}</span></a>
                            </li>
                        @endfor

                    </ul>

                </div>
            </div> <!-- END ABOUT TEXT -->


        </div> <!-- End row -->
    </div> <!-- End container -->
</section> <!-- END ABOUT-6 -->
