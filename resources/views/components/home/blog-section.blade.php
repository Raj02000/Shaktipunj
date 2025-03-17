@props(['blogs', 'title' => 'Travel Blog'])
<section class="pb-4">
    <x-blog-card-styles />
    <div class="container">
        <div class="mb-4 text-center">
            <div class="row d-flex justify-content-between">

                {{-- <h5 class="dash-style">EXPLORE GREAT PLACES</h5> --}}
                <div>
                    <p class="mb-0 section-title position-relative">
                        {{ $title }}
                        <span
                            style="position: absolute; bottom: -5px;left: 0; width: 50%; height: 3px; background-color: #CB9331;"></span>
                    </p>
                </div>
                <div>
                    <a href="{{ route('page.blogs') }}" class="btn view-all-btn">
                        VIEW ALL BLOGS
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-md-6 col-lg-3">
                    {{-- <div class="col-md-6 col-lg-4"> big card --}}
                    <x-home.blog-card :blog="$blog" />
                </div>
            @endforeach
        </div>
        <div class="btn-wrap text-center mobile-view-all-btn">
            <a href="{{ route('page.blogs') }}" class="button-primary">VIEW ALL BLOGS</a>
        </div>
    </div>
</section>
