@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Course" />
    @foreach ($course as $item)
        <x-admin.table-view :values="$item" />
    @endforeach
@endsection
