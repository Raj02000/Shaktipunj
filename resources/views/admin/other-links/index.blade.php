@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Links" />
    <x-admin.table :values="$otherLinks" canAdd="add_extra" canEdit="edit_extra" add_route="link.add" view_route="link.show"
        edit_route="link.edit" delete_route="link.delete" :hidden_field="['id', 'key', 'created_at', 'updated_at']" />
@endsection
