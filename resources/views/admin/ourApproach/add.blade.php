@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Our Approach" />
    <x-admin.card title="Add Our Approach">
        <form action="{{ route('approach.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-admin.input name="title" label="Title" placeholder="Enter title" />
            <x-admin.input-textarea name="description" label="Description" placeholder="Enter Description" />
            <div class="form-group mt-3">
                <label for="name">Category</label>
                <select name="name" id="" class="form-select">
                    <option value="" selected>category</option>
                    <option value="PROGRAMMATIC APPROACHES">Programmatic Approaches</option>
                    <option value="INSTITUTIONAL APPROACHES">Institutional Approaches</option>
                </select>
            </div>
            <div class="mt-3 form-group">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </x-admin.card>
@endsection
