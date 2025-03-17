@extends('admin.layout.admin-layout')

@section('css')
    <style>
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
@stop

@section('body')
    <x-admin.page-header title="Edit Our teams" />

    <form action="{{ route('page.edit-team', ['page' => $page->id]) }}" method="post" enctype="multipart/form-data"
        class="form-sample">
        @csrf

        <x-admin.card>
            <x-admin.input name="name" label="Page Name" placeholder="Enter Page Name" :oldvalue="$page->title"
                ::required="true" />
        </x-admin.card>

        <x-admin.card title="Teams">
            <div id="imageEntry">
                @isset($page->content)
                    @foreach ($page->content as $content)
                        <div class='row' id="image-entry">
                            <x-admin.image-view :imageurl="$content['image']" title="Existing Image" />
                            <div class='col-md-10'>
                                <x-admin.input name="image[]" type="file" :required="$content['image'] ? false : true" />
                            </div>
                            <div class="col-2">
                                <div class="mb-3">
                                    <label for="">&nbsp;</label>
                                </div>
                                <button type="button" class="btn btn-danger"
                                    onclick="this.parentElement.parentElement.remove()">Remove</button>
                            </div>
                            <div class='col-md-6'>
                                <x-admin.input name="title[]" label="Title" :oldvalue="$content['title']" :required="true" />
                            </div>
                            <div class='col-md-6'>
                                <x-admin.input name="position[]" label="Position" :oldvalue="$content['position']" :required="true" />
                            </div>
                            <div class="col-12">
                                <x-admin.input-textarea name="description[]" class='form-control' :oldvalue="$content['description']" />
                            </div>

                        </div>
                    @endforeach
                @endisset
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
            <x-admin.input name="meta_title" label="Meta Title" placeholder="Enter Meta Title" :oldvalue="$page->meta_title" />
            <x-admin.input name="meta_description" label="Meta Description" placeholder="Enter Meta Description"
                :oldvalue="$page->meta_description" />
            <x-admin.input name="meta_keywords" label="Meta Keywords" placeholder="Enter Meta Keywords (Separate by comma)"
                :oldvalue="$page->meta_keywords" />
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
                              <div class='col-md-10'>
                                <x-admin.input name="image[]" type="file" :required="true"/>
                            </div>
                            <div class="col-2">
                                <div class="mb-3">
                                    <label for="">&nbsp;</label>
                                </div>
                                <button type="button" class="btn btn-danger"
                                    onclick="this.parentElement.parentElement.remove()">Remove</button>
                            </div>

                            <div class='col-md-6'>
                                <x-admin.input name="title[]" label="Title" :required="true" />
                            </div>
                            <div class='col-md-6'>
                                <x-admin.input name="position[]" label="Postition" :required="true"/>
                            </div>
                            <div class="col-12">
                                 <x-admin.input-textarea name="description[]" class='form-control'/>
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
