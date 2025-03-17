@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Roles" />
    <x-admin.card title="Add Role">
        <form id="roleForm" method="POST" action="{{ route('roles.store') }}">
            @csrf
            <x-admin.input name="name" label="Name" placeholder="Enter Role Name" />
            <div class="form-group mt-3">
                <label for="permissions">Select Permissions</label>
                <select class="form-select" name="permissions[]" multiple id="">
                    <option selected value="">Select Permissions</option>
                    @forelse ($permissions as $item)
                        <option  value="{{ $item->name }}">{{ $item->name }}</option>
                    @empty
                    @endforelse
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </x-admin.card>
@endsection
