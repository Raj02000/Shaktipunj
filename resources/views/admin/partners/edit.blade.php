@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Partners" />

    <form action="{{ route('partner.update', $partner->id) }}" method="post" enctype="multipart/form-data" class="form-sample">
        @csrf

        <x-admin.card title="Edit Partner">
            <x-admin.image-view :imageurl="$partner->logo" title="Existing Image" />
            <x-admin.input type="file" name="logo" label="URL" placeholder="Enter Partner URL" />
            <x-admin.input name="name" label="Name" placeholder="Enter Partner Name" :oldvalue="$partner->name" />

            <button type="submit" class="btn btn-gradient-primary me-2 mt-4">Submit</button>
        </x-admin.card>
    </form>
@endsection
