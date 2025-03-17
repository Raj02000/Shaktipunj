@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="FAQ's" />
    <form id="faqForm" method="POST" action="{{ route('faq.store') }}">
        @csrf
        <div id="faqEntries">
            <!-- Initial set of fields -->
            <div class="faq-entry">
                <x-admin.card title="Add FAQ">

                    <x-admin.input name="questions[]" label="Question" placeholder="Enter Question" />

                    <x-admin.input name="answers[]" label="Answer" placeholder="Enter Answer" />
                </x-admin.card>

            </div>
        </div>
        <x-admin.card>

            <button type="button" class=" btn btn-success mb-3" onclick="addFAQEntry()">Add more Questions</button> <br>
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
                <x-admin.card title="Add FAQ">

                    <x-admin.input name="questions[]" label="Question" placeholder="Enter Question" />

                    <x-admin.input name="answers[]" label="Answer" placeholder="Enter Answer" />
                    <button type="button" class="btn btn-danger"
                                onclick="this.parentElement.remove()">Remove</button>
                </x-admin.card>

            </div>
            `;
            faqEntries.appendChild(faqEntry);
        }
    </script>
@endsection
