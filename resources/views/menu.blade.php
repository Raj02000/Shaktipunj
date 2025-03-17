@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Menu" />

    <form action="{{ route('store-menu') }}" method="post" class="form-sample">
        @csrf

        <x-admin.card title="Menu">
            <div class="row">
                <div class="col-8">
                    <x-admin.input-select name="menu_id" placeholder="Select Destinations" :values="$destinations"
                        :oldvalue="$org->menu_id" />
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-gradient-primary form-group mt-3">Add</button>
                </div>
            </div>
        </x-admin.card>


        <x-admin.card>
            <div class="row">
                <div class="col-8">
                    <x-admin.input-select name="second_menu_id" placeholder="Select Destinations" :values="$destinations" :oldvalue="$org->second_menu_id"/>
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-gradient-primary form-group mt-3">Add</button>
                </div>
            </div>
        </x-admin.card>

    </form>
@endsection
