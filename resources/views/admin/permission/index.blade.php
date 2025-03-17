@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Permissions" />
    <x-admin.table :values="$permissions" canAdd="add_permission" canEdit="edit_permission" canDelete="delete_permission"
     add_route="permission.add" view_route="permission.show" :hidden_field="['id','created_at', 'updated_at']" />
@endsection
