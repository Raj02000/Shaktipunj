@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Links" />
    <form id="faqForm" method="POST" action="{{ route('link.store') }}">
        @csrf
        <div id="faqEntries">
            <!-- Initial set of fields -->
            <div class="faq-entry">
                <x-admin.card title="Add Link">

                    <x-admin.input name="names[]" label="Name" placeholder="Enter Name" />

                    <x-admin.input name="links[]" label="Link" placeholder="Enter Link" />
                </x-admin.card>

            </div>
        </div>
        <x-admin.card>

            <button type="button" class=" btn btn-success mb-3" onclick="addFAQEntry()">Add more links</button> <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </x-admin.card>

    </form>
@endsection
@section('js')
    <script>
        function addFAQEntry() {
            const faqEntries = document.getElementById('faqEntries');
            const faqEntry = document.createElement('div');
            faqEntry.classList.add('faq-entry');
            faqEntry.innerHTML = `
            <div class="faq-entry">
                <x-admin.card title="Add Link">

                    <x-admin.input name="names[]" label="Name" placeholder="Enter Name" />

                    <x-admin.input name="links[]" label="Link" placeholder="Enter Link" />
                </x-admin.card>

            </div>
            `;
            faqEntries.appendChild(faqEntry);
        }
    </script>
@endsection
