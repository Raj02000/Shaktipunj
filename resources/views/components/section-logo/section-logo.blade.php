@props(['name', 'description'])
<style>
    .image-logo {
        width: 94px;
        height: 106px;
    }

    @media (max-width: 512px) {
        .image-logo {
            width: 60px;
            height: 70px;
        }
    }
</style>
<div class=" d-flex justify-content-center mt-5">
    <img src="{{ asset('images/m.png') }}" class="image-logo " alt="">
</div>
<div class="title-header">{{ $name }}</div>
<div class="subtitle-header mb-3">
    {!! $description !!}
</div>
