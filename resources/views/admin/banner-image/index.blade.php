@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Banner Images" />
    <x-admin.table :values="$bannerImages" add_route="banner-image.add" delete_route="banner-image.delete"
        view_route="banner-image.show" edit_route="banner-image.edit" :hidden_field="['id', 'sub_title', 'extra', 'created_at', 'updated_at']" />
@endsection
