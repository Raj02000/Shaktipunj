@extends('admin.layout.admin-layout')
@section('body')
<x-admin.page-header title="Topic" />

<div class="row align-items-center my-3">
    <div class="col-md-4 mb-2 mb-md-0">
        <a href="{{ route('destination.add') }}" class="btn btn-primary">Add</a>
    </div>
    <div class="col-md-8">
        <form action="{{ route('destination.index') }}" method="GET">
            <div class="input-group">
                <input name="search" placeholder="Search Topic" class="form-control"
                    value="{{ request('search') }}" />
                <button type="submit" class="btn btn-primary">Search</button>
                <a href="{{ route('destination.index') }}" class="btn btn-secondary ms-2">Clear</a>
            </div>
        </form>
    </div>
</div>

@component('components.admin.data-table', [
'values' => $destinations,
'add_route' => 'destination.add',
'canAdd' => false,
'view_route' => 'destination.show',
'edit_route' => 'destination.edit',
'delete_route' => 'destination.delete',
'columns' => ['parent_id' => 'Parent'],
'hidden_fields' => [
'id',
'slug',
'extra',
'description',
'created_at',
'updated_at',
'meta_title',
'meta_description',
'meta_keywords',
],
'custom_render' => [
'parent_id' => function ($value, $row) {
return $row->parent ? $row->parent?->name : '-';
},
'image' => function ($value, $row) {
return view('components.image-render', ['path' => $value]);
},
'publish' => function ($value, $row) {
return view('components.admin.publish', [
'route' => route('destination.changePublish', $row->id),
'data' => $row,
]);
},

// 'price' => function ($value, $row) {
// return 'Rs. ' . $value;
// },
// 'discount' => function ($value, $row) {
// return $value != 0 ? $value : '-';
// },
// 'duration' => function ($value, $row) {
// return $value . ' days';
// },
// 'thumbnail_image' => function ($value, $row) {
// return view('components.image-render', ['path' => $value]);
// },
],
])
@endcomponent
@stop