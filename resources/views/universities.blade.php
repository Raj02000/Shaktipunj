@extends('layouts.main')


@section('css')
    <title>Momentum - universities</title>
    <x-meta title="Momentum - universities" :url="url()->full()" />
@endsection

@section('content')
    <!-- INNER PAGE WRAPPER ============================================= -->
    <div class="inner-page-wrapper">

        <!-- BREADCRUMB ============================================= -->
        <div id="breadcrumb" class="bg-darkblue division">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb white-color">
                                <li class="breadcrumb-item"><a href="/">&#91; Home &#93;</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Our Universities</li>
                            </ol>
                        </nav>
                    </div>
                </div> <!-- End row -->
            </div> <!-- End container -->
        </div> <!-- END BREADCRUMB -->


        <x-universities-section :destinations="$destinations" />

        <x-abroad-eduction-section />
    </div>
@endsection
