@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Activities" />

    <form action="{{ route('activities.update', $activities->id) }}" method="post" enctype="multipart/form-data"
        class="form-sample">
        @csrf

        <x-admin.card title="Edit Activities">
            <x-admin.image-view :imageurl="$activities->logo" title="Existing Image" />
            <x-admin.input type="file" name="logo" label="Logo" />
            <x-admin.input name="name" label="Name" placeholder="Enter Name" :oldvalue="$activities->name" required />
            <x-admin.input type="url" name="url" label="URL" placeholder="Enter URL" :oldvalue="$activities->url"
                required />

            <button type="submit" class="btn btn-gradient-primary me-2 mt-4">Submit</button>
        </x-admin.card>
    </form>
@endsection
