@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Package" />

    @include('components.admin.data-view', [
        'values' => $package,
        'columns' => ['destination_id' => 'Destination', 'tag_id' => 'Tag'],
        'hidden_fields' => [
            'id',
            'extra',
            'discount',
            'what_we_expect',
            'cost_dates',
            'faqs',
            'extra',
            'meta_title',
            'meta_description',
            'meta_keywords',
        ],
        'custom_render' => [
            'package_id' => fn($value, $row) => $row->package?->name,
            'image' => fn($value) => view('components.image-render', ['path' => $value]),
            'created_at' => fn($value) => \Carbon\Carbon::parse($value)->format('d-m-Y'),
            'destination_id' => fn($value, $row) => $row->destination?->name,
            'tag_id' => fn($value, $row) => $row->tag?->name,
            'created_at' => fn($value) => \Carbon\Carbon::parse($value)->format('d-m-Y'),
            'updated_at' => fn($value) => \Carbon\Carbon::parse($value)->format('d-m-Y'),
        ],
        'edit_route' => 'trip.edit',
        'delete_route' => 'trip.delete',
    ])
    {{-- <x-admin.table-view :values="$package" edit_route="trip.edit" delete_route="trip.delete" /> --}}
@endsection
