@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Partners" />

    <form action="{{ route('partner.store') }}" method="post" enctype="multipart/form-data" class="form-sample">
        @csrf

        <x-admin.card title="Add Partner">
            <x-admin.input name="name" label="Name" placeholder="Enter Partner Name" />
            <x-admin.input type="file" name="logo" label="URL" placeholder="Enter Partner URL" />
            <button type="submit" class="btn btn-gradient-primary me-2 mt-4">Submit</button>
        </x-admin.card>
    </form>
@endsection
