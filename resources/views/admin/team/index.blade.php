@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Teams"/>
    <x-admin.table :values="$teams" canAdd="add_team" canEdit="edit_team" canDelete="delete_team"
     add_route="team.add" view_route="team.show" edit_route="team.edit" delete_route="team.delete" :hidden_field="['id','created_at','updated_at']"/>
@endsection
