@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Teams" />
    <x-admin.card title="Add Team Member">
        <form action="{{ route('team.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-admin.input name="name" label="Name" placeholder="Enter team member name" />
            <x-admin.input name="designation" label="Designation" placeholder="Enter team member designation" />


            <div id="member-links">
                <div class="link my-2 gap-2">
                    <x-admin.input name="link[]" label="Social Media Links" placeholder="Enter social media links" />
                </div>
            </div>
            <button type="button" class=" btn btn-success mb-3" onclick="addLinks()">Add More Links</button> <br>

            <x-admin.input name="image" type="file" label="Image" />
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </x-admin.card>
@endsection

@section('js')
    <script>
        function addLinks() {
            if (document.querySelectorAll('.link').length >= 3) {
                alert('You can only add up to 3 links.');
                return;
            }
            const memberlinks = document.getElementById('member-links');
            const link = document.createElement('div');
            link.classList.add('link', 'my-2', 'gap-2');
            link.innerHTML = `
                <x-admin.input name="link[]" label="Social Media Links" placeholder="Enter social media links"/>
                <button type="button" class="btn btn-danger" onclick="this.parentElement.remove()">Remove</button>
            
            `;
            memberlinks.appendChild(link);
        }
    </script>
@endsection
