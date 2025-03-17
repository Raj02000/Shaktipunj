@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Bookings" />

    <x-admin.table-view :values="$bookings" />
@endsection
