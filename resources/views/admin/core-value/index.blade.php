@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header :title="$value[0]->type" />
    <x-admin.table :values="$value" view_route="admin.core-value.show" edit_route="admin.core-value.edit"
        :hidden_field="['id', 'type', 'created_at', 'updated_at']" />
@endsection
