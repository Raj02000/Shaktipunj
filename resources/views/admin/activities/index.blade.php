@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Activities" />

    @component('components.admin.data-table', [
        'values' => $activities,
        'add_route' => 'activities.add',
        'view_route' => 'activities.show',
        'edit_route' => 'activities.edit',
        'delete_route' => 'activities.delete',
        'hidden_fields' => ['id', 'created_at', 'updated_at'],
        'columns' => [
            'name' => 'Activities Name',
        ],
        'custom_render' => [
            'logo' => function ($value, $row) {
                return view('components.image-render', ['path' => $value]);
            },
        ],
    ])
    @endcomponent
@stop
