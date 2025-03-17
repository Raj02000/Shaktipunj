@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Expenses" />
    @foreach ($expenses as $item)
        <x-admin.table-view :values="$item" />
    @endforeach
@endsection
