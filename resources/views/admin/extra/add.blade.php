@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Extra Item" />
    <form id="extraForm" method="POST" class="p-5" action="{{ route('extra.store') }}" enctype="multipart/form-data">
        @csrf
        <!-- Initial set of fields -->
        <div id="extraEntries" class="extra-entry ">
            <x-admin.card title="Add Extra Item">
                <x-admin.input name="display_name" label="Display Name" placeholder="Enter display name" />

                <div class="form-group mt-3">
                    <label for="page">Page</label>
                    <select name="page" id="" class="form-select">
                        <option value="" selected>Select Page</option>
                        <option value="home">Home</option>
                        <option value="about-us">About Us</option>
                        <option value="services">Services</option>
                        <option value="our-destination">Our Destination</option>
                        <option value="events">Events</option>
                        <option value="blogs">Blogs</option>
                        <option value="gallery">Gallery</option>
                        <option value="video">Video</option>
                        <option value="podcast">Podcast</option>
                        <option value="contact-us">Contact Us</option>
                        <option value="enquiry">Enquiry</option>
                        <option value="terms-and-conditions">Terms and Conditions</option>
                        <option value="privacy-policy">Privacy Policy</option>
                    </select>
                </div>

                <x-admin.input name="key" label="Key" placeholder="Enter Key" />
                <x-admin.input name="value" label="Value" placeholder="Enter value" />
                <x-admin.input-textarea name="description" label="description" />

                <div class="mt-3 form-group">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="images[]" multiple id="image" class="form-control">
                </div>

            </x-admin.card>



            <div id="sections" class="sections">

            </div>

            <button type="button" class="btn btn-success " onclick="addSections()">Add Sections</button>



        </div>
        <button type="submit" class="mt-3 btn btn-primary">Submit</button>

    </form>
@endsection
@section('js')
    <script>
        function addSections() {
            const sections = document.getElementById('sections');
            const newSection = document.createElement('div');
            newSection.innerHTML = `
            <x-admin.card>

                <x-admin.input name="sectionIds[]" label="Section Id" placeholder="Enter Section Id"/>
                <x-admin.input name="sectionDetails[]" label="Section Detail"/>

                <button type="button" class="btn btn-danger" onclick="this.parentElement.remove()">Remove</button>
                </x-admin.card>
            `;
            sections.appendChild(newSection);
        }
    </script>
@endsection
