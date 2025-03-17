@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Banner Images" />
    <x-admin.card title="Add Banner Image">
        <form id="testForm" action="{{ route('banner-image.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div id="images">
                <div class="image-entry">
                    <x-admin.input name="image" label="Image" type="file" required />
                    {{-- <x-admin.input name="sub_title" label="Sub Title" required /> --}}
                    <x-admin.input name="title" label="Title" required />
                    <x-admin.input name="description" label="Description" />
                    <div class='row'>
                        <div class=col-2>
                            <x-admin.input name="button_label" value="Explore More" label="Button Label" required />
                        </div>
                        <div class=col-10>
                            <x-admin.input name="redirect_url" label="Redirect Url" required />
                        </div>
                    </div>

                </div>
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </x-admin.card>
@endsection
