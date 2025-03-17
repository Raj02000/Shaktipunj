@extends('admin.layout.admin-layout')
@section('body')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span>
            Dashboard
        </h3>
    </div>

    <div class="row">
        <x-admin.dashboard-card name="Today's Enquiry" :count="$enquiry" color="primary" />
        <x-admin.dashboard-card addRoute="destination.index" name="Destinations" :count="$destination" color="danger" />
        <x-admin.dashboard-card name="Testimonials" :count="$testimonials" color="success" />
    </div>
@endsection
