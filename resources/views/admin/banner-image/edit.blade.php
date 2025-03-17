@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Banner Images" />
    <x-admin.card title="Edit Banner Image">
        <form id="bannerImageForm" action="{{ route('banner-image.update', $bannerImage->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <x-admin.image-view :imageurl="$bannerImage->image" />
            <x-admin.input name="image" label="Image" type="file" />

            <x-admin.input name="sub_title" label="Sub Title" :oldvalue="$bannerImage->sub_title" />
            <x-admin.input name="title" label="Title" :oldvalue="$bannerImage->title" />
            <x-admin.input name="description" label="Description" :oldvalue="$bannerImage->description" />

            <div class='row'>
                <div class=col-2>
                    <x-admin.input name="button_label" value="Explore More" label="Button Label" :oldvalue="$bannerImage->extra['button_label']"
                        required />
                </div>
                <div class=col-10>
                    <x-admin.input name="redirect_url" label="Redirect Url" :oldvalue="$bannerImage->extra['redirect_url']" required />
                </div>
            </div>


            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </x-admin.card>
@endsection
