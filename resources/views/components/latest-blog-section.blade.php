@props(['blogs'])

<!-- LATEST POSTS -->
<div class="popular-posts sidebar-div mb-50">

    <!-- Title -->
    <h5 class="h5-lg">Latest Posts</h5>

    <ul class="latest-posts no-list-style">

        @foreach ($blogs as $blog)
            <li class="clearfix">

                <!-- Link -->
                <h5 class="h5-sm">
                    <a href="{{ route('page.blogs.details', $blog->id) }}">{{ $blog->title }}</a>
                </h5>

                <!-- Text -->
                <div class="content-body">{!! Str::limit(strip_tags($blog->short_description), '100', '...') !!}
                </div>
            </li>
        @endforeach
    </ul>

</div>
