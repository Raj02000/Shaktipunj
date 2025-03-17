@props(['dataFirst', 'dataSecond'])
<style>
    .image-column {
        height: 100vh;
        overflow: hidden;
    }

    @media only screen and (max-width: 1350px) {
        .image-column {
            height: 70vh;
            overflow: hidden;
        }
    }

    .scrolling-images {
        height: 300px;
        width: 280px;
        position: relative;
        object-fit: fill;
        animation-name: example;
        animation-duration: 30s;
        transition: ease-in-out;
        z-index: 1;
        animation-iteration-count: infinite;
        margin: 10px 0px;
    }

    .scrolling-images2 {
        height: 320px;
        width: 280px;
        position: relative;
        object-fit: fill;
        animation-name: example2;
        animation-duration: 30.5s;
        transition: ease-in-out;
        z-index: 1;
        animation-iteration-count: infinite;
        margin: 10px 0px;
    }



    @keyframes example {
        0% {
            left: 0px;
            top: {{ ($dataFirst->count() - 2) * -250 }}px;
        }

        50% {
            left: 0px;
            top: -10px;
        }

        100% {
            left: 0px;
            top: {{ ($dataFirst->count() - 2) * -250 }}px;
        }
    }

    @keyframes example2 {
        0% {
            left: 0px;
            top: {{ ($dataFirst->count() - 2) * -250 }}px;
        }

        50% {
            left: 0px;
            top: -10px;
        }

        100% {
            left: 0px;
            top: {{ ($dataFirst->count() - 2) * -250 }}px;
        }
    }

    /* hello */
</style>


<div class="row pe-sm-4 pe-3">
    <div class="col col-sm-5 me-3 image-column">
        <div>
            @foreach ($dataFirst as $item)
                <img class="scrolling-images" src="{{ asset($item->image) }}" alt="">
            @endforeach
        </div>

    </div>
    <div class="col col-sm-5 image-column">
        <div>
            @foreach ($dataSecond as $item)
                <img class="scrolling-images2" src="{{ asset($item->image) }}" alt="">
            @endforeach
        </div>
    </div>
</div>
