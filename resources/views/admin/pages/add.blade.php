@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Add Page" />

    <form action="{{ route('page.store', ['model' => $model]) }}" method="post" enctype="multipart/form-data"
        class="form-sample">
        @csrf

        <x-admin.card>
            <x-admin.input type="file" name="image" label="Image" />
            <x-admin.input name="title" label="Title" placeholder="Enter Title" />
        </x-admin.card>

        <x-admin.card title="Content">
            <x-admin.input-textarea :ckeditor="true" name="content" />
        </x-admin.card>

        <x-admin.card title="Meta Information">
            <x-admin.input name="meta_title" label="Meta Title" placeholder="Enter Meta Title" />
            <x-admin.input name="meta_description" label="Meta Description" placeholder="Enter Meta Description" />
            <x-admin.input name="meta_keywords" label="Meta Keywords"
                placeholder="Enter Meta Keywords (Separate by comma)" />
        </x-admin.card>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
@endsection
