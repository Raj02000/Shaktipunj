@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="values" />
    <x-admin.card title="Edit Value Details">
        <form action="{{ route('value-policy.update', $valueAndPolicy->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-admin.input name="title" :oldvalue="$valueAndPolicy->title" label="Title" placeholder="Enter title" />
            <x-admin.input-textarea name="description" :oldvalue="$valueAndPolicy->description" />

            @isset($valueAndPolicy->images)
                @forelse ($valueAndPolicy->images as $item)
                    <x-admin.image-view :imageurl="$item" :id="$valueAndPolicy->id" />
                @empty
                @endforelse
            @endisset
            <div class="mt-3 form-group">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="images" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </x-admin.card>
@endsection
