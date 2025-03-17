@extends('admin.layout.admin-layout')
@section('body')
    {{-- {{ dd($tag) }} --}}
    <x-admin.page-header title="Tag" />


    <form action="{{ route('tag.update', $tag->id) }}" method="post" enctype="multipart/form-data" class="form-sample">
        @csrf
        <x-admin.card title="Edit Tag">
            <x-admin.input name="name" label="Name" :oldvalue="$tag->name" placeholder="Enter Name" />
            <button type="submit" class="btn btn-gradient-primary me-2 mt-4">Submit</button>
        </x-admin.card>
    </form>
@endsection
