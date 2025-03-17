@props(['blog', 'noTag' => false])
{{-- @dump($blog->toArray()) --}}
<article class="blog-card">
    <div class="image-wrapper">
        <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}">
    </div>
    <div class="content">
        @if (!$noTag)
            <div class="meta-cat">
                <span>{{ $blog->tag?->name }}</span>
            </div>
        @endif
        <div class="date">
            <i class="far fa-calendar"></i>
            <span>{{ $blog->created_at->format('F d, Y') }}</span>
        </div>
        <h3 class="title">
            <a href="{{ route('page.blog-details', $blog->slug) }}">{{ $blog->title }}</a>
        </h3>
        <a href="{{ route('page.blog-details', $blog->slug) }}" class="read-more">
            Read More
            <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</article>
