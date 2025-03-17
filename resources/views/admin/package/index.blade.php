@extends('admin.layout.admin-layout')
@section('body')

    <x-admin.page-header title="Package" />
    <div class="">

        <div class="row align-items-center my-3">
            <div class="col-md-4 mb-2 mb-md-0">
                <a href="{{ route('package.add') }}" class="btn btn-primary">Add</a>
            </div>
            <div class="col-md-8">
                <form action="{{ route('package.index') }}" method="GET">
                    <div class="input-group">
                        <input name="search" placeholder="Search Packages" class="form-control"
                            value="{{ request('search') }}" />
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a href="{{ route('package.index') }}" class="btn btn-secondary ms-2">Clear</a>
                    </div>
                </form>
            </div>
        </div>

        @include('components.admin.data-table', [
            'values' => $packages,
            'add_route' => 'package.add',
            'view_route' => 'package.show',
            'canAdd' => false,
            'edit_route' => 'package.edit',
            'delete_route' => 'package.delete',
            'hidden_fields' => [
                'id',
                'slug',
                'faqs',
                'extra',
                'description',
                'created_at',
                'location',
                'discount',
                'updated_at',
                'overview',
                'itinerary',
                'packable_type',
                'packable_id',
                'trip_map',
                'trip_id',
                'what_we_expect',
                'include',
                'exclude',
                'cost_dates',
                'useful_info',
                'meta_title',
                'meta_description',
                'meta_keywords',
            ],
            'columns' => [
                'faqs' => 'FAQs',
                'tag_id' => 'Tag',
                'destination_id' => 'Destination',
            ],
            'custom_render' => [
                'image' => function ($value, $row) {
                    return view('components.image-render', ['path' => $value]);
                },
                'destination_id' => function ($value, $row) {
                    return $row->destination?->name;
                },
                'tag_id' => function ($value, $row) {
                    return $row->tag?->name;
                },
            ],
        ])
    </div>
@stop
