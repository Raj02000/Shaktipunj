@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Tests"/>
    @foreach ($tests as $item)
        <x-admin.table-view  :values="$item"  />
    @endforeach

@endsection