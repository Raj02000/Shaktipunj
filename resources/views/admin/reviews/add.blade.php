@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Quick Link" />

    <form action="{{ route('quick-link.store') }}" method="post" class="form-sample">
        @csrf
        <x-admin.card title="Add Quick Link">
            <x-admin.input name="name" label="Name" placeholder="Enter Link Name" required />
            <x-admin.input type="url" name="url" label="URL" placeholder="Enter URL" required />
            <button type="submit" class="btn btn-gradient-primary me-2 mt-4">Submit</button>
        </x-admin.card>
    </form>
@endsection
