@props(['testimonials1', 'testimonials2'])
<style>
    .shuffle-body {}

    .con {
        position: relative;
    }

    .box {
        position: absolute;
        transition: z-index 0.5s ease, opacity 0.5s ease, margin-top 0.5s ease, transform 0.5s ease;
        opacity: 1;
    }

    .group1 #box1,
    .group2 #box1 {
        z-index: 1;
        margin-top: 50px;
        margin-left: 100px;


    }

    .group1 #box2,
    .group2 #box2 {
        margin-top: 25px;
        margin-left: 50px;
        z-index: 2;

    }

    .group1 #box3,
    .group2 #box3 {
        z-index: 3;

    }

    .testimonial-image1 {
        position: absolute;
        top: -30px;
        left: -25px;
        width: 70px;
        height: 70px;
        overflow: hidden;
        border-radius: 50%;
    }

    .testimonial-image1 img {

        width: 70px;
        height: 70px;
        object-fit: cover;
    }

    .message-div {
        position: relative;
        margin-left: 30px;
        margin-top: -20px;
        padding-top: 35px;
        height: 250px;
        color: rgba(94, 98, 130, 1);
        width: 520px;
        background: rgba(255, 255, 255, 1);
        border-radius: 10px;
    }

    .message-content {
        font-size: 16px;
        font-weight: 500;
        height: 130px;
    }

    .writer-name {
        font-size: 18px;
        font-weight: 600;

    }

    .writer-info {
        font-size: 14px;
        font-weight: 500;
    }
</style>

<div class="shuffle-body row">
    <div class="con group1 col-6 d-flex justify-content-center" id="container1">
        @foreach ($testimonials1 as $index => $testimonial)
            <div class="box" id="box{{ $index + 1 }}">
                <div class="message-div px-5 shadow">
                    <div class="testimonial-image1">
                        <img class="img-fluid" src="{{ asset($testimonial->image) }}">
                    </div>
                    <div class="message-content">
                        "{!! $testimonial->message !!}"
                    </div>
                    <div class="writer-name">
                        {{ $testimonial->name }}
                    </div>
                    <div class="writer-info">
                        {{ $testimonial->qualification }}, {{ $testimonial->university_name }}
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <div class="con group2 col-6 d-flex justify-content-center" id="container2">
        @foreach ($testimonials2 as $index => $testimonial)
            <div class="box" id="box{{ $index + 1 }}">
                <div class="message-div px-5 shadow">
                    <div class="testimonial-image1">
                        <img class="img-fluid" src="{{ asset($testimonial->image) }}">
                    </div>
                    <div class="message-content">
                        "{!! $testimonial->message !!}"
                    </div>
                    <div class="writer-name">
                        {{ $testimonial->name }}
                    </div>
                    <div class="writer-info">
                        {{ $testimonial->qualification }}, {{ $testimonial->university_name }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        function shuffleBoxes(containerId) {
            const boxes = document.querySelectorAll(`#${containerId} .box`);
            let currentIndex = 0;

            setInterval(() => {
                boxes.forEach((box, index) => {
                    box.style.opacity = 1;
                    box.style.transform = 'translateY(0)';
                    if (index === currentIndex) {
                        box.style.zIndex = 3;
                        box.style.marginTop = '0px';
                        box.style.marginLeft = '0px';
                    } else if ((index + 2) % boxes.length === currentIndex) {
                        box.style.zIndex = 2;
                        box.style.marginTop = '25px';
                        box.style.marginLeft = '50px';
                    } else {
                        box.style.zIndex = 1;
                        box.style.marginTop = '50px';
                        box.style.marginLeft = '100px';
                    }
                });
                let previousIndex = (currentIndex - 1 + boxes.length) % boxes.length;
                currentIndex = (currentIndex + 1) % boxes.length;
            }, 3000);
        }

        shuffleBoxes('container1');
        shuffleBoxes('container2');
    });
</script>
