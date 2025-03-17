@props(['testimonial'])
<style>
    .testimonial-card {
        border-radius: 25px;
    }

    .testimonial-image {
        width: 80px;
        height: 80px;
        overflow: hidden;
        border-radius: 50%;
        border: 1px solid #ccc;
    }

    .testimonial-image img {

        object-fit: cover;
    }
</style>
<div class="swiper-slide lc-block">
    <div class="card testimonial-card p-2">
        <div class="card-body">
            <img src="{{ asset('img/quotation.png') }}" class="mb-3" alt="">
            <div class="lc-block mb-3" style="height: 150px; overflow-y: auto;">
                <div editable="rich">
                    <p><em class="rfs-8 text-muted">{{ $testimonial->message }}
                        </em></p>
                </div>
            </div>
            <div class="lc-block d-flex justify-content-between">

                <div class="lc-block">
                    <div editable="rich">
                        <p class="h5">{{ $testimonial->name }}</p>
                        <p class="text-muted">{{ $testimonial->qualification }}</p>
                        <p class="text-muted">{{ $testimonial->university_name }}</p>
                    </div>
                </div>
                <div class="lc-block testimonial-image">
                    <img class="img-fluid testimonial-image" src="{{ asset($testimonial->image) }}">
                </div>
            </div>
        </div>
    </div>
</div>
