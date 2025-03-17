@extends('admin.layout.admin-layout')

@section('body')
    <x-admin.page-header title="Our Service Category" />
    @isset($ourService)
        <x-admin.card title="Add Category">
            <form action="{{ route('our-services.update', $ourService->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <x-admin.input name="title" label="Title" placeholder="Enter Title" oldvalue="{{ $ourService->title }}" />

                <x-admin.input-textarea name="description" label="description" oldvalue="{!! $ourService->description !!}" />

                <x-admin.image-view :imageurl="$ourService->icon" />
                <x-admin.input name="icon" label="Icon" type="file" />

                <div class="form-group mt-3">
                    <label for="status" class="form-label">Do you want to keep enroll button?</label>
                    <select name="status" class="form-select" id="status" label="Status">
                        <option value="0" @if ($ourService->status == 0) selected @endif>No</option>
                        <option value="1" @if ($ourService->status == 1) selected @endif>Yes</option>
                    </select>
                </div>
                @if ($errors->has('status'))
                    <div class="form-text text-danger">
                        {{ $errors->first('status') }}
                    </div>
                @endif

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </x-admin.card>
    @else
        <x-admin.card title="Add Category">
            <form action="{{ route('our-services.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <x-admin.input name="title" label="Title" placeholder="Enter Title" />


                <x-admin.input-textarea name="description" label="Description" />

                <x-admin.input name="icon" label="Icon" type="file" />

                <div class="form-group mt-3">
                    <label for="status" class="form-label">Do you want to keep enroll button?</label>
                    <select name="status" id="status" label="Status">
                        <option value="0" selected>No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </x-admin.card>
    @endisset
@endsection
