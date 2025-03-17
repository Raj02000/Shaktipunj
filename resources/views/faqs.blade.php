@extends('layouts.main')

@section('content')
    <main id="content" class="site-main">
        <!-- Inner Banner html start-->
        <section class="inner-banner-wrap">
            <div class="inner-baner-container" style="background-image: url(assets/images/inner-banner.jpg);">
                <div class="container">
                    <div class="inner-banner-content">
                        <h1 class="inner-title">Faq</h1>
                    </div>
                </div>
            </div>
            <div class="inner-shape"></div>
        </section>
        <!-- Inner Banner html end-->
        <!-- faq html start -->
        <div class="faq-page-section">
            <div class="container">
                <div class="faq-page-container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="faq-content-wrap">
                                <div class="section-heading">
                                    <h5 class="dash-style">ANY QUESTIONS</h5>
                                    <h2>FREQUENTLY ASKED QUESTIONS</h2>
                                    <p>Aperiam sociosqu urna praesent, tristique, corrupti condimentum asperiores platea
                                        ipsum ad arcu. Nostrud. Esse? Aut nostrum, ornare quas provident laoreet nesciunt
                                        odio voluptates etiam, omnis.</p>
                                </div>
                                <div class="accordion" id="accordionOne">
                                    @foreach ($faqs as $faq)
                                        <div class="card">
                                            <div class="card-header" id="headingOne-{{ $faq->id }}">
                                                <h4 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-toggle="collapse"
                                                        data-target="#collapseOne-{{ $faq->id }}" aria-expanded="true"
                                                        aria-controls="collapseOne-{{ $faq->id }}">
                                                        {{ $faq->question }}
                                                    </button>
                                                </h4>
                                            </div>
                                            <div id="collapseOne-{{ $faq->id }}" class="collapse"
                                                aria-labelledby="headingOne-{{ $faq->id }}"
                                                data-parent="#accordionOne">
                                                <div class="card-body">
                                                    {{ $faq->answer }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="qsn-form-container">
                                <h3>STILL HAVE A QUESTION?</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullam
                                    corper</p>
                                <form>
                                    <p>
                                        <input type="text" name="name" placeholder="Your Name*">
                                    </p>
                                    <p>
                                        <input type="email" name="email" placeholder="Your Email*">
                                    </p>
                                    <p>
                                        <input type="number" name="number" placeholder="Your Number*">
                                    </p>
                                    <p>
                                        <textarea rows="8" placeholder="Enter your message"></textarea>
                                    </p>
                                    <p>
                                        <input type="submit" name="submit" value="SUBMIT QUESTIONS">
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- faq html end -->
    </main>
@endsection
