@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Extra Items" />

    <x-admin.table-view :values="$otherLink" canEdit="edit_extra" edit_route="link.edit" />
@endsection
