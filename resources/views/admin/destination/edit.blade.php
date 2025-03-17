@extends('admin.layout.admin-layout')
@section('body')
{{-- {{ dd($destination) }} --}}
<x-admin.page-header title="Topic" />


<form action="{{ route('destination.update', $destination->id) }}" method="post" enctype="multipart/form-data"
    class="form-sample">
    @csrf

    <x-admin.card title="Edit Topic">

        <x-admin.image-view :imageurl="$destination->image" title="Existing Image" />
        <x-admin.input type="file" name="image" label="Image" />

        <x-admin.image-view :imageurl="$destination->thumbnail" title="Existing Card Image" />
        <x-admin.input type="file" name="thumbnail" label="Card Image" />

        <x-admin.input name="name" label="Name" :oldvalue="$destination->name" placeholder="Enter Name" />

        <x-admin.input-select name="parent" label="Parent" :values="$destinations" :oldvalue="$destination->parent_id" />

        <x-admin.input-textarea :ckeditor="true" name="description" label="Description" :oldvalue="$destination->description" />

        <x-admin.input name="meta_title" label="Meta Title" :oldvalue="$destination->meta_title" placeholder="Enter Meta Title" />
        <x-admin.input name="meta_description" label="Meta Description" :oldvalue="$destination->meta_description"
            placeholder="Enter Meta Description" />
        <x-admin.input name="meta_keywords" label="Meta Keywords" :oldvalue="$destination->meta_keywords"
            placeholder="Enter Meta Keywords (Separate by comma)" />

        <button type="submit" class="btn btn-gradient-primary me-2 mt-4">Submit</button>

    </x-admin.card>
</form>
@endsection