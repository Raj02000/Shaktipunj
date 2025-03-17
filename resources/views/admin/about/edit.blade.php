@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Edit about" />

    <x-admin.card title="About">
        <form id="serviceForm" action="{{ route('admin.about.update', $about->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf

            <x-admin.image-view :imageurl="$about->image" />
            <x-admin.input name="image" label="Image" type="file" />

            <x-admin.input-textarea :ckeditor="true" name="content" label="Content" :oldvalue="$about->content" />

            <button class="btn btn-primary" type="submit">Update</button>

        </form>
    </x-admin.card>
@endsection
