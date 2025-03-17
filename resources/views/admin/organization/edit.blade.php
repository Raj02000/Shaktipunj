@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Edit organization" />

    <x-admin.card title="About">
        <form id="serviceForm" action="{{ route('admin.organization.update', $organization->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf

            <x-admin.input name="name" label="Title" placeholder="Enter Title" :oldvalue="$organization->name" />
            <x-admin.input name="address" label="Address" placeholder="Enter Address" :oldvalue="$organization->address" />
            <x-admin.input name="phone" label="Phone Number" placeholder="Enter Phone Number" :oldvalue="$organization->phone" />
            <x-admin.input name="alt_phone" label="Alternative Phone Number (Optional)"
                placeholder="Enter Alternative Phone Number" :oldvalue="$organization->alt_phone" />
            <x-admin.input name="whatsapp_phone" label="Whatsapp Number" placeholder="Enter Whatsapp Number"
                :oldvalue="$organization->whatsapp_phone" />
            <x-admin.input name="email" label="Email" placeholder="Enter Email" :oldvalue="$organization->email" />
            <x-admin.input name="license_no" label="License No" placeholder="Enter License No" :oldvalue="$organization->license_no" />
            <x-admin.input name="facebook" label="Facebook URL" placeholder="Enter Facebook URL" :oldvalue="$organization->facebook" />
            <x-admin.input name="linkedIn" label="LinkedIn URL" placeholder="Enter LinkedIn URL" :oldvalue="$organization->linkedIn" />
            <x-admin.input name="instagram" label="Instagram URL" placeholder="Enter Instagram URL" :oldvalue="$organization->instagram" />
            <x-admin.input name="twitter" label="Twitter URL" placeholder="Enter Twitter URL" :oldvalue="$organization->twitter" />
            <x-admin.input name="youtube" label="Youtube URL" placeholder="Enter Youtube URL" :oldvalue="$organization->youtube" />
            <x-admin.input name="pinterest" label="Pinterest URL" placeholder="Enter Pinterest URL" :oldvalue="$organization->pinterest" />

            <div class = 'mt-2 form-group mb-3'>
                <label for="map" class="form-label">Map Iframe</label>
                <textarea class="form-control" name="map">{{ isset($organization->extra['map']) ? $organization->extra['map'] : null }}</textarea>
            </div>
            <button class="btn btn-primary" type="submit">Update</button>

        </form>
    </x-admin.card>
@endsection
