@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Approaches" />
    <x-admin.table :values="$ourApproach" canAdd="add_value_policy" canEdit="edit_value_policy" canDelete="delete_value_policy"
        add_route="approach.add" view_route="approach.show" edit_route="approach.edit" delete_route="approach.delete"
        :hidden_field="['id', 'created_at', 'updated_at']" />
@endsection
