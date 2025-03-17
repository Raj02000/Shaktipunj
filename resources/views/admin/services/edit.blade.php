@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Edit Service Items" />

    <x-admin.card title="Service Item">
        <form id="serviceForm" action="{{ route('services.update', $service->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <x-admin.image-view :imageurl="$service->image" />
            <x-admin.input name="image" label="Image" type="file" />

            <x-admin.input name="icon" label="Icon" placeholder="Font awesome icon name" :oldvalue="$service->icon" />

            <x-admin.input name="title" label="Title" placeholder="Enter Title" :oldvalue="$service->title" />
            <x-admin.input name="short_description" label="Short Description" placeholder="Short Description"
                :oldvalue="$service->short_description" />

            <x-admin.input-textarea name="description" label="Description" :oldvalue="$service->description" />


            <button class="btn btn-primary" type="submit">Update</button>

        </form>
    </x-admin.card>
@endsection

@section('js')
    <script>
        function addServiceEntry() {
            const serviceEntries = document.getElementById('serviceEntries');
            const serviceEntry = document.createElement('div');
            serviceEntry.classList.add('service-entry');
            serviceEntry.innerHTML = `
                <x-admin.card title="Service Item">
                    <div class="service-entry">
                        <x-admin.input name="title[]" label="Name" placeholder="Enter Title" />
                        <x-admin.input-textarea name="description[]" label="Description"   />
                        <x-admin.input name="image[]" label="Image" type="file"  />
                    </div>
                    <button type="button" class="btn btn-danger mb-3" onclick="removeServiceEntry(this)">Remove</button>
                </x-admin.card>
            `;
            serviceEntries.appendChild(serviceEntry);
        }

        function removeServiceEntry(button) {
            const serviceEntries = document.getElementsByClassName('service-entry');
            if (serviceEntries.length > 1) {
                button.parentElement.remove();
            } else {
                alert('At least one service entry is required.');
            }
        }
    </script>
@endsection
