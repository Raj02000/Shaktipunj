@props(['data', 'name'])
<style>
    .gradient-bottom-grey {
        max-width: 100%;
        background: linear-gradient(to bottom, rgba(255, 255, 255, 1), rgba(115, 115, 115, 0.35));
    }

    .destination-gallery {
        margin-bottom: 20px;
        overflow: hidden;
        height: 300px;
        position: relative;


    }

    .destination-gallery .destination-gallery-img-top {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .destination-gallery .overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 30%;
        background-color: rgba(0, 0, 0, 0.7);
        display: flex;
        justify-content: center;
        text-align: center;
        color: white;
        font-size: 20px;
        font-weight: bold;
    }

    .destination-gallery .destination-title {
        position: absolute;
        bottom: 25px;
        left: 0;
        width: 100%;
        height: 20%;
        display: flex;
        align-items: top;
        justify-content: start;
        text-align: start;
        color: white;
        font-size: 30px;
        font-weight: 700;
        line-height: 42.01px;

        z-index: 1;

    }

    .destination-gallery .destination-title a {
        color: white;
        text-decoration: none;
    }

    .destination-gallery .destination-title a:hover {
        text-decoration: underline;
    }
</style>

<div class="gradient-bottom-grey pb-4">
    <div class="container px-2 ">
        <div class="section-topic mb-4 text-center">Popular Universities to Study in
            {{ $name }}
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2  g-3">
            @foreach ($data as $item)
                <div class="col">
                    <div class="card destination-gallery">
                        <img src="{{ asset($item->image) }}" class="destination-gallery-img-top"
                            alt="University of Central Oklahoma">

                        <div class="destination-title">
                            <div class="col-8 col-md-6 ps-4"><a target="_blank"
                                    href="{{ $item->link }}">{{ ucWords($item->name) }}</a></div>
                        </div>

                        <div class="overlay"></div>

                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>


</div>
