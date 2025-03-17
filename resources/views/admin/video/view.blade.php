@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Videos"/>
    <x-admin.table-view  :values="$video" edit_route="video.edit" delete_route="video.delete" />

@endsection