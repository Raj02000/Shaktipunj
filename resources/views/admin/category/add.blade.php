@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Category" />

    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data" class="form-sample">
        @csrf

        <x-admin.card title="Add Category">
            <x-admin.input name="name" label="Name" placeholder="Enter Category Name" />
            <button type="submit" class="btn btn-gradient-primary me-2 mt-4">Submit</button>
        </x-admin.card>
    </form>
@endsection
