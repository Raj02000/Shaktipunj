@extends('admin.layout.admin-layout')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection
@section('body')
    <x-admin.page-header title="Message" />

    <div class="mt-2 mb-3">
        <form action="{{ route('enquiry.download') }}" method="post"
            class="form-sample bg-white my-2 d-flex justify-content-end align-items-center">
            @csrf
            <x-admin.input name="daterange" />
            <button type="submit" class="btn btn-gradient-success mx-3 mt-2">Export</button>
        </form>
    </div>

    <x-admin.table :values="$enquiry" view_route="enquiry.show" :hidden_field="['id',  'updated_at']" />
@endsection
@section('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                    .format('YYYY-MM-DD'));
            });
        });
    </script>
@endsection
