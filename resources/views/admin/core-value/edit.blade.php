@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Edit Core value" />

    <x-admin.card :title="$value->type">
        <form id="serviceForm" action="{{ route('admin.core-value.update', $value->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <x-admin.image-view :imageurl="$value->image" />
            <x-admin.input name="image" label="Image" type="file" />

            <x-admin.input name="title" label="Title" placeholder="Enter Title" :oldvalue="$value->title" />

            <x-admin.input-textarea name="description" label="Description" :oldvalue="$value->description" />


            <button class="btn btn-primary" type="submit">Update</button>

        </form>
    </x-admin.card>
@endsection
