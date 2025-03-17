@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Trip" />

    <form action="{{ route('trip.store') }}" method="post" enctype="multipart/form-data" class="form-sample">
        @csrf

        <x-admin.card title="Add Trip">
            <x-admin.input type="file" name="image" label="Image" />
            <x-admin.input name="name" label="Name" placeholder="Enter Name" />
            <x-admin.input-textarea :ckeditor="true" name="description" label="Description" />
            <button type="submit" class="btn btn-gradient-primary me-2 mt-4">Submit</button>
        </x-admin.card>
    </form>
@endsection
