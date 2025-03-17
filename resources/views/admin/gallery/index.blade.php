@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Gallery" />
    <x-admin.table :values="$gallery" canAdd="add_media" canEdit="edit_media" canDelete="delete_media" add_route="gallery.add" view_route="gallery.show" edit_route="gallery.edit"
        delete_route="gallery.delete" :hidden_field="['id','created_at', 'updated_at']" />
@endsection
