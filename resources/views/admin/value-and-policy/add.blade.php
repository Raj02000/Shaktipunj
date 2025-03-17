@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Values" />
    <x-admin.card title="Add Values Member">
        <form action="{{ route('value-policy.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-admin.input name="title" label="Title" placeholder="Enter title" />
            <x-admin.input-textarea name="description" label="description" />
            <div class="mt-3 form-group">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="images" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </x-admin.card>
@endsection
