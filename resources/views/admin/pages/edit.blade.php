@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Edit Page" />

    <form action="{{ route('page.update', ['page' => $page->id, 'model' => $model]) }}" method="post"
        enctype="multipart/form-data" class="form-sample">
        @csrf

        <x-admin.card>
            <x-admin.image-view :imageurl="$page->image" title="Existing Image" />
            <x-admin.input type="file" name="image" label="Image" />
            <x-admin.input name="title" label="Title" placeholder="Enter Title" :oldvalue="$page->title" />
        </x-admin.card>

        <x-admin.card title="Content">
            <x-admin.input-textarea :ckeditor="true" name="content" :oldvalue="$page->content" />
        </x-admin.card>

        <x-admin.card title="Meta Information">
            <x-admin.input name="meta_title" label="Meta Title" placeholder="Enter Meta Title" :oldvalue="$page->meta_title" />
            <x-admin.input name="meta_description" label="Meta Description" placeholder="Enter Meta Description"
                :oldvalue="$page->meta_description" />
            <x-admin.input name="meta_keywords" label="Meta Keywords" placeholder="Enter Meta Keywords (Separate by comma)"
                :oldvalue="$page->meta_keywords" />
        </x-admin.card>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
@endsection
