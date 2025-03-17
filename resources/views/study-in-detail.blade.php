@extends('layouts.main')
@section('css')
    <style>
        .content-body img {
            all: unset;
            height: 100% !important;
            width: 100% !important;
        }
    </style>

    <title>Abroad - {{ $destination->name }}</title>
    <x-meta :title="$destination->name" :url="url()->full()" />
@endsection

@section('content')
    <x-service-detail-component :value="$destination" :destinations="$destinations" :services="$services" />
@endsection
