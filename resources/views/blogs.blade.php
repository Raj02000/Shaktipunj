@extends('layouts.main')

@section('css')
    <x-blog-card-styles />
    <style>
        /* Keep only blog listing specific styles here */
        @media (min-width: 1200px) {
            .blog-container {
                max-width: 1240px;
                margin: 0 auto;
                padding: 0 15px;
            }
        }

        .blog-header {
            padding: 3rem 0 1rem 0;
            background: #f8fafc;
            margin-bottom: 1rem;
        }

        .blog-header h1 {
            font-size: 2.5rem;
            color: #1a202c;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        /* Pagination Styles */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 3rem;
        }

        .pagination .page-item .page-link {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            color: #1a202c;
            transition: all 0.3s ease;
        }

        .pagination .page-item.active .page-link,
        .pagination .page-item .page-link:hover {
            background: #0056b3;
            color: white;
            border-color: #0056b3;
        }

        .blog-content-wrapper {
            margin-bottom: 5rem;
        }

        .bg-meta-cat {
            position: absolute;
            top: 30px;
            left: 30px;
        }
    </style>
@endsection

@section('content')
    <div class="blog-header">
        <div class="blog-container">
            <h1>Our Blog</h1>
        </div>
    </div>

    <div class="blog-container blog-content-wrapper">
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-lg-3 col-md-6">
                    <x-home.blog-card :blog="$blog" :no-tag="$noTag" />
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        {{ $blogs->links('vendor.pagination.custom') }}
    </div>
@endsection
