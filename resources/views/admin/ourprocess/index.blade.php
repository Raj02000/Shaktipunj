@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Our Process"/>
    <x-admin.table :values="$ourProcess" canAdd="add_our_process" canEdit="edit_our_process" canDelete="delete_our_process" add_route="our-process.add" view_route="our-process.show" edit_route="our-process.edit" delete_route="our-process.delete" :hidden_field="['id','created_at','updated_at']"/>
@endsection
