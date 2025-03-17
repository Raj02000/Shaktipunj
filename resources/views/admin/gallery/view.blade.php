@extends('admin.layout.admin-layout')
@section('body')

    <x-admin.page-header title="Gallery"/>
    <x-admin.table-view  :values="$gallery"  canEdit="edit_media" canDelete="delete_media" edit_route="gallery.edit" delete_route="gallery.delete" />
    
@endsection