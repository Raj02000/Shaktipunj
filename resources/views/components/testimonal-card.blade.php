@props(['image', 'name', 'title' => '', 'testimonial'])


<div class="review-1">

    <!-- Testimonial Author -->
    <div class="author-data clearfix">

        <!-- Author Avatar -->
        <div class="testimonial-avatar">
            <img src="{{ $image }}" alt="testimonial-avatar">
        </div>

        <!-- Author Data -->
        <div class="review-author">
            <h5 class="h5-sm">{{ $name }}</h5>
            <span>{{ $title }}</span>
        </div>

    </div> <!-- End Testimonial Author -->

    <!-- Testimonial Text -->
    <p>{{ $testimonial }}
    </p>

</div>
