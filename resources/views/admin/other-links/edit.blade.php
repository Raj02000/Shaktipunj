@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Links" />

    <form id="extraForm" method="POST" class="p-5" action="{{ route('link.update', $otherLink->id) }}"
        enctype="multipart/form-data">
        @csrf
        <!-- Initial set of fields -->
        <div id="extraEntries" class="extra-entry ">
            <x-admin.card title="Edit Link">
                <x-admin.input name="name" label="Name" :oldvalue="$otherLink->title" placeholder="Enter name" />
                <x-admin.input name="link" label="Link" :oldvalue="$otherLink->link" placeholder="Enter Link" />
            </x-admin.card>

        </div>
        <button type="submit" class="mt-3 btn btn-primary">Submit</button>
    </form>
@endsection
