@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Quick Link" />

    <form action="{{ route('quick-link.update', $link->id) }}" method="post" class="form-sample">
        @csrf

        <x-admin.card title="Edit Quick Link">
            <x-admin.input name="name" label="Name" placeholder="Enter Link Name" :oldvalue="$link->name" required />
            <x-admin.input type="url" name="url" label="URL" placeholder="Enter URL" :oldvalue="$link->url" required />
            <x-admin.input type="number" name="order" label="Order" placeholder="Enter Order" :oldvalue="$link->order" required />
            <button type="submit" class="btn btn-gradient-primary me-2 mt-4">Submit</button>
        </x-admin.card>
    </form>
@endsection
