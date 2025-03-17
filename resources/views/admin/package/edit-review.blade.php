@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Package Review" />

    <form action="{{ route('package.update-review', $package->id) }}" method="post" class="form-sample">
        @csrf

        <x-admin.card title="Add Package review">
            <div id="faqEntries">
                <!-- Initial set of fields -->
                @if ($package->reviews)
                    @foreach ($package->reviews as $review)
                        <div class="faq-entry">
                            <div class="col-lg-12 stretch-card">
                                <div class="card p-2">
                                    <div class="p-2">
                                        <div class = "row">
                                            <div class="col-4">
                                                <x-admin.input name="person[]" label="Person"
                                                    placeholder="Enter Person Name" :oldvalue="$review['person']" />
                                            </div>
                                            <div class="col-2">
                                                <x-admin.input name="rating[]" type="number" label="Rating"
                                                    placeholder="Enter Rating" min="1" max="5"
                                                    :oldvalue="$review['rating']" />
                                            </div>
                                            <div class="col-4">
                                                <x-admin.input name="date[]" type="date" label="Rating"
                                                    :oldvalue="$review['date']" />
                                            </div>
                                            <div class="col-2">
                                                <div class="mb-3">
                                                    <label for="">&nbsp;</label>
                                                </div>
                                                <button type="button" class="btn btn-danger"
                                                    onclick="this.parentElement.parentElement.parentElement.remove()">Remove</button>
                                            </div>

                                        </div>
                                        <x-admin.input-textarea name="message[]" label="message" placeholder="Enter message"
                                            :oldvalue="$review['message']" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
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
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
@endsection


@section('js')
    <script>
        // Add new FAQ Entry
        function addFAQEntry() {
            const faqEntries = document.getElementById('faqEntries');
            const faqEntry = document.createElement('div');
            faqEntry.classList.add('faq-entry');
            faqEntry.innerHTML = `
        <div class="faq-entry">
                            <div class="col-lg-12 stretch-card">
                                <div class="card p-2">
                                    <div class="p-2">
                                        <div class="row">
                                            <div class="col-4">
                                                <x-admin.input name="person[]" label="Person"
                                                    placeholder="Enter Person"  />
                                            </div>
                                            <div class="col-2">
                                                <x-admin.input name="rating[]" type="number" label="Rating"
                                                    placeholder="Enter Rating" min="1" max="5" />
                                            </div>
                                            <div class="col-4">
                                                <x-admin.input name="date[]" type="date" label="Rating" />
                                            </div>
                                            <div class="col-2">
                                                <div class="mb-3">
                                                    <label for="">&nbsp;</label>
                                                </div>
                                                <button type="button" class="btn btn-danger"
                                                    onclick="this.parentElement.parentElement.parentElement.remove()">Remove</button>
                                            </div>

                                        </div>
                                        <x-admin.input-textarea name="message[]" label="message" placeholder="Enter message" />
                                    </div>
                                </div>
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
