@extends('layouts.main')


@section('meta-info')
    <x-meta-info ogUrl="{{ url()->current() }}" :title="$page->meta_title" :description="$page->meta_description" :keywords="$page->meta_keywords" />
@endsection
@section('css')
    <style>
        .team-member {
            transition: transform 0.3s ease;
            margin-bottom: 2rem;
        }

        .team-member:hover {
            transform: translateY(-5px);
        }

        .team-member img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
        }

        .section-heading {
            position: relative;
            margin-top: 20px;
            font-size: 35px !important;
            margin-bottom: 20px;
        }

        .section-heading:after {
            content: '';
            display: block;
            width: 60px;
            height: 3px;
            background: #0d6efd;
            margin: 20px auto 0;
        }

        .description {
            line-height: 1.6;
            color: #444;
        }

        /* Truncate text after 700 characters */
        .short-description {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            /* Adjust the number of lines to display */
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .short-description.expanded {
            white-space: normal;
        }

        .collapse {
            transition: all 0.3s ease;
        }

        .read-more-btn {
            color: #0d6efd;
            cursor: pointer;
            text-decoration: none;
            font-weight: 500;
        }

        .read-more-btn:hover {
            text-decoration: underline;
        }

        .team-info {
            text-align: center;
            position: sticky;
            top: calc(var(--header-height) + 2rem);
            /* Add header height + desired margin */
            margin-bottom: 1.5rem;
        }

        @media (max-width: 767px) {
            .team-member {
                text-align: center;
            }

            .team-info {
                position: relative;
                top: 0;
                margin-bottom: 1.5rem;
            }

            .description {
                text-align: center;
            }

            .team-member img {
                width: 150px;
                height: 150px;
            }

            .section-heading {
                font-size: 28px !important;
            }
        }

        @media (max-width: 575px) {
            .team-member img {
                width: 120px;
                height: 120px;
            }

            .section-heading {
                font-size: 24px !important;
            }
        }
    </style>
@endsection

@section('title', $page->meta_title)

@section('content')
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="section-heading">Meet Our Team</h1>
            <p class="lead text-muted">The passionate people behind our success</p>
        </div>

        @isset($page->content)
            @foreach ($page->content as $member)
                <div class="card border-0 shadow-sm team-member mb-4">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-4 col-12 text-center">
                                <div class="team-info">
                                    <img src="{{ asset($member['image']) }}" alt="{{ $member['title'] }}" class="mb-3">
                                    <h4 class="card-title mb-1">{{ $member['title'] }}</h4>
                                    <p class="text-primary mb-0">{{ $member['position'] }}</p>
                                </div>
                            </div>

                            <div class="col-md-8 col-12 mt-4">
                                <div class="description">
                                    <div class="short-description">
                                        @if (empty($member['description']))
                                            No description available.
                                        @else
                                            {!! Str::limit($member['description'], 700) !!}
                                        @endif
                                    </div>

                                    <div class="full-description collapse" id="member-{{ $loop->index }}">
                                        {!! $member['description'] !!}
                                    </div>
                                    <a class="read-more-btn" data-bs-toggle="collapse" href="#member-{{ $loop->index }}"
                                        role="button" aria-expanded="false">
                                        <span class="expand-text">Read More</span>
                                        <span class="collapse-text d-none">Show Less</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endisset
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.read-more-btn').forEach(button => {
                const shortDescription = button.closest('.description').querySelector(
                    '.short-description'); // Select within the same description
                const collapseElement = document.querySelector(button.getAttribute('href'));

                button.addEventListener('click', function() {
                    shortDescription.classList.toggle('d-none'); // Hide/show short description
                });
            });

            // Handle collapse events for text change
            document.querySelectorAll('.collapse').forEach(collapse => {
                collapse.addEventListener('shown.bs.collapse', function() {
                    const button = document.querySelector(`[href="#${this.id}"]`);
                    button.querySelector('.expand-text').classList.add('d-none');
                    button.querySelector('.collapse-text').classList.remove('d-none');
                });

                collapse.addEventListener('hidden.bs.collapse', function() {
                    const button = document.querySelector(`[href="#${this.id}"]`);
                    button.querySelector('.expand-text').classList.remove('d-none');
                    button.querySelector('.collapse-text').classList.add('d-none');
                });
            });
        });


        const stickyElements = document.querySelectorAll('.team-info');
        stickyElements.forEach(element => {
            element.style.top = `${headerHeight + 20}px`; // Add header height + desired margin
        });
    </script>
@endsection
