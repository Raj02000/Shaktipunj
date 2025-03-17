@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Blogs" />

    @isset($blog)
        <x-admin.card title="Edit Blog">
            <form action="{{ route('blog.update', $blog->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <x-admin.input name="title" label="Title" :oldvalue="$blog->title" placeholder="Enter Title" />
                <x-admin.input-select name="tag_id" label="Select Tag" :values="$tags" :oldvalue="$blog->tag_id" />
                <x-admin.image-view :imageurl="$blog->image" />
                <x-admin.input type="file" name="image" label="Image" />
                <x-admin.input-textarea :ckeditor="true" name="description" label="Content" :oldvalue="$blog->content" />
                <x-admin.input name="meta_title" label="Meta Title" :oldvalue="$blog->meta_title" placeholder="Enter Meta Title" />
                <x-admin.input name="meta_description" label="Meta Description" :oldvalue="$blog->meta_description" placeholder="Enter Meta Description" />
                <x-admin.input name="meta_keywords" label="Meta Keywords" :oldvalue="$blog->meta_keywords" placeholder="Enter Meta Keywords (Separate by comma)" />
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </x-admin.card>
    @else
        <x-admin.card title="Add Blog">

            <form action="{{ route('blog.store') }}" class="form-sample mt-4" method="post" enctype="multipart/form-data">
                @csrf
                <x-admin.input name="title" label="Title" placeholder="Enter Title" />
                <x-admin.input-select name="tag_id" label="Select Tag" :values="$tags" />
                <x-admin.input type="file" name="image" label="Image" />
                <x-admin.input-textarea :ckeditor="true" name="description" label="Content" />

                <x-admin.input name="meta_title" label="Meta Title" placeholder="Enter Meta Title" />
                <x-admin.input name="meta_description" label="Meta Description" placeholder="Enter Meta Description" />
                <x-admin.input name="meta_keywords" label="Meta Keywords" placeholder="Enter Meta Keywords (Separate by comma)" />
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </x-admin.card>
    @endisset
@endsection
