@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Enquiry messages" />
    <x-admin.table :values="$contact" view_route="contact.show" :hidden_field="['id', 'created_at', 'updated_at']" />
@endsection
