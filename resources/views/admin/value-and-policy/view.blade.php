@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Value" />
    <x-admin.table-view :values="$valueAndPolicy" canEdit="edit_value_policy" canDelete="delete_value_policy"
        edit_route="value-policy.edit" delete_route="value-policy.delete" />
@endsection
