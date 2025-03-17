@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Tests"/>
    <x-admin.table :values="$countries"  canEdit="edit_team" canDelete="delete_team" 
    view_route="test.show" edit_route="test.edit" :hidden_field="['id']"/>
@endsection
