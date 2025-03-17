@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Tags" />

    @component('components.admin.data-table', [
        'values' => $tags,
        'add_route' => 'tag.add',
        'view_route' => 'tag.show',
        'edit_route' => 'tag.edit',
        'delete_route' => 'tag.delete',
        'hidden_fields' => ['id', 'slug', 'extra', 'description', 'created_at', 'updated_at'],
        'custom_render' => [
            'publish' => function ($value, $row) {
                return view('components.admin.publish', [
                    'route' => route('tag.changePublish', $row->id),
                    'data' => $row,
                ]);
            },
        ],
    ])
    @endcomponent
@stop
