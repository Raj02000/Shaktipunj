@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Expenses" />
    <form id="expenseForm" action="{{ route('expenses.update', $country->id) }}" method="POST">
        @csrf

        @if (count($expenses) > 0)
            <div id="expenseEntries">
                @foreach ($expenses as $index => $expense)
                    <x-admin.card title="Edit Expense Item">
                        <div class="expense-entry">
                            <input type="hidden" name="expense_ids[]" value="{{ $expense->id }}">
                            <x-admin.input name="name[]" label="Name" :oldvalue="$expense->name" placeholder="Enter Name"
                                required />

                            <x-admin.input name="cost[]" label="Cost(USD)" type="number" :oldvalue="$expense->cost"
                                placeholder="Enter Cost" required />

                            <button type="button" class="btn btn-danger"
                                onclick="this.parentElement.remove()">Remove</button>
                        </div>
                    </x-admin.card>
                @endforeach
            </div>

            <button class="btn btn-success" type="button" onclick="addExpenseEntry()">Add</button>
            <button class="btn btn-primary" type="submit">Submit</button>
        @else
            <div id="expenseEntries">
                <x-admin.card title="Add Expense Item">
                    <!-- Initial set of fields -->
                    <x-admin.input name="name[]" label="Name" type="text" placeholder="Enter Name" required />

                    <x-admin.input name="cost[]" label="Cost" type="number" placeholder="Enter Cost" required />

                </x-admin.card>
            </div>
            <button class="btn btn-success" type="button" onclick="addExpenseEntry()">Add</button>
            <button class="btn btn-primary" type="submit">Submit</button>
        @endif
    </form>
@endsection

@section('js')
    <script>
        function addExpenseEntry() {
            const expenseEntries = document.getElementById('expenseEntries');
            const expenseEntry = document.createElement('div');
            expenseEntry.classList.add('expense-entry');
            expenseEntry.innerHTML = `
            <x-admin.card title="Add Expense Item">
                <!-- Initial set of fields -->
                <x-admin.input name="name[]" label="Name" type="text" placeholder="Enter Name" required />
                
                <x-admin.input name="cost[]" label="Cost" type="number" placeholder="Enter Cost" required />
                
                <button type="button" class="btn btn-danger" onclick="this.parentElement.remove()">Remove</button>
            </x-admin.card>
        `;
            expenseEntries.appendChild(expenseEntry);
        }
    </script>
@endsection
