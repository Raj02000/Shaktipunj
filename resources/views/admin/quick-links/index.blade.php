@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Quick Links" />

    @component('components.admin.data-table', [
        'values' => $quickLinks,
        'add_route' => 'quick-link.add',
        'view_route' => 'quick-link.show',
        'can_view' => false,
        'edit_route' => 'quick-link.edit',
        'delete_route' => 'quick-link.delete',
        'hidden_fields' => ['id', 'extra', 'created_at', 'updated_at'],
        'columns' => [
            'name' => 'Link Name',
        ],
    ])
    @endcomponent
@stop
