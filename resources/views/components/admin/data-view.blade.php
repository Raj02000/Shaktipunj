@props([
    'values',
    'columns' => null, // Allow defining custom columns
    'hidden_fields' => [], // Fields to hide
    'custom_render' => [], // Custom rendering logic for specific fields
    'edit_route' => null,
    'delete_route' => null,
    'canEdit' => null,
    'canDelete' => null,
])

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">View</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Value</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        // Infer columns dynamically if not explicitly provided
                        $inferredColumns = collect($values->getAttributes())
                            ->keys()
                            ->mapWithKeys(fn($attr) => [$attr => Str::headline($attr)])
                            ->toArray();

                        // Merge user-provided columns with inferred ones
                        $columns = $columns ? array_merge($inferredColumns, $columns) : $inferredColumns;

                        // Remove hidden fields
                        $columns = collect($columns)
                            ->reject(fn($title, $key) => in_array($key, $hidden_fields))
                            ->toArray();
                    @endphp

                    @foreach ($columns as $key => $title)
                        <tr>
                            <td>{{ $title }}</td>
                            <td>
                                @if (isset($custom_render[$key]) && is_callable($custom_render[$key]))
                                    {!! $custom_render[$key]($values->{$key}, $values) !!}
                                @elseif (is_object($values->{$key}))
                                    {{ $values->{$key}->name ?? 'N/A' }}
                                @else
                                    {{ is_string($values->{$key}) ? Str::limit(strip_tags($values->{$key}), 50, '...') : $values->{$key} }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Action Buttons --}}
            <div class="d-flex justify-content-end mt-3">
                <a href="{{ url()->previous() }}" class="btn px-3 mx-2 btn-sm btn-info">
                    <span class="mdi mdi-arrow-left"></span>
                </a>

                @if ($edit_route && $canEdit)
                    @can($canEdit)
                        <a href="{{ route($edit_route, $values->id) }}" class="btn btn-sm btn-secondary px-3 mx-2">
                            <span class="mdi mdi-pencil"></span>
                        </a>
                    @endcan
                @endif

                @if ($delete_route && $canDelete)
                    @can($canDelete)
                        <button type="button" class="btn btn-danger btn-sm mx-2" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <span class="mdi mdi-trash-can-outline"></span>
                        </button>

                        <!-- Confirmation Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Confirmation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Are you sure you want to delete?</h5>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{ route($delete_route, $values->id) }}" class="btn btn-danger">Delete</a>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endcan
                @endif
            </div>
        </div>
    </div>
</div>
