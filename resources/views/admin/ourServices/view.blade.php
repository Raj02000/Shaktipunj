@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Our Services" />
    <x-admin.table-view :values="$ourService" canEdit="edit_our_service" canDelete="delete_our_service"
        edit_route="our-services.edit" delete_route="our-services.delete" />
@endsection
