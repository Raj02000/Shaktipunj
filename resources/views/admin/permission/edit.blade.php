@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Permissions" />
    <x-admin.card title="Edit Permission">
        <form id="permissionForm" method="POST" action="{{ route('permission.update', $permission->id) }}">
            @csrf
            <x-admin.input name="name" label="Name" :oldvalue="$permission->name" placeholder="Enter Permission Name" />

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </x-admin.card>
@endsection
