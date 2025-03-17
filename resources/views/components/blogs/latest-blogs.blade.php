@props(['blogs', 'desc'])
<style>
    .blog {
        text-align: center;


        font-size: 41px;
        font-weight: 700;
        line-height: 57.42px;
        padding: 15px 0px;
    }

    .blog-title {
        margin: 0px 15% 50px;
        text-align: center;
    }

    @media screen and (max-width:700px) {
        .blog-title {
            margin: 0px 0px 50px;
        }
    }

    .ferris-wheel {
        position: absolute;
        bottom: 100px;
        right: -80px;
        height: 50%;
        z-index: 0;
    }

    .blog-div {
        position: relative;
    }
</style>
</style>

<div class="container-fluid mt-4 blog-div">

    <x-section-logo.section-logo name="Latest Blogs" :description="$desc?->extra['descriptions']" />

    <x-blogs.card-blogs :data="$blogs" />
    <div class="d-flex justify-content-center">
        <a type="button" class="btn button-gradient px-3 py-2 my-4 text-white" href="{{ route('blogs.view') }}">View
            More</a>
    </div>

</div>
