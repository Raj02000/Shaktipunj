@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Trip" />

    <x-admin.table-view :values="$trip" edit_route="trip.edit" delete_route="trip.delete" />
@endsection
