@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Activities" />

    <form action="{{ route('activities.store') }}" method="post" enctype="multipart/form-data" class="form-sample">
        @csrf

        <x-admin.card title="Add Activities">
            <x-admin.input name="name" label="Name" placeholder="Enter Name" required />
            <x-admin.input type="file" name="logo" label="Logo" required />
            <x-admin.input type="url" name="url" label="URL" placeholder="Enter URL" required />
            <button type="submit" class="btn btn-gradient-primary me-2 mt-4">Submit</button>
        </x-admin.card>
    </form>
@endsection
