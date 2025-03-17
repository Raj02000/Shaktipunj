@props(['courses'])


<style>
    .popular-courses-section {
        max-width: 100%;
        background: linear-gradient(to top, rgba(255, 255, 255, 1), rgba(115, 115, 115, 0.4));
        margin-bottom: 10px;
        height: 525px;
    }

    .popular-courses-images {
        position: relative;
    }

    .popular-courses-image1 {
        position: absolute;
        max-width: 100%;
        width: 372px;
        height: 406px;
        background: rgba(232, 21, 21, 0.7);
        border-radius: 0px 147px 0px 0px;
        box-shadow: 0px -13px 4px 0px rgba(0, 0, 0, 0.25);
    }

    .popular-courses-image2 {
        position: absolute;
        max-width: 100%;
        width: 373px;
        height: 406px;
        object-fit: cover;
        top: 15px;
        left: 17px;
        border-radius: 0px 147px 0px 0px;
    }

    .course-name {
        font-size: 20px;
        font-weight: 350;
    }

    @media only screen and (max-width: 576px) {
        .course-name {
            font-size: 17px;
            font-weight: 350;
        }

        .popular-courses-section {
            height: fit-content;
        }
    }
</style>

<div class="section-topic py-4 text-center">Popular Courses</div>
<div class="popular-courses-section py-5">
    <div class="container px-5">
        <div class="row">
            <div class="col-5 d-none d-md-block">
                <div class="popular-courses-images">
                    <div class="popular-courses-image1"></div>
                    <img class="popular-courses-image2" src="{{ asset('img/coursesimage.png') }}" alt="">
                </div>
            </div>
            <div class="col-md-7 px-2">

                <div class="accordion accordion-flush" id="accordionFlushExample2">
                    @foreach ($courses as $course)
                        <div>
                            <div class="accordion-item border border-dark-subtle rounded my-2">
                                <h2 class="accordion-header">

                                    <button class="accordion-button collapsed course-name" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush2-collapse{{ $loop->index }}"
                                        aria-expanded="false" aria-controls="flush2-collapse{{ $loop->index }}">
                                        <i style="color: rgba(255, 204, 0, 1);" class="fa-solid fa-star pe-3"></i>
                                        {{ $course->name }}
                                    </button>
                                </h2>

                                <div id="flush2-collapse{{ $loop->index }}" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample2">
                                    <div class="accordion-body">
                                        <ul>
                                            @foreach (json_decode($course->universities) as $description)
                                                <li>
                                                    {{ $description }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>
