@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Events" />
    <x-admin.table :values="$events" add_route="event.add" delete_route="event.delete" view_route="event.show"
        edit_route="event.edit" :hidden_field="['id', 'created_at', 'updated_at']" />
@endsection
