@props(['altColor' => false, 'about'])
<section id="about-2" class="{{ $altColor ? 'bg-lightgrey ' : '' }} wide-60 about-section division">
    <div class="container">
        <div class="row d-flex align-items-center">


            <!-- ABOUT IMAGE -->
            <div class="col-md-6">
                <div class="about-img text-center mb-40">

                    <!-- Image -->
                    <img class="img-fluid" src="{{ asset($about->image) }}" alt="about-image" />

                    <!-- Video Link -->
                    <div class="video-square">
                        <div class="video-link icon-lg primary-color">
                            <a class="video-popup2" href="{{ $about->video }}">
                                <span class="flaticon-159-play-button"></span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <!-- ABOUT TEXT	-->
            <div class="col-md-6">
                <div class="about-2-txt pc-20 mb-40">


                    <!-- Section ID -->
                    <span class="section-id id-color">About Momentum</span>

                    <!-- Title -->
                    <h3 class="h3-lg">{{ $about->title }}</h3>

                    {!! $about->description !!}



                </div>
            </div> <!-- END ABOUT TEXT	-->


        </div> <!-- End row -->
    </div> <!-- End container -->
</section> <!-- END ABOUT-2 -->

@section('js')
    <script>
        $(".video-popup2").magnificPopup({
            type: "iframe",
            iframe: {
                patterns: {
                    youtube: {
                        index: "youtube.com",
                        src: "{{ str_replace('watch?v=', 'embed/', $about->video) }}",
                    },
                },
            },
        });
    </script>
@endsection
