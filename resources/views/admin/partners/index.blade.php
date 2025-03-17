@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Partners" />

    @component('components.admin.data-table', [
        'values' => $partners,
        'add_route' => 'partner.add',
        'view_route' => 'partner.show',
        'edit_route' => 'partner.edit',
        'delete_route' => 'partner.delete',
        'hidden_fields' => ['id', 'created_at', 'updated_at'],
        'columns' => [
            'name' => 'Partner Name',
        ],
        'custom_render' => [
            'logo' => function ($value, $row) {
                return view('components.image-render', ['path' => $value]);
            },
        ],
    ])
    @endcomponent
@stop
