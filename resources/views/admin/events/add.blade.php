@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Events" />
    @isset($event)
        <x-admin.card title="Edit Event">
            <form action="{{ route('event.update', $event->id) }}" method="post">
                @csrf
                <x-admin.input name="title" label="Title" type="text" :oldvalue="$event->title" placeholder="Enter Title" />
                <x-admin.input name="date" label="Date" type="date" :oldvalue="$event->date" placeholder="Enter Date" />
                <x-admin.input-textarea name="description" label="Description" type="text" :oldvalue="$event->description"
                    placeholder="Enter Description" />
                <x-admin.input name="location" label="Location" type="text" :oldvalue="$event->location" placeholder="Enter Location" />
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </x-admin.card>
    @else
        <x-admin.card title="Edit Event">

            <form action="{{ route('event.store') }}" method="post">
                @csrf
                <x-admin.input name="title" label="Title" type="text" placeholder="Enter Title" />
                <x-admin.input name="date" label="Date" type="date" placeholder="Enter Date" />
                <x-admin.input-textarea name="description" label="Description" type="text" placeholder="Enter Description" />
                <x-admin.input name="location" label="Location" type="text" placeholder="Enter Location" />
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </x-admin.card>
    @endisset
@endsection
