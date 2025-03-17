@extends('layouts.main')

@section('title', 'Service Unavailable')

@section('css')
    <style>
        section {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }

        h1 {
            font-size: 50px;
            color: #ff6b6b;
        }

        p {
            font-size: 18px;
            color: #333;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }
    </style>
@endsection

@section('content')
    <section class="my-5">
        <h1>500</h1>
        <p>Something went wrong on our end. Please try again later.</p>
        <a href="{{ url('/') }}">Go Back to Home</a>
    </section>
@endsection
