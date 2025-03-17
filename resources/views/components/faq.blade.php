@props(['data'])

<style>
    .faq-text {
        font-size: 24px;
        font-weight: 400;
    }

    .faq-index {
        font-size: 24px;
        font-weight: 500;
        color: rgba(191, 30, 46, 1);
    }

    .faq-title {
        font-size: 45px;
        font-weight: 600;
    }

    .faq-contact {
        font-size: 18px;
        font-weight: 500;
        color: rgba(191, 30, 46, 1);
    }


    .faq-desc {
        font-size: 18px;
        font-weight: 400;
    }

    @media only screen and (max-width: 576px) {

        .faq-title {
            font-size: 35px;
        }

        .faq-text {
            font-size: 15px;
        }

        .faq-index {
            font-size: 18px;
        }

        .faq-desc {
            font-size: 12px;
        }

    }
</style>

<div class="container my-5 py-3 px-sm-5">
    <div class="row">
        <div class="col-lg-5">
            <div class="faq-title">Frequently <br> asked questions</div>
            <div class="faq-contact mt-3">Contact us For More Info</div>
        </div>
        <div class="col-lg-7">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                @foreach ($data as $faq)
                    <div class="accordion-item m">
                        <h2 class="accordion-header">
                            <button class="accordion-button faq-text py-4 collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $loop->index }}"
                                aria-expanded="false" aria-controls="flush-collapse{{ $loop->index }}">
                                <div class="pe-4 faq-index">0{{ $loop->index + 1 }}</div>
                                {{ $faq->question }}
                            </button>
                        </h2>
                        <div id="flush-collapse{{ $loop->index }}" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body faq-desc">{{ $faq->answer }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
