@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Extra Items" />
    <x-admin.table :values="$extra" canAdd="add_extra" canEdit="edit_extra"  add_route="extra.add" view_route="extra.show" edit_route="extra.edit"
         :hidden_field="['id','key','created_at', 'updated_at']" />
@endsection
