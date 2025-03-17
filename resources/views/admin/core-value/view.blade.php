@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Service Item" />

    <x-admin.table-view :values="$value" canEdit="edit_our_service" edit_route="services.edit" />
@endsection
