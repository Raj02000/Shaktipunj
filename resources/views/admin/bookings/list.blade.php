@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Bookings" />
    @component('components.admin.data-table', [
        'values' => $bookings,
        'view_route' => 'bookings.show',
        'hidden_fields' => [
            'id',
            'title',
            'l_name',
            'email',
            'country',
            'country_code',
            'pickup_details',
            'comments',
            'terms',
            'created_at',
            'updated_at',
        ],
        'columns' => [
            'f_name' => 'First Name',
            'l_name' => 'Last Name',
            'start_date' => 'Date',
            'package_id' => 'Package',
        ],
        'custom_render' => [
            'package_id' => function ($value, $row) {
                return $row->package?->name;
            },
            'start_date' => function ($value, $row) {
                return \Carbon\Carbon::parse($row->start_date)->format('M j, Y');
            },
        ],
    ])
    @endcomponent
@endsection
