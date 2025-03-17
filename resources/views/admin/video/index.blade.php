@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Videos"/>
    <x-admin.table :values="$videos" add_route="video.add" view_route="video.show" edit_route="video.edit" delete_route="video.delete" :hidden_field="['id','created_at','updated_at']"/>
@endsection
