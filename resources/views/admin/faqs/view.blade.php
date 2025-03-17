@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="FAQ's" />

    <x-admin.table-view :values="$faq" canEdit="edit_faq" canDelete="delete_faq" edit_route="faq.edit"
        delete_route="faq.delete" />
@endsection
