@props(['data'])
<style>
    .card-blog {
        margin-bottom: 20px;

        overflow: hidden;
        height: 390px;
        border-radius: 30px;


    }

    .card-blog .card-blog-img-top {
        width: 100%;
        height: 100%;
        object-fit: cover;
        background-color: rgba(0, 0, 0, 0.5);
        transition: all 0.4s;

    }


    .card-blog:hover .card-blog-img-top {
        transform: scale(1.2);
        opacity: 1;
    }

    .card-blog .blog-description {
        font-family: Inter;
        font-size: 25px;
        font-weight: 400;
        line-height: 24.2px;
        text-align: left;
        margin: 0px 10%;

        position: absolute;
        bottom: 10%;
        left: 0;
        width: 70%;
        transition: all 0.5s;



        color: white;




        z-index: 1;


    }

    .card-blog:hover .blog-description {
        bottom: 15%;
        z-index: 1;

    }

    .card-blog:hover .blog-read {
        opacity: 1;


    }

    .blog-read {
        position: absolute;
        margin: 0px 10%;
        bottom: 10px;
        width: 70%;
        font-family: Inter;
        font-size: 20px;
        font-weight: 400;
        line-height: 24.2px;
        text-align: left;

        opacity: 0;
        transition: opacity 0.5s ease;

        color: white;


        z-index: 1;



    }

    .gradient {
        position: absolute;
        background-image: linear-gradient(0deg, black, transparent);
        height: 100%;
        width: 100%;
        z-index: 1;
        opacity: 0.8;


    }

    .card-blog:hover .gradient {
        z-index: 1;


    }
</style>
{{-- {{ dd($data) }} --}}
<div class="container-fluid px-sm-5">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4  g-4">
        @foreach ($data as $item)
            <a href="{{ route('blog.details', $item->id) }}">

                <div class="col ">
                    <div class="card card-blog">
                        <div class="gradient"></div>
                        <img src="{{ asset($item->image) }}" class="card-blog-img-top" alt="">
                        <div class="blog-description ">{{ \Illuminate\Support\Str::limit($item->title, 55) }}</div>
                        <div class="blog-read">Read More...</div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
