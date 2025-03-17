@extends('layouts.main')

@section('css')
    <style>
        /* Contact Page Styles */
        .contact-header {
            padding: 2rem 0;
            background: #f8fafc;
            margin-bottom: 2rem;
        }

        .contact-header h1 {
            font-size: 2.5rem;
            color: #1a202c;
            font-weight: 700;
            margin-bottom: 0;
        }

        .contact-box {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 1rem;
            transition: transform 0.3s ease;
        }

        .contact-box:hover {
            transform: translateY(-5px);
        }

        .contact-box-icon {
            width: 50px;
            height: 50px;
            background: #f1f4f9;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
        }

        .contact-box-icon i {
            font-size: 1.5rem;
            color: #0056b3;
        }

        .contact-box h5 {
            color: #1a202c;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .contact-box p {
            color: #64748b;
            margin-bottom: 0;
        }

        .contact-box a {
            color: #1a202c;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .contact-box a:hover {
            color: #0056b3;
        }

        /* Form Styles */
        .contact-form {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
        }

        .form-control {
            border: 1px solid #e2e8f0;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #0056b3;
            box-shadow: 0 0 0 3px rgba(0, 86, 179, 0.1);
        }

        .form-label {
            color: #1a202c;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .btn-submit {
            background: #0056b3;
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 8px;
            border: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            background: #003d82;
            transform: translateY(-2px);
        }

        /* Map Styles */
        .map-container {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 4rem;
        }

        .map-container iframe {
            width: 100%;
            height: 450px;
            border: none;
        }

        @media (max-width: 768px) {
            .contact-header {
                padding: 2rem 0;
            }

            .contact-header h1 {
                font-size: 2rem;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Header -->
    <div class="contact-header">
        <div class="container">
            <h1>Contact Us</h1>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="container mb-4">
        <div class="row">
            <!-- Contact Info -->
            <div class="col-lg-4">
                <div class="contact-box">
                    <div class="contact-box-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h5>Our Location</h5>
                    <p>{{ $organization->address }}</p>
                </div>

                <div class="contact-box">
                    <div class="contact-box-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h5>Phone Numbers</h5>
                    <p><a href="tel:{{ $organization->phone }}">+{{ $organization->phone }}</a></p>
                    <p><a href="tel:{{ $organization->alt_phone }}">+{{ $organization->alt_phone }}</a></p>
                </div>

                <div class="contact-box">
                    <div class="contact-box-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h5>Email Address</h5>
                    <p><a href="mailto:{{ $organization->email }}">{{ $organization->email }}</a></p>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-8">
                <div class="contact-form">
                    <h3 class="mb-4">Send us a Message</h3>
                    <x-enquiry-form class='row g-3' />
                </div>
            </div>
        </div>

        <!-- Map -->
        <div class="map-container mt-4">
            @isset($organization->extra['map'])
                {!! $organization->extra['map'] !!}
                @endif
            </div>
        </div>
    @endsection
