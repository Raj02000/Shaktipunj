@props(['value', 'name' => 'name', 'thumbnail' => 'thumbnail', 'destinations', 'services'])

{{-- @dd($value, $name, $services, $destinations) --}}
<div class="inner-page-wrapper">

    <!-- BREADCRUMB
 ============================================= -->
    <div id="breadcrumb" class="bg-darkblue division">
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb white-color">
                            <li class="breadcrumb-item">
                                <a href="/">&#91;
                                    Home
                                    &#93;</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ $value[$name] }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- End row -->
        </div>
        <!-- End container -->
    </div>
    <!-- END BREADCRUMB -->

    <!-- ABOUT-9
 ============================================= -->
    <section id="about-9" class="wide-60 about-section division">
        <div class="container">
            <div class="row">


                <!-- ABOUT TEXT -->
                <div class="col-lg-8">
                    <div class="about-9-txt mb-40 pr-15">

                        <!-- Image -->
                        <div class="about-9-img mb-40" style="height: 350px;">
                            <img class="img-fluid" src="{{ asset($value[$thumbnail]) }}" alt="about-image"
                                style="height: 100%; width: 100%; object-fit: cover;" />
                        </div>

                        <div class="content-body">
                            {!! $value?->description !!}
                        </div>

                    </div>
                </div>
                <!-- END ABOUT TEXT -->


                <x-service-detail-sidebar :destinations="$destinations" :services="$services" />


            </div>
            <!-- End row -->
        </div>
        <!-- End container -->
    </section>
    <!-- END ABOUT-9 -->

</div>
