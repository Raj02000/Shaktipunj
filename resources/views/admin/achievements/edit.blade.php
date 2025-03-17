@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Edit Core value" />

    <x-admin.card title="Our Achievements">
        <form id="serviceForm" action="{{ route('admin.achievements.update', $achievement->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <x-admin.input name="title" label="Title" placeholder="Enter Title" :oldvalue="$achievement->title" />
            <x-admin.input name="value" label="Value" placeholder="Enter Value" :oldvalue="$achievement->value" />
            <x-admin.input name="postfix" label="Postfix" placeholder="Enter postfix" :oldvalue="$achievement->postfix" />
            <button class="btn btn-primary" type="submit">Update</button>

        </form>
    </x-admin.card>
@endsection
