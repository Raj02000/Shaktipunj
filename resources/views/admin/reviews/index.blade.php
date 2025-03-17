@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Reviews" />
    <ul class="nav nav-tabs">
        @php
            $currentStatus = request('status', 'pending'); // Default to 'pending' if status is not provided
        @endphp
        <li class="nav-item">
            <a class="nav-link {{ $currentStatus === 'pending' ? 'active' : '' }}" aria-current="page"
                href="{{ route('review.index') }}">Pending</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $currentStatus === 'approved' ? 'active' : '' }}"
                href="{{ route('review.index', ['status' => 'approved']) }}">Approved</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $currentStatus === 'rejected' ? 'active' : '' }}"
                href="{{ route('review.index', ['status' => 'rejected']) }}">Rejected</a>
        </li>
    </ul>



    @component('components.admin.data-table', [
        'values' => $reviews,
        'add_route' => 'review.add',
        'view_route' => 'review.show',
        'canAdd' => false,
        'canEdit' => false,
        'hidden_fields' => ['id', 'extra', 'message', 'status', 'created_at', 'updated_at'],
        'columns' => [
            'package_id' => 'Package',
            'name' => 'Person Name',
        ],
        'custom_render' => [
            'package_id' => function ($value, $row) {
                return $row->package?->name ?? '-';
            },
            'date' => function ($value, $row) {
                return \Carbon\Carbon::parse($row->date)->format('d-m-Y');
            },
        ],
    ])
    @endcomponent
@stop
