@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row mt-5 ms-4">
            <p style="font-size: 20px; font-weight: 600;" class="mb-0 px-3">Search Result: {{ $query }}</p>
        </div>
        <div class="row mt-3">
            @forelse ($packages as $package)
                <div class="col-md-6 col-lg-4">
                    <x-home.package :package="$package" />
                </div>
            @empty
                <div class="col-md-6 col-lg-4">
                    <h2>No packages found</h2>
                </div>
            @endforelse
        </div>
    </div>
@endsection
