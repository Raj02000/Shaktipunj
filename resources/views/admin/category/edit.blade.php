@extends('admin.layout.admin-layout')
@section('body')
    {{-- {{ dd($category) }} --}}
    <x-admin.page-header title="Category" />


    <form action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data"
        class="form-sample">
        @csrf
        <x-admin.card title="Edit Category">
            <x-admin.input name="name" label="Name" :oldvalue="$category->name" placeholder="Enter Name" />
            <button type="submit" class="btn btn-gradient-primary me-2 mt-4">Submit</button>
        </x-admin.card>
    </form>
@endsection
