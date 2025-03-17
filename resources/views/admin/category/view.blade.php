@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Category" />

    <x-admin.table-view :values="$category" edit_route="category.edit" delete_route="category.delete" />

    <form action="{{ route('category.assignPackage', $category->id) }}" method="post" enctype="multipart/form-data"
        class="form-sample">
        @csrf

        <x-admin.card title="Packages">
            <div class="row">
                <div class="col-8">
                    <x-admin.input-select name="package_id" placeholder="Select Product" :values="$packages" />
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-gradient-primary form-group mt-3">Add</button>
                </div>
            </div>
        </x-admin.card>

    </form>

    @component('components.admin.data-table', [
        'values' => $category->packages,
        'canAdd' => false,
        'canEdit' => false,
        'action' => false,
        'hidden_fields' => [
            'id',
            'slug',
            'faqs',
            'extra',
            'description',
            'created_at',
            'updated_at',
            'itinerary',
            'packable_type',
            'packable_id',
            'trip_map',
            'trip_id',
            'what_we_expect',
            'include',
            'tag_id',
            'exclude',
            'cost_dates',
            'useful_info',
            'reviews',
            'meta_title',
            'meta_description',
            'meta_keywords',
        ],
        'columns' => [
            'faqs' => 'FAQs',
            'overview' => 'Actions',
        ],
        'custom_render' => [
            'image' => function ($value, $row) {
                return view('components.image-render', ['path' => $value]);
            },
            'overview' => function ($value, $row) use ($category) {
                return view('components.delete', [
                    'route' => route('category.detachPackage', $category->id),
                    'values' => [
                        'package_id' => $row->id,
                    ],
                ]);
            },
        ],
    ])
    @endcomponent
@endsection
