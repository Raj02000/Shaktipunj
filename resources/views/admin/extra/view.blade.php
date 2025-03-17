@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Extra Items"/>

    <x-admin.table-view  :values="$extra"  canEdit="edit_extra"  edit_route="extra.edit" />
    
@endsection
