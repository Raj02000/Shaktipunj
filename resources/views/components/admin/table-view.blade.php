@props(['values', 'edit_route' => null, 'delete_route' => null, 'canEdit' => null, 'canDelete' => null])
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">View</h4>
            <table class="table table-hover">
                <thead>
                    <th scope="col">Title</th>
                    <th>Value</th>
                </thead>

                <tbody>
                    @php
                        $hide = ['id', 'image', 'thumbnail', 'flag', 'extra'];
                    @endphp



                    @foreach ($values->getAttributes() as $key => $value)
                        @if (!in_array($key, $hide))
                            <tr>
                                <td>{{ Str::ucfirst($key) }}</td>
                                @if ($key == 'country_id')
                                    <td>
                                        @isset($values->countries)
                                            {{ $values->countries->name }}
                                        @endisset
                                    </td>
                                @elseif($key == 'parent_id')
                                    <td>
                                        @isset($values->parent()->first()->title)
                                            {{ $values->parent()->first()->title }}
                                        @endisset
                                    </td>
                                @else
                                    <td class="text-wrap">
                                        {!! $value !!}
                                    </td>
                                @endif
                            </tr>
                        @endif
                    @endforeach


                </tbody>
            </table>

            @if (isset($values->thumbnail))
                <div class="mx-3">
                    <x-admin.image-view :imageurl="$values->thumbnail" title="Thumbnail" />
                </div>
            @endif
            @if (isset($values->icon))
                <div class="mx-3">
                    <x-admin.image-view :imageurl="$values->icon" title="Thumbnail" />
                </div>
            @endif

            @if (isset($values->image))
                <div class="mx-3">
                    <x-admin.image-view :imageurl="$values->image" title="Image" />
                </div>
            @endif

            @if (isset($values->flag))
                <div class="mx-3">
                    <x-admin.image-view :imageurl="$values->flag" title="Flag" />
                </div>
            @endif

            <div class="d-flex justify-content-end mt-3">
                <a href="{{ url()->previous() }}" class="btn px-3 mx-2 btn-sm btn-info"><span
                        class="mdi mdi-arrow-left"></span></a>

                @if (!is_null($edit_route))
                    @can($canEdit)
                        <a href="{{ route($edit_route, $values->id) }}" class="btn btn-sm btn-secondary px-3 mx-2"><span
                                class="mdi mdi-pencil"></span></a>
                    @endcan
                @endif

                @if (!is_null($delete_route))
                    @can($canDelete)
                        <button type="button" class="btn btn-danger btn-sm mx-2" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <span class="mdi mdi-trash-can-outline"></span>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content m-6">
                                    <div class="modal-header">
                                        <p class="modal-title">Confirmation</p>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body m-6">
                                        <h5 class="text-dark">Are you sure you want to delete?</h5>
                                    </div>
                                    <div class="modal-footer p-4">
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
