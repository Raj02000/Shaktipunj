@props(['data'])
<style>
    .blog-detail-image {
        width: 100%;
        height: auto;
        max-height: 75vh;
        object-fit: scale-down;
    }
</style>
<div class="my-5">
    <p class="page-topic mb-2">
        {{ $data->title }}
    </p>
    <div class="d-flex justify-content-center my-3">
        <img class="blog-detail-image" src='{{ asset($data->image) }}' alt="">
    </div>
    <hr class="border border-dark my-2">
    <p class="text-justify">{!! $data->content !!}
    </p>
</div>
