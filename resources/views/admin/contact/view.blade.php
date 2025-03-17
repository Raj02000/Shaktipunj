@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Message" />
    <x-admin.table-view :values="$contact" />
@endsection
