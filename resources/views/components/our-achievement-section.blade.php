@props(['achievements'])

<div id="statistic-3" class="bg-image bg-scroll wide-60 statistic-section division">
    <div class="container white-color">

        <!-- STATISTIC 3 TITLE -->
        <div class="row">
            <div class="col-md-12">
                <div class="statistic-3-title primary-border">
                    <h3 class="h3-lg">Hundreds Of People Choose Our Services</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="row">


                    @foreach ($achievements as $achievement)
                        <div class="col-sm-6 col-md-3">
                            <div class="statistic-block icon-sm">

                                <!-- Text -->
                                <h5 class="yellow-color"><span
                                        class="count-element">{{ $achievement->value }}</span>{{ $achievement->postfix }}
                                </h5>
                                <p>{{ $achievement->title }}</p>

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div> <!-- End row -->
    </div> <!-- End container -->
</div>
