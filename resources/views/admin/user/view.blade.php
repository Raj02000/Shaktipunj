@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="User" />

    <x-admin.table-view :values="$user" canEdit="edit_user" canDelete="delete_user" edit_route="users.edit"
        delete_route="users.delete" />
@endsection
