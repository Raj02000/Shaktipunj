@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Courses"/>
    <x-admin.table :values="$countries" canAdd="add_course" canEdit="edit_course" canDelete="delete_course"  view_route="course.show" edit_route="course.edit" :hidden_field="['id']"/>
@endsection
