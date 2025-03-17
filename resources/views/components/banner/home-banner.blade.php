@props(['banners'])

@foreach ($banners as $banner)
    <!-- SLIDE #1 -->
    <li>

        <!-- Background Image -->
        <img src="{{ asset($banner->image) }}" alt="slide-background">

        <!-- Image Caption -->
        <div class="caption d-flex align-items-center center-align">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="caption-txt white-color">

                            <!-- Title -->
                            <h5 class="h5-xl">{{ $banner->sub_title }}</h5>
                            <h2>{{ $banner->title }}</h2>

                            <!-- Text -->
                            <p class="p-md">
                                {{ $banner->description }}
                            </p>

                            <!-- Button -->
                            <a href="{{ route('page.contactUs') }}"
                                class="btn btn-md btn-primary tra-white-hover btn-arrow">
                                <span>Enquiry Now<i class="fas fa-arrow-right"></i></span>
                            </a>

                        </div>
                    </div>
                </div> <!-- End row -->
            </div> <!-- End container -->
        </div> <!-- End Image Caption -->

    </li>
@endforeach
