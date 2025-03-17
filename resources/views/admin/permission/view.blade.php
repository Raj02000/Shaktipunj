@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Permissions"/>

    <x-admin.table-view  :values="$permission"   />
    
@endsection