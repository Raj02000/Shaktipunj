@props([
'columns' => null, // Allow null for dynamic generation
'values' => [], // Data to display in the table
'hidden_fields' => [], // Fields to hide
'add_route' => null,
'edit_route' => null,
'delete_route' => null,
'view_route' => null,
'custom_render' => [], // Custom rendering logic for specific fields
'pagination' => true, // Show or hide pagination
'column_order' => [], // Specify custom column order
'action' => true,
'canAdd' => null,
'canEdit' => null,
'canDelete' => null,
])

{{-- @dd($values->toArray()) --}}

@php
use Illuminate\Support\Str;

// Infer columns dynamically if not explicitly provided
$inferredColumns =
$values && isset($values[0])
? collect($values[0]->getAttributes())
->keys()
->mapWithKeys(fn($attr) => [$attr => Str::headline($attr)])
->toArray()
: [];

// Merge user-provided columns with inferred ones
$columns = $columns ? array_merge($inferredColumns, $columns) : $inferredColumns;

// Apply column order if specified
if ($column_order) {
$orderedColumns = collect($column_order)
->mapWithKeys(fn($key) => [$key => $columns[$key] ?? null])
->filter() // Remove invalid keys
->toArray();

$remainingColumns = array_diff_key($columns, $orderedColumns);
$columns = array_merge($orderedColumns, $remainingColumns);
}
@endphp

<div class="mt-3 p-4 bg-white">
    @if ($add_route != null)
    @can($canAdd)
    <h4 class="card-title mb-3"><a href="{{ route($add_route) }}" class="btn btn-primary">Add</a></h4>
    @endcan
    @endif
    @if (empty($values[0]))
    <h4 class="mt-2 text-muted text-center">No data found!</h4>
    @else
    <div class="table-responsive  text-nowrap">
        <table class="table table-hover p-3">
            <thead class="thead-dark">
                <tr>
                    <th>SN</th>
                    @foreach ($columns as $field => $title)
                    @unless (in_array($field, $hidden_fields))
                    <th scope="col">{{ $title }}</th>
                    @endunless
                    @endforeach
                    @if ($action)
                    <th>Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($values as $value)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    @foreach ($columns as $key => $title)
                    @unless (in_array($key, $hidden_fields, true))
                    <td>
                        @if (isset($custom_render[$key]) && is_callable($custom_render[$key]))
                        {!! $custom_render[$key]($value->{$key}, $value) !!}
                        @elseif (is_object($value->{$key}))
                        {{ $value->{$key}->name ?? 'N/A' }}
                        @else
                        {{ is_string($value->{$key}) ? Str::limit(strip_tags($value->{$key}), 30, '...') : $value->{$key} }}
                        @endif
                    </td>
                    @endunless
                    @endforeach

                    {{-- Actions --}}
                    @if ($action)
                    <td>
                        @if ($view_route)
                        <a href="{{ route($view_route, [$value->id]) }}"
                            class="btn mb-sm-1 btn-sm btn-info">
                            <span class="mdi mdi-eye-outline"></span>
                        </a>
                        @endif
                        @if ($edit_route)
                        <a href="{{ route($edit_route, [$value->id]) }}"
                            class="btn btn-secondary btn-sm mb-sm-1">
                            <span class="mdi mdi-pencil"></span>
                        </a>
                        @endif
                        @if ($delete_route)
                        <button type="button" class="btn btn-danger btn-sm mb-sm-1"
                            data-bs-toggle="modal" data-bs-target="#exampleModal{{ $value->id }}">
                            <span class="mdi mdi-trash-can-outline"></span>
                        </button>

                        <div class="modal fade" id="exampleModal{{ $value->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel{{ $value->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"
                                            id="exampleModalLabel{{ $value->id }}">Confirmation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Are you sure you want to delete this item?</h5>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route($delete_route, $value->id) }}"
                                            method="get">
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-danger">Delete</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- Pagination --}}
    @if ($pagination && $values instanceof \Illuminate\Contracts\Pagination\Paginator)
    <div class="my-4 d-flex justify-content-center">
        {{ $values->links() }}
    </div>
    @endif
    @endif
</div>