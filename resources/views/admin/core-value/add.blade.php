@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Service Item" />
    <x-admin.card title="Add Service Item">
        <form id="serviceForm" action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-admin.input name="thumbnail" label="Thumbnail image" type="file" />

            <x-admin.input name="title" label="Title" placeholder="Enter Title" />
            <x-admin.input name="short_description" label="Short Description" placeholder="Short Description" />

            <x-admin.input-textarea name="description" label="Description" />

            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </x-admin.card>
@endsection
