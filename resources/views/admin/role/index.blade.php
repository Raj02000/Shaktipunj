@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Roles" />
    <x-admin.table :values="$roles" canAdd="add_role" canEdit="edit_role" canDelete="delete_role" add_route="roles.add"
        view_route="roles.show" edit_route="roles.edit" delete_route="roles.delete" :hidden_field="['id', 'created_at', 'updated_at']" />
@endsection
