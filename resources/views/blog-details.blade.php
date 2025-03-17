@extends('layouts.main')

@section('title', $blog->meta_title)

@section('css')
    <style>
        .img-fluid {
            width: 100% !important;
            height: auto !important;
        }

        .related-posts ul {
            list-style-type: none;
            padding: 0;
        }

        .related-posts li {
            margin-bottom: 10px;
        }

        .related-posts a {
            text-decoration: none;
            color: #007bff;
        }

        .related-posts a:hover {
            text-decoration: underline;
        }

        .blog-image-container {
            position: relative;
            margin-bottom: 2rem;
            width: 100%;
            height: 500px;
            border-radius: 8px;
            overflow: hidden;
        }

        .blog-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .blog-image-title {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 8px 15px;
            border-radius: 4px;
            font-size: 0.9rem;
        }

        /* Custom Breadcrumb Styles */
        .custom-breadcrumb {
            padding: 0;
            margin-bottom: 2rem;
        }

        .custom-breadcrumb .breadcrumb {
            margin-bottom: 0;
            padding: 0;
            background-color: transparent;
            display: flex;
            align-items: center;
        }

        .custom-breadcrumb .breadcrumb-item+.breadcrumb-item::before {
            content: "\f105";
            /* FontAwesome arrow icon */
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            color: #94a3b8;
            font-size: 0.9rem;
            margin: 0 8px;
        }

        .custom-breadcrumb .breadcrumb-item a {
            color: #64748b;
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .custom-breadcrumb .breadcrumb-item a:hover {
            color: #0056b3;
        }

        .custom-breadcrumb .breadcrumb-item.active {
            color: #0f172a;
            font-weight: 600;
            font-size: 0.95rem;
        }

        /* Updated Table of Contents styles */
        .table-of-contents {
            padding: 25px;
            border-radius: 8px;
            margin: 2rem 0;
            border: 1px solid #e9ecef;
        }

        .table-of-contents h4 {
            color: #2d3436;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table-of-contents ul {
            list-style: none;
            padding-left: 0;
            margin-bottom: 0;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px 40px;
            counter-reset: toc-counter;
        }

        .table-of-contents li {
            position: relative;
            padding: 10px 0 10px 40px;
            border-bottom: 1px solid #edf2f7;
        }

        .table-of-contents li::before {
            counter-increment: toc-counter;
            content: counter(toc-counter);
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 28px;
            height: 28px;
            background-color: #f8f9fa;
            border: 2px solid #0056b3;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            font-weight: 600;
            color: #0056b3;
            transition: all 0.3s ease;
        }

        .table-of-contents a {
            color: #2d3436;
            text-decoration: none;
            transition: all 0.3s ease;
            display: block;
            font-weight: 500;
            font-size: 1rem;
            line-height: 1.4;
        }

        .table-of-contents a:hover {
            color: #0056b3;
            transform: translateX(5px);
        }

        .table-of-contents li:hover::before {
            background-color: #0056b3;
            color: white;
            transform: translateY(-50%) scale(1.1);
        }

        /* Add styles for the heading text that's generated from h2 */
        h2 {
            color: #2d3436;
            font-weight: 700;
            margin-top: 2.5rem;
            margin-bottom: 1.5rem;
            font-size: 1.75rem;
            scroll-margin-top: 100px;
        }

        /* Blog Metadata Styles */
        .blog-metadata {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem;
            margin-bottom: 2rem;
            background: #f8fafc;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .blog-info {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .blog-date {
            color: #64748b;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.95rem;
            font-weight: 500;
        }

        .blog-date i {
            color: #0056b3;
            font-size: 1rem;
        }

        .blog-tags {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .blog-tag {
            background: white;
            color: #0056b3;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }

        .blog-tag:hover {
            background: #0056b3;
            color: white;
            text-decoration: none;
            transform: translateY(-2px);
        }

        .blog-share {
            display: flex;
            gap: 1rem;
            padding-left: 2rem;
            border-left: 1px solid #e2e8f0;
        }

        .share-button {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .share-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            color: white;
            text-decoration: none;
        }

        .share-facebook {
            background: #1877f2;
        }

        .share-twitter {
            background: #1da1f2;
        }

        .share-whatsapp {
            background: #25d366;
        }

        .share-link {
            background: #6c757d;
        }

        /* Related Posts Styles */
        .related-posts {
            margin-bottom: 4rem;
        }

        .related-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            height: 100%;
        }

        .related-card:hover {
            transform: translateY(-5px);
        }

        .related-card .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .related-card .card-body {
            padding: 1.5rem;
            position: relative;
        }

        .related-card .card-title {
            font-size: 1.1rem;
            margin-bottom: 0.75rem;
            font-weight: 600;
            color: #2d3436;
        }

        .related-card .card-text {
            color: #636e72;
            font-size: 0.9rem;
            margin-bottom: 2.5rem;
        }

        .related-card .read-more {
            position: absolute;
            bottom: 1.5rem;
            left: 1.5rem;
            color: #0056b3;
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: gap 0.3s ease;
        }

        .related-card .read-more:hover {
            gap: 10px;
        }

        .related-card .read-more i {
            font-size: 0.8rem;
            transition: transform 0.3s ease;
        }

        .related-card .read-more:hover i {
            transform: translateX(3px);
        }

        /* Ensure smooth scrolling */
        html {
            scroll-behavior: smooth;
            scroll-padding-top: 100px;
        }

        /* Table Styles */
        .blog-content table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin: 2rem 0;
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .blog-content table thead {
            background: #f1f4f9;
        }

        .blog-content table th {
            color: #1a202c;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
            padding: 6px 8px;
            text-align: left;
            border-bottom: 2px solid #e2e8f0;
            background: #f8fafc;
            white-space: nowrap;
            position: relative;
        }

        .blog-content table th[colspan] {
            text-align: center;
            background: #edf2f7;
            font-size: 1rem;
            text-transform: capitalize;
            letter-spacing: normal;
        }

        .blog-content table th[rowspan] {
            vertical-align: middle;
            background: #edf2f7;
        }

        .blog-content table td {
            padding: 4px 8px;
            border-bottom: 1px solid #edf2f7;
            color: #4a5568;
            font-size: 0.95rem;
            font-weight: normal;
            vertical-align: middle;
            line-height: 1.4;
        }

        .blog-content table td ul {
            padding: 4px 8px;
        }

        .blog-content table td[colspan] {
            text-align: center;
            background: #f8fafc;
            font-weight: normal;
            padding: 4px 8px;
        }

        .blog-content table td[rowspan] {
            vertical-align: middle;
            background: #f8fafc;
            padding: 4px 8px;
        }

        /* Striped rows */
        .blog-content table tbody tr:nth-child(even) {
            background-color: #f8fafc;
        }

        .blog-content table tbody tr:nth-child(odd) {
            background-color: white;
        }

        .blog-content table tbody tr:hover {
            background-color: #edf2f7;
        }

        /* First and last cell border radius */
        .blog-content table tr:first-child th:first-child {
            border-top-left-radius: 12px;
        }

        .blog-content table tr:first-child th:last-child {
            border-top-right-radius: 12px;
        }

        .blog-content table tbody tr:last-child td:first-child {
            border-bottom-left-radius: 12px;
        }

        .blog-content table tbody tr:last-child td:last-child {
            border-bottom-right-radius: 12px;
        }

        /* Remove last row border */
        .blog-content table tbody tr:last-child td {
            border-bottom: none;
        }

        /* Cell with numbers alignment */
        .blog-content table td.numeric {
            text-align: right;
        }

        /* Make table responsive */
        @media (max-width: 768px) {
            .blog-content table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
                border-radius: 8px;
            }

            .blog-content table th,
            .blog-content table td {
                padding: 4px 6px;
            }

            .blog-content table th {
                font-size: 0.85rem;
            }

            .blog-content table td {
                font-size: 0.9rem;
            }
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .blog-metadata {
                flex-direction: column;
                gap: 1.5rem;
            }

            .blog-info {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
                width: 100%;
            }

            .blog-share {
                padding-left: 0;
                border-left: none;
                border-top: 1px solid #e2e8f0;
                padding-top: 1.5rem;
                width: 100%;
                justify-content: center;
            }
            .table-of-contents ul {
                grid-template-columns: repeat(1, 1fr) !important;
            }
            .table-of-contents{
                padding:15px 10px;
            }
        }

        /* Remove margins from p tags inside table cells */
        .blog-content table td p {
            margin: 0;
            padding: 4px;
        }

        /* Also handle nested p tags in colspan and rowspan cells */
        .blog-content table td[colspan] p,
        .blog-content table td[rowspan] p {
            margin: 0;
            padding: 0;
        }

        /* Container width adjustment */
        @media (min-width: 1200px) {
            .blog-container {
                max-width: 1140px;
                margin: 0 auto;
                padding: 0 15px;
            }
        }

        /* Content text justification */
        .blog-content {
            text-align: justify;
            hyphens: auto;
        }

        .blog-content p {
            margin-bottom: 1.5rem;
            line-height: 1.8;
        }

        /* Keep headings left-aligned */
        .blog-content h1,
        .blog-content h2,
        .blog-content h3,
        .blog-content h4,
        .blog-content h5,
        .blog-content h6 {
            text-align: left;
        }

        /* Keep table content left-aligned */
        .blog-content table td,
        .blog-content table th {
            text-align: left;
        }

        /* Keep numeric cells right-aligned */
        .blog-content table td.numeric {
            text-align: right;
        }

        /* Keep centered cells centered */
        .blog-content table td[colspan] {
            text-align: center;
        }

        /* Add this to your CSS section */
        .blog-main-title {
            font-size: 2.5rem !important;
            font-weight: 700 !important;
            color: #1a202c !important;
            margin-bottom: 1.5rem !important;
            line-height: 1.2 !important;
            letter-spacing: -0.5px !important;
        }

        /* For mobile responsiveness */
        @media (max-width: 768px) {
            .blog-main-title {
                font-size: 2rem !important;
            }
        }
    </style>
@endsection

@section('meta-info')
    <x-meta-info ogUrl="{{ url()->current() }}" ogImage="{{ asset($blog->image) }}" :title="$blog->meta_title" :description="$blog->meta_description"
        :keywords="$blog->meta_keywords" />
@endsection

@section('content')
    <div class="container blog-container mt-5">
        <div class="row">
            <div class="col-12">
                <!-- Breadcrumb -->
                <div class="custom-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('page.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('page.blogs') }}">Blogs</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $blog->title }}</li>
                        </ol>
                    </nav>
                </div>

                <h1 class="blog-main-title">{{ $blog->title }}</h1>

                <div class="blog-image-container">
                    <img src="{{ asset($blog->image) }}" alt="Blog Image" class="blog-image">
                </div>

                <!-- Blog Metadata Section -->
                <div class="blog-metadata">
                    <div class="blog-info">
                        <div class="blog-date">
                            <i class="far fa-calendar"></i>
                            <span>{{ $blog->created_at->format('F d, Y') }}</span>
                        </div>
                        {{-- @dd($blog->tag) --}}
                        @if ($blog->tag)
                            <div class="blog-tags">
                                <a href="{{ route('page.blogs', ['tag' => $blog->tag->slug]) }}"
                                    class="blog-tag">{{ $blog->tag?->name }}</a>
                            </div>
                        @endif
                    </div>
                    <div class="blog-share">
                        <a href="#" class="share-button share-facebook" title="Share on Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="share-button share-twitter" title="Share on Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="share-button share-whatsapp" title="Share on WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="#" class="share-button share-link" title="Copy Link">
                            <i class="fas fa-link"></i>
                        </a>
                    </div>
                </div>

                <!-- Table of Contents -->
                <div id="table-of-contents" class="table-of-contents">
                    <h4>Table of Contents</h4>
                    <ul id="toc-list"></ul>
                </div>

                <div class="blog-content">
                    {!! $blog->content !!}
                </div>

                <hr class="my-5">

                <div class="related-posts mb-5">
                    <x-blog-card-styles />
                    <h3 class="mb-4">Latest Posts</h3>
                    <div class="row">
                        @foreach ($latestBlogs as $latestBlog)
                            <div class="col-md-4 mb-4">
                                <x-home.blog-card :blog="$latestBlog" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const headings = document.querySelectorAll('h2');
            const tocList = document.getElementById('toc-list');
            const tocContainer = document.getElementById('table-of-contents');

            // If no headings found, hide the TOC container
            if (headings.length === 0) {
                tocContainer.style.display = 'none';
                return;
            }

            // Process each heading
            headings.forEach((heading, index) => {
                if (!heading.id) {
                    heading.id = 'heading-' + index;
                }

                const li = document.createElement('li');
                const a = document.createElement('a');

                a.href = '#' + heading.id;
                a.textContent = heading.textContent;

                // Updated scroll behavior with offset
                a.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Get the height of the fixed header
                    const navHeight = document.querySelector('header').offsetHeight;

                    // Get the target element's position
                    const targetPosition = heading.getBoundingClientRect().top;
                    const offsetPosition = targetPosition + window.pageYOffset - navHeight -
                        10; // 20px extra padding

                    // Smooth scroll to the target with offset
                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });

                    // Update URL with hash
                    history.pushState(null, null, '#' + heading.id);
                });

                li.appendChild(a);
                tocList.appendChild(li);
            });

            // Handle direct hash links (when page loads with a hash in URL)
            if (window.location.hash) {
                setTimeout(function() {
                    const navHeight = document.querySelector('header').offsetHeight;
                    const targetId = window.location.hash;
                    const targetElement = document.querySelector(targetId);

                    if (targetElement) {
                        const targetPosition = targetElement.getBoundingClientRect().top;
                        const offsetPosition = targetPosition + window.pageYOffset - navHeight - 20;

                        window.scrollTo({
                            top: offsetPosition,
                            behavior: 'smooth'
                        });
                    }
                }, 100);
            }

            document.querySelectorAll('.image_resized').forEach(image => {
                image.removeAttribute('style');
                image.classList.add('img-fluid');
            });

        });
    </script>
@endsection
