@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="University"/>

    <x-admin.table-view  :values="$university" canEdit="edit_university" canDelete="delete_university"
    edit_route="university.edit" delete_route="university.delete" />
    
@endsection