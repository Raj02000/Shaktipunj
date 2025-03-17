@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Testimonials" />
    {{-- {{ dd($testimonials) }} --}}

    @isset($testimonials)
        <x-admin.card title="Edit Testimonial">
            <form action="{{ route('testimonial.update', $testimonials->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <x-admin.image-view :imageurl="$testimonials->image" />
                <x-admin.input name="image" label="Image" type="file" />
                <x-admin.input name="name" label="Name" :oldvalue="$testimonials->name" placeholder="Enter Name" />
                <x-admin.input name="message" label="Message" :oldvalue="$testimonials->message" placeholder="Enter Message" />
                <x-admin.input name="qualification" label="Qualification" :oldvalue="$testimonials->qualification" placeholder="Enter Qualification" />
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </x-admin.card>
    @else
        <x-admin.card title="Add Testimonial">

            <form action="{{ route('testimonial.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <x-admin.input name="image" label="Image" type="file" />
                <x-admin.input name="name" label="Name" placeholder="Enter Name" />
                <x-admin.input name="qualification" label="Qualification" placeholder="Enter Qualification" />
                <x-admin.input name="message" label="Message" placeholder="Enter Message" />
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </x-admin.card>
    @endisset
@endsection
