@extends('admin.layout.admin-layout')
@section('body')

    <form action="{{ route('change-page-order', ['model' => $model]) }}" method="post">
        @csrf
        <x-admin.page-header title="{{ $model }} Pages" />
        <div class="d-flex justify-content-between">
            <div class="d-flex gap-2">
                <h4 class="mb-3"><a href="{{ route('page.add', ['model' => $model]) }}" class="btn btn-primary">Add
                        Normal
                        Page</a></h4>
                <h4 class="mb-3"><a href="{{ route('page-gallery.add', ['model' => $model]) }}" class="btn btn-primary">Add
                        Gallery Page</a></h4>

            </div>
            <div>
                <x-button type='submit' label="Change Order" variant="info" size="lg" />
            </div>
        </div>

        <div class="">
            <div class="table-responsive  text-nowrap">
                <table class="table table-hover p-3">
                    <thead class="thead-dark">
                        <tr>
                            <th>SN</th>
                            <th scope="col">Title</th>
                            <th scope="col">Type</th>
                            <th scope="col">Display Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($pages as $page)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $page->title ?? 'N/A' }}</td>
                                <td>{{ $page->type ?? 'N/A' }}</td>
                                <td>
                                    <input type="number" name="{{ $page->id }}" value="{{ $page->display_order }}"
                                        min="1" />
                                </td>

                                <td>
                                    <a href="{{ route('page.show', $page->id) }}" class="btn mb-sm-1 btn-sm btn-info">
                                        <span class="mdi mdi-eye-outline"></span>
                                    </a>
                                    <a href="{{ route('page.edit', ['page' => $page->id, 'model' => $model]) }}"
                                        class="btn btn-secondary btn-sm mb-sm-1">
                                        <span class="mdi mdi-pencil"></span>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm mb-sm-1" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $page->id }}">
                                        <span class="mdi mdi-trash-can-outline"></span>
                                    </button>

                                    <div class="modal fade" id="exampleModal{{ $page->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel{{ $page->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel{{ $page->id }}">
                                                        Confirmation</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5>Are you sure you want to delete this item?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{ route('page.delete', ['page' => $page->id, 'model' => $model]) }}"
                                                        class="btn btn-danger">
                                                        Delete
                                                    </a>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

            <div class="my-4 d-flex justify-content-center">
                {{ $pages->links() }}
            </div>
        </div>
    </form>
@stop
