@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Newsletters" />
    <x-admin.table :values="$newsletter" :hidden_field="['id', 'created_at', 'updated_at']" />
@endsection
