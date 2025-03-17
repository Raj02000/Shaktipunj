@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Users" />
    <x-admin.card title="Add User">
        <form method="POST" action="{{ route('users.update',$user->id) }}">
            @csrf
            <x-admin.input name="name" label="Name" :oldvalue="$user->name" placeholder="Enter Name" />
            <x-admin.input name="email" label="Email" :oldvalue="$user->email" placeholder="Enter Email" />
            <x-admin.input type="password" name="password" label="Password" placeholder="Enter Password" />


            <div class="form-group mt-3">
                <label for="role">Select Role</label>
                <select class="form-select" name="role[]" multiple id="">
                    <option  value="">Select Role</option>
                    {{-- @dump($roles)
                    @dump($user->getRoleNames()) --}}
                    {{-- {{dd($roles, in_array($roles , (array) old('permissions', $user->getRoleNames())))}} --}}
                    @forelse ($roles as $item)
                        <option @if (in_array($item , old('permissions', $user->getRoleNames()->toArray())))selected @endif value="{{ $item }}">{{ $item }}</option>
                    @empty
                    @endforelse
                </select>
            </div>

            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </x-admin.card>
@endsection
