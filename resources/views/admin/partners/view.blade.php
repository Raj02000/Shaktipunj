@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Partner" />

    <x-admin.table-view :values="$partner" edit_route="partner.edit" delete_route="partner.delete" />
@endsection
