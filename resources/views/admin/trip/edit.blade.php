@extends('admin.layout.admin-layout')
@section('body')
    {{-- {{ dd($trip) }} --}}
    <x-admin.page-header title="Trip" />


    <form action="{{ route('trip.update', $trip->id) }}" method="post" enctype="multipart/form-data" class="form-sample">
        @csrf

        <x-admin.card title="Edit Trip">

            <x-admin.image-view :imageurl="$trip->image" title="Existing Image" />
            <x-admin.input type="file" name="image" label="Image" />


            <x-admin.input name="name" label="Name" :oldvalue="$trip->name" placeholder="Enter Name" />

            <x-admin.input-textarea :ckeditor="true" name="description" label="Description" :oldvalue="$trip->description" />
            <button type="submit" class="btn btn-gradient-primary me-2 mt-4">Submit</button>

        </x-admin.card>
    </form>
@endsection
