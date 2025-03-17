@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Service Item" />

    <x-admin.table-view :values="$service" canEdit="edit_our_service" canDelete="delete_our_service" edit_route="services.edit"
        delete_route="services.delete" />
@endsection
