@extends('admin.layout.admin-layout')

@section('body')
    <x-admin.page-header title="University" />

    @isset($university)
        <x-admin.card title="Edit University">
            <form action="{{ route('university.update', $university->id) }}" class="form-sample" method="post"
                enctype="multipart/form-data">
                @csrf

                <x-admin.input name="name" label="Name" :oldvalue="$university->name" placeholder="Enter name" />
                <x-admin.input name="link" label="Link" :oldvalue="$university->link" placeholder="Enter link" />
                <x-admin.input-select name="country_id" :values="$country" label="Country" :oldvalue="$university->country_id" />

                <x-admin.image-view :imageurl="$university->image" />
                <x-admin.input type="file" label="University Image" name="image" />

                <button type="submit" class="btn btn-gradient-primary me-2 mt-4">Update</button>

            </form>
        </x-admin.card>
    @else
        <x-admin.card title="Add University">

            <form action="{{ route('university.store') }}" method="post" class="form-label" enctype="multipart/form-data">
                @csrf

                <x-admin.input name="name" label="Name" placeholder="Enter name" />
                <x-admin.input name="link" label="Link" placeholder="Enter link" />
                <x-admin.input-select name="country_id" :values="$country" label="Country" />
                <x-admin.input type="file" label="University logo" name="image" />

                <button type="submit" class="btn btn-gradient-primary me-2 mt-4">Add</button>

            </form>
        </x-admin.card>
    @endisset
@endsection
