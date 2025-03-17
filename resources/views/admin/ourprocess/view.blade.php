@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Our Process" />
    <x-admin.table-view :values="$ourProcess" canEdit="edit_our_process" canDelete="delete_our_process"
        edit_route="our-process.edit" delete_route="our-process.delete" />
@endsection
