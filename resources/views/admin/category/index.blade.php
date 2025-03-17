@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Categories" />

    @component('components.admin.data-table', [
        'values' => $categories,
        'add_route' => 'category.add',
        'view_route' => 'category.show',
        'edit_route' => 'category.edit',
        'delete_route' => 'category.delete',
        'hidden_fields' => ['id', 'slug', 'extra', 'description', 'created_at', 'updated_at', 'is_editable'],
        'custom_render' => [
            'publish' => function ($value, $row) {
                if ($row->is_editable) {
                    return view('components.admin.publish', [
                        'route' => route('category.changePublish', $row->id),
                        'data' => $row,
                    ]);
                } else {
                    return '';
                }
            },
        ],
    ])
    @endcomponent
@stop
