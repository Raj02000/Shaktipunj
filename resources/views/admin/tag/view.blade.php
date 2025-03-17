@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Tag" />

    <x-admin.table-view :values="$tag" edit_route="tag.edit" delete_route="tag.delete" />
@endsection
