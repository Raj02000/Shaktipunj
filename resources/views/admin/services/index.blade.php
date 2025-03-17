@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Our Services Items" />
    <x-admin.table :values="$services" add_route="services.add" view_route="services.show" edit_route="services.edit"
        delete_route="services.delete" :hidden_field="['id', 'slug', 'created_at', 'updated_at', 'status', 'description', 'icon']" />
@endsection
