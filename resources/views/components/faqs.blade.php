@props(['data'])
<!-- FAQs-1 ============================================= -->
<section id="faqs-1" class="bg-lightgrey wide-100 faqs-section division">
    <div class="container">


        <!-- SECTION TITLE -->
        <div class="row">
            <div class="col-md-12 section-title center">

                <!-- Title -->
                <h2 class="h2-xs darkblue-color">Have Questions? Look Here</h2>

                <!-- Text -->
                <p class="p-md">Find answers to common questions about studying abroad, immigration, and our services,
                    all in one convenient place.</p>

            </div>
        </div> <!-- END SECTION TITLE -->


        <!-- QUESTIONS HOLDER -->
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div id="accordion" role="tablist">

                    @foreach ($data as $faq)
                        @if ($loop->iteration == 1)
                            <x-faq-question :show="true" number="{{ $loop->iteration }}"
                                question="{{ $faq->question }}" answer="{{ $faq->answer }}" />
                        @else
                            <x-faq-question number="{{ $loop->iteration }}" question="{{ $faq->question }}"
                                answer="{{ $faq->answer }}" />
                        @endif
                    @endforeach

                </div> <!-- END ACCORDION -->
            </div> <!-- End col-x -->
        </div> <!-- END QUESTIONS HOLDER -->


        <!-- MORE QUESTIONS BUTTON -->
        <div class="row">
            <div class="col-md-12 text-center more-questions">
                <h5 class="h5-md">Still have a question? <a href="{{ route('page.contactUs') }}"
                        class="darkblue-color">Ask your
                        question here</a></h5>
            </div>
        </div>


    </div> <!-- End container -->
</section> <!-- END FAQs-1 -->
