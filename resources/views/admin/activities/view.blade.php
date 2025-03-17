@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Activities" />

    <x-admin.table-view :values="$activities" edit_route="activities.edit" delete_route="activities.delete" />
@endsection
