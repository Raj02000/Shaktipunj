@extends('admin.layout.admin-layout')
@section('body')
<x-admin.page-header title="Topic" />

<x-admin.table-view :values="$destination" edit_route="destination.edit" delete_route="destination.delete" />
@endsection