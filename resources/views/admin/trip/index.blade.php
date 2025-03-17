@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Trip" />
    <x-admin.table :values="$trips" add_route="trip.add" view_route="trip.show" edit_route="trip.edit"
        delete_route="trip.delete" :hidden_field="['id', 'slug', 'extra', 'description', 'created_at', 'updated_at']" />
@endsection
