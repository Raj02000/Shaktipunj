@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Banner Images" />
    <x-admin.table-view :values="$bannerImage"  canEdit="edit_media" canDelete="delete_media" edit_route="banner-image.edit" delete_route="banner-image.delete" />
@endsection
