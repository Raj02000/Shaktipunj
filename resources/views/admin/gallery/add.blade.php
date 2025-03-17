@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Gallery" />
    @isset($gallery)
        <x-admin.card title="Edit Gallery Item">
            <form action="{{ route('gallery.update', $gallery->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <x-admin.input name="title" label="Title" type="text" placeholder="Enter Image Title" :oldvalue="$gallery->title" />
                <x-admin.image-view :imageurl="$gallery->image" />
                <x-admin.input name="image" label="Image" type="file" />
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </x-admin.card>
    @else
        <x-admin.card title="Add Gallery Item">
            <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <x-admin.input name="title" label="Title" placeholder="Enter Image Title"/>
                <x-admin.input name="image" label="Image" type="file" />
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </x-admin.card>
    @endisset
@endsection
