@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Permissions" />
    <x-admin.card title="Add Permission">
        <form id="permissionForm" method="POST" action="{{ route('permission.store') }}">
            @csrf
            <x-admin.input name="name" label="Name" placeholder="Enter Permission Name" />

            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </x-admin.card>
@endsection
