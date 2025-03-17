@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Add Page" />

    <form action="{{ route('page-gallery.store', ['model' => $model]) }}" method="post" enctype="multipart/form-data"
        class="form-sample">
        @csrf

        <x-admin.card>
            <x-admin.input name="title" label="Title" placeholder="Enter Title" />
        </x-admin.card>

        <x-admin.card title="Content">
            <div id="imageEntry">
                <div class='row' id="image-entry">
                    <div class='col-md-5'>
                        <x-admin.input name="image_title[]" label="Title" />
                    </div>
                    <div class='col-md-5'>
                        <x-admin.input name="image[]" type="file" />
                    </div>
                    <div class="col-2">
                        <div class="mb-3">
                            <label for="">&nbsp;</label>
                        </div>
                        <button type="button" class="btn btn-danger"
                            onclick="this.parentElement.parentElement.remove()">Remove</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="p-2">
                        <button type="button" class=" btn btn-success mb-1" onclick="addFAQEntry()">Add New</button>
                        <br>
                    </div>
                </div>
            </div>
        </x-admin.card>

        <x-admin.card title="Meta Information">
            <x-admin.input name="meta_title" label="Meta Title" placeholder="Enter Meta Title" />
            <x-admin.input name="meta_description" label="Meta Description" placeholder="Enter Meta Description" />
            <x-admin.input name="meta_keywords" label="Meta Keywords"
                placeholder="Enter Meta Keywords (Separate by comma)" />
        </x-admin.card>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
@endsection


@section('js')
    <script>
        // Add new FAQ Entry
        function addFAQEntry() {
            const faqEntries = document.getElementById('imageEntry');
            const faqEntry = document.createElement('div');
            faqEntry.classList.add('image-entry');
            faqEntry.innerHTML = `
       <div class='row' id="image-entry">
                    <div class='col-md-5'>
                        <x-admin.input name="image_title[]" label="Title" />
                    </div>
                    <div class='col-md-5'>
                        <x-admin.input name="image[]" type="file" />
                    </div>
                    <div class="col-2">
                        <div class="mb-3">
                            <label for="">&nbsp;</label>
                        </div>
                        <button type="button" class="btn btn-danger"
                            onclick="this.parentElement.parentElement.remove()">Remove</button>
                    </div>
                </div>

    `;
            faqEntries.appendChild(faqEntry);
            initCkEditor();
        }

        // Initialize CKEditor on page load
        document.addEventListener('DOMContentLoaded', () => {
            initCkEditor();
        });
    </script>
@endsection
