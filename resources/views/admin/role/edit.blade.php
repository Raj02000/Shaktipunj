@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Roles" />
    <x-admin.card title="Edit Role">
        <form id="roleForm" method="post" action="{{ route('roles.update', $role->id) }}">
            @csrf
            <x-admin.input name="name" label="Name" :oldvalue="$role->name" placeholder="Enter Role Name" />
            {{-- {{dd($role,$role->getAllPermissions())}} --}}
            <div class="form-group mt-3">
                <label for="permissions">Select Permissions</label>
                <select class="form-select" name="permissions[]" multiple id="">
                    <option  value="">Select Permissions</option>
                    @forelse ($permissions as $item)
                        <option @if (in_array($item, (array) old('permissions', $rolePermissions)))selected @endif value="{{ $item }}">{{ $item }}</option>
                    @empty
                    @endforelse
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </x-admin.card>
@endsection
