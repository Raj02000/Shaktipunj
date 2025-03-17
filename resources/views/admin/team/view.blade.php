@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Teams Member"/>
    <x-admin.table-view  :values="$team" canEdit="edit_team" canDelete="delete_team"
    edit_route="team.edit" delete_route="team.delete" />

@endsection