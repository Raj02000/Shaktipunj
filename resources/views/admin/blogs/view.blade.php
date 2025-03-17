@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Blogs" />

    <x-admin.table-view :values="$blog" canEdit="edit_blog" canDelete="delete_blog" edit_route="blog.edit"
        delete_route="blog.delete" />
@endsection
