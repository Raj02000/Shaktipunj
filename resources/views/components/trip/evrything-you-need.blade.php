@props(['name'])

<div class="page-section2 pt-5">

    <p class="text-center section-topic mb-5">Everything you need for your
        {{ $name }} Dream
    </p>
    <div class="container mb-0">
        <div class="row px-sm-4 gap-5 gap-lg-0 px-5 d-flex justify-content-center">

            <div class="col-sm-5 col-lg mx-lg-3 text-center bg-light pt-4 px-xl-3 shadow-sm rounded-2">
                <x-cards.services-card image='visa.png' title='Personalized <br> Guidance'
                    description="Plan of action customised for your interests and
                                goals" />
            </div>

            <div class="col-sm-5 col-lg mx-lg-3 text-center bg-light pt-4 px-xl-3 shadow-sm rounded-2">
                <x-cards.services-card image='ielts.png' title='IELTS <br> Coaching'
                    description="Get online IELTS training by India’s top trainers" />
            </div>

            <div class="col-sm-5 col-lg mx-lg-3 text-center bg-light pt-4 px-xl-3 shadow-sm rounded-2">
                <x-cards.services-card image='university.png' title='University <br> Shortlist'
                    description="Get a personalised list of university and courses
                            based on your profile" />
            </div>

            <div class="col-sm-5 col-lg mx-lg-3 text-center bg-light pt-4 px-xl-3 shadow-sm rounded-2">
                <x-cards.services-card image='visaassurance.png' title='Visa <br> Assurance'
                    description="Our visa counsellors help you get an admit with 98%
                            success rate" />
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <a class="my-5" href="{{ route('contact') }}">
                <button class="button-gradient py-2 px-3 w-auto rounded-pill">Get
                    Enquiry</button>
            </a>
        </div>
    </div>
</div>
