@props(['tests', 'name', 'courses'])

<style>
    .section-topic {
        font-size: 41px;
        font-weight: 700;
        line-height: 57.42px;
    }

    .student-image {
        max-width: 100%;
        object-fit: cover;
    }

    .test-title {
        font-size: 30px;
        font-weight: 700;
        line-height: 42.01px;
        text-align: left;

    }

    @media only screen and (max-width: 968px) {
        .section-topic {
            font-size: 30px;
            font-weight: 700;
            text-align: center;
        }

        .test-title {
            font-size: 20px;
            font-weight: 700;
            line-height: 42.01px;
            text-align: left;

        }
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-6 accordion accordion-flush" id="accordionFlushExample">
            <div class="section-topic mb-5">Tests Required to Study in {{ $name }}</div>
            @foreach ($courses as $course)
                <div class="accordion-item">
                    <h2 class="accordion-header">

                        <button class="accordion-button collapsed test-title" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse{{ $loop->index }}" aria-expanded="false"
                            aria-controls="flush-collapse{{ $loop->index }}">
                            {{ $course->name }}
                        </button>
                    </h2>

                    <div id="flush-collapse{{ $loop->index }}" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            {{ $course->description }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-lg-6 text-end d-none d-lg-block">
            <img class="student-image" src="{{ asset('img/student-image.png') }}" alt="">
        </div>
    </div>
</div>
