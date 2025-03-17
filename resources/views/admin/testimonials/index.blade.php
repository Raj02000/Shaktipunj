@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Testimonials" />
    <x-admin.table :values="$testimonials" add_route="testimonial.add" view_route="testimonial.show" edit_route="testimonial.edit"
        delete_route="testimonial.delete" :hidden_field="['id', 'created_at', 'updated_at']" />
@endsection
