@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="FAQ's" />
    <x-admin.table :values="$faqs" add_route="faq.add" view_route="faq.show" edit_route="faq.edit" delete_route="faq.delete"
        :hidden_field="['id', 'created_at', 'updated_at']" />
@endsection
