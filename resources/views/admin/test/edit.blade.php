@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Edit Tests" />

    <form id="testForm" action="{{ route('test.update', $country->id) }}" method="POST">
        @csrf

        @if (count($tests) > 0)
            <div id="testEntries">
                @foreach ($tests as $test)
                    <x-admin.card title="Test">
                        <div class="test-entry">
                            <x-admin.input name="names[]" label="Name" placeholder="Enter test name"
                                oldvalue="{{ $test->name }}" />
                            <x-admin.input name="descriptions[]" label="Description" placeholder="Enter test description"
                                oldvalue="{{ $test->description }}" />

                            <button type="button" class="btn btn-danger" onclick="this.parentElement.remove()">Remove
                                Test</button>
                        </div>
                    </x-admin.card>
                @endforeach

            </div>

            <button class="btn btn-success" type="button" onclick="addTestEntry()">Add Test</button>
            <button class="btn btn-primary" type="submit">Submit</button>
        @else
            <div id="testEntries">
                <!-- Initial set of fields -->
                <x-admin.card title="Test">
                    <x-admin.input name="names[]" label="Name" type="text" placeholder="Enter test name" />
                    <x-admin.input name="descriptions[]" label="Description" placeholder="Enter test description" />

                    <button type="button" class="btn btn-danger" onclick="this.parentElement.remove()">Remove Test</button>

                </x-admin.card>
            </div>

            <button class="btn btn-success" type="button" onclick="addTestEntry()">Add</button>
            <button class="btn btn-primary" type="submit">Submit</button>
        @endisset


</form>
@endsection

@section('js')
<script>
    function addTestEntry() {
        const testEntries = document.getElementById('testEntries');
        const testEntry = document.createElement('div');
        testEntry.classList.add('test-entry');
        testEntry.innerHTML = `
            <x-admin.card title="Test">
                <x-admin.input name="names[]" label="Name" type="text" placeholder="Enter test name" />
                <x-admin.input name="descriptions[]" label="Description" placeholder="Enter test description" />
                <button type="button" class="btn btn-danger" onclick="this.parentElement.remove()">Remove Test</button>
            </x-admin.card>
        `;
        testEntries.appendChild(testEntry);
    }

    function removeTestEntry(btn) {
        const testEntry = btn.parentElement;
        testEntry.remove();
    }
</script>
@endsection
