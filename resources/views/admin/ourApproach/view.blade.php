@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Approach" />
    <x-admin.table-view :values="$ourApproach" canEdit="edit_value_policy" canDelete="delete_value_policy"
        edit_route="approach.edit" delete_route="approach.delete" />
@endsection
