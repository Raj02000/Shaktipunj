@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Testimonials Member" />
    <x-admin.table-view :values="$testimonial" canEdit="edit_testimonial" canDelete="delete_testimonial"
        edit_route="testimonial.edit" delete_route="testimonial.delete" />
@endsection
