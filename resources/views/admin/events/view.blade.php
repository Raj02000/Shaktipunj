@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Event" />
    <x-admin.table-view :values="$event" canEdit="edit_event" canDelete="delete_event" edit_route="event.edit"
        delete_route="event.delete" />
@endsection
