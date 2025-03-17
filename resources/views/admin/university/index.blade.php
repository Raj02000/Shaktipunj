@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="University" />
    <x-admin.table :values="$universities" add_route="university.add" view_route="university.show" edit_route="university.edit"
        delete_route="university.delete" :hidden_field="['id', 'created_at', 'updated_at']" />
@endsection
