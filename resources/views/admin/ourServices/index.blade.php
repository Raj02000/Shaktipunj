@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Our Services Category" />
    <x-admin.table :values="$ourServices" canAdd="add_our_service" canEdit="edit_our_service" canDelete="delete_our_service"
        add_route="our-services.add" view_route="our-services.show" edit_route="our-services.edit"
        delete_route="our-services.delete" :hidden_field="['id', 'status', 'created_at', 'updated_at']" />
@endsection
