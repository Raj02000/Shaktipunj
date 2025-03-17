@props(['title', 'image', 'description'])

<style>
    .card-img {
        height: 90px;
        object-fit: cover;
    }
</style>
<div class="d-flex flex-column align-items-center" style="height: 195px;">
    <div class="d-flex card-img justify-content-center">
        <img src="{{ asset($image) }}" alt="">
    </div>
    <p style="font-size: 19px; font-weight: 500;">{!! $title !!}</p>
    <p style="font-size: 13px; font-weight: 400;"> {!! $description !!} </p>
</div>
