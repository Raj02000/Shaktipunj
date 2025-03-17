@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Blogs" />
    @component('components.admin.data-table', [
        'values' => $blogs,
        'add_route' => 'blog.add',
        'view_route' => 'blog.show',
        'edit_route' => 'blog.edit',
        'delete_route' => 'blog.delete',
        'hidden_fields' => [
            'id',
            'short_description',
            'content',
            'slug',
            'created_at',
            'updated_at',
            'meta_title',
            'meta_description',
            'meta_keywords',
        ],
        'columns' => [
            'tag_id' => 'Tag',
        ],
        'custom_render' => [
            'image' => function ($value, $row) {
                return view('components.image-render', ['path' => $value]);
            },
            'tag_id' => function ($value, $row) {
                return $row->tag?->name;
            },
        ],
    ])
    @endcomponent
@endsection
