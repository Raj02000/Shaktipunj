@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Approaches" />
    <x-admin.card title="Edit Approach Details">
        <form action="{{ route('approach.update', $ourApproach->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-admin.input name="title" :oldvalue="$ourApproach->title" label="Title" placeholder="Enter title" />

            <x-admin.input-textarea name="description" :oldvalue="$ourApproach->description" />

            <select name="name" id="" class="form-select">
                <option value="" selected>category</option>
                <option @selected($ourApproach->category_name == 'PROGRAMMATIC APPROACHES') value="PROGRAMMATIC APPROACHES">Programmatic Approaches</option>
                <option @selected($ourApproach->category_name == 'INSTITUTIONAL APPROACHES') value="INSTITUTIONAL APPROACHES">Institutional Approaches</option>
            </select>

            @isset($ourApproach->image)
                <x-admin.image-view :imageurl="$ourApproach->image" />
            @endisset
            <div class="mt-3 form-group">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="images" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </x-admin.card>
@endsection
