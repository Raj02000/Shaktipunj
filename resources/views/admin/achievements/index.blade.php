@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Our Achievements" />
    <x-admin.table :values="$achievements" edit_route="admin.achievements.edit" :hidden_field="['id', 'type', 'created_at', 'updated_at']" />
@endsection
