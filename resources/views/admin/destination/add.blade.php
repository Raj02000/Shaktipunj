@extends('admin.layout.admin-layout')
@section('body')
<x-admin.page-header title="Topic" />

<form action="{{ route('destination.store') }}" method="post" enctype="multipart/form-data" class="form-sample">
    @csrf

    <x-admin.card title="Add Topic">
        <x-admin.input type="file" name="image" label="Image" />
        <x-admin.input type="file" name="thumbnail" label="Card Image" />
        <x-admin.input name="name" label="Name" placeholder="Enter Name" />
        <x-admin.input-select name="parent" label="Parent" :values="$destinations" />
        <x-admin.input-textarea :ckeditor="true" name="description" label="Description" />

        <x-admin.input name="meta_title" label="Meta Title" placeholder="Enter Meta Title" />
        <x-admin.input name="meta_description" label="Meta Description" placeholder="Enter Meta Description" />
        <x-admin.input name="meta_keywords" label="Meta Keywords" placeholder="Enter Meta Keywords (Separate by comma)" />
        <button type="submit" class="btn btn-gradient-primary me-2 mt-4">Submit</button>
    </x-admin.card>
</form>
@endsection