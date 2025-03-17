@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="About" />
    <x-admin.table :values="$abouts" edit_route="admin.about.edit" :hidden_field="['id', 'type', 'created_at', 'updated_at']" />
@endsection
