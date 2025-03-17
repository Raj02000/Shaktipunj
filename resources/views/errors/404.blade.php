@extends('layouts.main')
@section('title', 'page not found')

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
        <h1>404</h1>
        <p>Oops! The page you are looking for doesn't exist</p>
        <a href="{{ url('/') }}">Go Back to Home</a>
    </section>
@endsection
