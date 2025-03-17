@extends('layouts.main')

@section('css')
    <style>
        .content-body img {
            all: unset;
            height: 100% !important;
            width: 100% !important;
        }
    </style>


    <title>Service - {{ $service->title }}</title>
    <x-meta :title="$service->title" :url="url()->full()" />
@endsection

@section('content')
    <x-service-detail-component :value="$service" name="title" thumbnail="image" :destinations="$destinations" :services="$services" />
@endsection
