@props(['mission', 'vision', 'director-message'])

<!-- TABS-2                                                                                                                                                                                                                                                                                                                                                                                                                   ============================================= -->
<section id="tabs-2" class="wide-60 tabs-section division">
    <div class="container">
        <div class="row">


            <!-- TABS NAVIGATION -->
            <div class="col-md-12">
                <div class="tabs-nav clearfix">
                    <ul class="tabs-2 primary-tabs">

                        <!-- TAB-1 LINK -->
                        <li class="tab-link displayed" data-tab="tab-11">
                            <span>Our Mission</span>
                        </li>

                        <!-- TAB-2 LINK -->
                        <li class="tab-link" data-tab="tab-12">
                            <span>Our Vision</span>
                        </li>

                        <!-- TAB-3 LINK -->
                        <li class="tab-link" data-tab="tab-13">
                            <span>Message from Director</span>
                        </li>

                    </ul>
                </div>
            </div> <!-- END TABS NAVIGATION -->


            <!-- TABS CONTENT -->
            <div class="col-md-12">
                <div class="tabs-content">


                    <!-- TAB-1 CONTENT -->
                    <div id="tab-11" class="tab-content displayed">
                        <div class="row d-flex align-items-center">


                            <!-- TAB-1 IMAGE -->
                            <div class="col-md-6 mb-40">
                                <div class="tab-img text-center">
                                    <img class="img-fluid" src="{{ asset($mission->image) }}" alt="tab-image" />
                                </div>
                            </div>


                            <!-- TAB-1 TEXT -->
                            <div class="col-md-6">
                                <div class="txt-block pc-20 mb-40">

                                    <!-- Section ID -->
                                    {{-- <span class="section-id id-color">Getting a visa</span> --}}

                                    <!-- Title -->
                                    <h3 class="h3-lg">{{ $mission->title }}</h3>

                                    {!! $mission->description !!}
                                </div>
                            </div>


                        </div> <!-- End row -->
                    </div> <!-- END TAB-1 CONTENT -->


                    <!-- TAB-2 CONTENT -->
                    <div id="tab-12" class="tab-content">
                        <div class="row d-flex align-items-center">


                            <!-- TAB-2 IMAGE -->
                            <div class="col-md-6">
                                <div class="tab-img text-center mb-40">
                                    <img class="img-fluid" src="{{ asset($vision->image) }}" alt="tab-image" />
                                </div>
                            </div>


                            <!-- TAB-2 TEXT -->
                            <div class="col-md-6">
                                <div class="txt-block pc-20 mb-40">

                                    <!-- Section ID -->
                                    {{-- <span class="section-id id-color">We love our clients</span> --}}

                                    <!-- Title -->
                                    <h3 class="h3-lg">{{ $vision->title }}</h3>
                                    {!! $vision->description !!}
                                </div>
                            </div>


                        </div> <!-- End row -->
                    </div> <!-- END TAB-2 CONTENT -->


                    <!-- TAB-3 CONTENT -->
                    <div id="tab-13" class="tab-content">
                        <div class="row d-flex align-items-center">


                            <!-- TAB-3 IMAGE -->
                            <div class="col-md-6">
                                <div class="tab-img text-center mb-40">
                                    <img class="img-fluid" src="{{ asset($directorMessage->image) }}" alt="tab-image" />
                                </div>


                            </div>


                            <!-- TAB-3 TEXT -->
                            <div class="col-md-6">
                                <div class="txt-block pc-20 mb-40">

                                    <!-- Section ID -->
                                    {{-- <span class="section-id id-color">Message from Director</span> --}}

                                    <!-- Title -->
                                    <h3 class="h3-lg">{{ $directorMessage->title }}</h3>

                                    {!! $directorMessage->description !!}


                                </div>
                            </div>


                        </div> <!-- End row -->
                    </div> <!-- END TAB-3 CONTENT -->


                </div>
            </div> <!-- END TABS CONTENT -->


        </div> <!-- End row -->
    </div> <!-- End container -->
</section> <!-- END TABS-2 -->
