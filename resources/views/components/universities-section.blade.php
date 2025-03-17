@props(['destinations'])


<!-- BRANDS-3 ============================================= -->
<section id="brands-3" class="wide-80 brands-section division">
    <div class="container">


        <!-- SECTION TITLE -->
        <div class="row">
            <div class="col-md-12 section-title center">

                <!-- Title -->
                <h2 class="h2-xs">Partner Institutes & Universities</h2>

                <!-- Text -->
                <p class="p-md">
                    We collaborate with a network of prestigious institutes and universities worldwide to offer you a
                    diverse range of high-quality educational opportunities.
                </p>

            </div>
        </div> <!-- END SECTION TITLE -->


        <!-- BRANDS FILTERING BUTTONS -->
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="brands-filter mb-50">
                    <button data-filter="*" class="is-checked"> All Countries</button>
                    @foreach ($destinations as $destination)
                        <button data-filter=".{{ $destination->slug }}">{{ $destination->name }}</button>
                    @endforeach
                </div>
            </div>
        </div>


        <!-- BRANDS HOLDER -->
        <div class="row">
            <div class="col-md-12 brands-list">
                <div class="masonry-wrap grid-loaded hover-primary">
                    @foreach ($destinations as $destination)
                        @foreach ($destination->universities as $university)
                            <div class="brand-3 {{ $destination->slug }}">
                                <div class="brand-logo">
                                    <a href="{{ $university->link }}" style="width: 150px; height: 100px;"><img
                                            class="img-fluid" src="{{ asset($university->image) }}" alt="brand-logo"
                                            style="height: 100%; width: 100%; object-fit: cover;" /></a>
                                    <p class="p-sm">{{ $university->name }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endforeach

                </div>
            </div>
        </div> <!-- END BRANDS HOLDER -->


    </div> <!-- End container -->
</section> <!-- END BRANDS-3 -->
