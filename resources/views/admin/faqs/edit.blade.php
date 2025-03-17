@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="FAQ's" />
    <x-admin.card title="Edit FAQ">
        <form id="faqForm" method="POST" action="{{ route('faq.update', $faq->id) }}">
            @method('PUT')
            @csrf
            <div id="faqEntries">
                <!-- Initial set of fields -->
                <div class="faq-entry">

                    <x-admin.input name="question" label="Question" :oldvalue="$faq->question" placeholder="Enter Question" />
                    <x-admin.input name="answer" label="Answer" :oldvalue="$faq->answer" placeholder="Enter Answer" />

                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </x-admin.card>
@endsection
