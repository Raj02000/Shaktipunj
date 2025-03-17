@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Roles" />

    <x-admin.table-view :values="$role" canEdit="edit_role" canDelete="delete_role" edit_route="roles.edit"
        delete_route="roles.delete" />
@endsection
