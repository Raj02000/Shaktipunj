@extends('admin.layout.admin-layout')

@section('body')
    <x-admin.page-header title="Our Process" />

    @isset($ourProcess)
        <x-admin.card title="Edit Our Process">
            <form action="{{ route('our-process.update', $ourProcess->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                
                <x-admin.input name="title" label="Title" placeholder="Enter Title" :oldvalue=" $ourProcess->title"  />
                
                <x-admin.input-textarea name="description" label="Description" :oldvalue=" $ourProcess->description"/>
                
                <x-admin.image-view :imageurl="$ourProcess->image"/>
                <x-admin.input name="image" label="Image" type="file" />
                
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </x-admin.card>
    @else
        <x-admin.card title="Add Our Process">
            <form action="{{ route('our-process.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <x-admin.input name="title" label="Title" placeholder="Enter Title"  />
                
                <x-admin.input-textarea name="description" label="Description" />
                
                <x-admin.input name="image" label="Image" type="file" />

                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </x-admin.card>
    @endisset
@endsection
