@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Users" />
    <x-admin.table :values="$users" canAdd="add_user" canEdit="edit_user" canDelete="delete_user" add_route="users.add"
        view_route="users.show" edit_route="users.edit" delete_route="users.delete" :hidden_field="['id', 'email_verified_at', 'remember_token', 'created_at', 'updated_at']" />
@endsection
