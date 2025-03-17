@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Expenses"/>
    <x-admin.table :values="$country" canAdd="add_expense" canEdit="edit_expense" canDelete="delete_expense" view_route="expenses.show" edit_route="expenses.edit" :hidden_field="['id','created_at','updated_at']"/>
@endsection
