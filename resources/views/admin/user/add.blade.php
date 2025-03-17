@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Users" />
    <x-admin.card title="Add User">
        <form id="UserForm" method="POST" action="{{ route('users.store') }}">
            @csrf
            <x-admin.input name="name" label="Name" placeholder="Enter Name" />
            <x-admin.input name="email" label="Email" placeholder="Enter Email" />
            <x-admin.input type="password" name="password" label="Password" placeholder="Enter Password" />

            <div class="form-group mt-3">
                <label for="role">Select Role</label>
                <select class="form-select" name="role[]" multiple id="">
                    <option selected value="">Select Role</option>
                    @forelse ($roles as $item)
                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                    @empty
                    @endforelse
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </x-admin.card>
@endsection
