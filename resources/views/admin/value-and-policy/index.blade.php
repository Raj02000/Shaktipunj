@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Values" />
    <x-admin.table :values="$valueAndPolicy" canAdd="add_value_policy" canEdit="edit_value_policy" canDelete="delete_value_policy"
        add_route="value-policy.add" view_route="value-policy.show" edit_route="value-policy.edit"
        delete_route="value-policy.delete" :hidden_field="['id', 'created_at', 'updated_at']" />
@endsection
