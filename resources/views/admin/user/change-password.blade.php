@extends('admin.layout.admin-layout')

@section('body')
    <x-admin.page-header title="Security" />
    <x-admin.card title="Change Password Form">
        <form action="{{ route('update.password') }}" method="post">
            @csrf
            <x-admin.input name="current_password" label="Current Password" type="password"
                placeholder="Enter Current Password" />
            <x-admin.input name="password" label="New Password" type="password" placeholder="Enter New Password" />
            <x-admin.input name="password_confirmation" label="Confirm Password" type="password"
                placeholder="Enter Confirm Password" />

            <button type="submit" class="btn btn-gradient-success">Change Password</button>
        </form>
    </x-admin.card>
@endsection
