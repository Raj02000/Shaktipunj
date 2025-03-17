@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Extra Item" />

    <form id="extraForm" method="POST" class="p-5" action="{{ route('extra.update', $extra->id) }}"
        enctype="multipart/form-data">
        @csrf
        <!-- Initial set of fields -->
        <div id="extraEntries" class="extra-entry ">
            <x-admin.card title="Edit Extra Item">
                <x-admin.input name="display_name" label="Display Name" :oldvalue="$extra->display_name" placeholder="Enter display name" />

                <div class="form-group mt-3">
                    <label for="page">Page</label>
                    <select name="page" id="" class="form-select">
                        <option value="" selected>Select Page</option>
                        <option @selected($extra->page == 'home') value="home">Home</option>
                        <option @selected($extra->page == 'about-us') value="about-us">About Us</option>
                        <option @selected($extra->page == 'services') value="services">Services</option>
                        <option @selected($extra->page == 'our-destination') value="our-destination">Our Destination</option>
                        <option @selected($extra->page == 'events') value="events">Events</option>
                        <option @selected($extra->page == 'blogs') value="blogs">Blogs</option>
                        <option @selected($extra->page == 'gallery') value="gallery">Gallery</option>
                        <option @selected($extra->page == 'video') value="video">Video</option>
                        <option @selected($extra->page == 'podcast') value="podcast">Podcast</option>
                        <option @selected($extra->page == 'enquiry') value="enquiry">Enquiry</option>
                        <option @selected($extra->page == 'contact-us') value="contact-us">Contact Us</option>
                        <option @selected($extra->page == 'terms-and-conditions') value="terms-and-conditions">Terms and Conditions</option>
                        <option @selected($extra->page == 'privacy-policy') value="privacy-policy">Privacy Policy</option>
                    </select>
                </div>

                <x-admin.input name="value" label="Value" :oldvalue="$extra->value" placeholder="Enter value" />

                <x-admin.input-textarea name="description" :oldvalue="$extra->extra['descriptions']" />

                @isset($extra->extra['images'])
                    @forelse ($extra->extra['images'] as $item)
                        <x-admin.image-view :imageurl="$item" delete_route="extra.detach-image" :id="$extra->id" />
                    @empty
                    @endforelse
                @endisset
                <div class="mt-3 form-group">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="images[]" multiple id="image" class="form-control">
                </div>

            </x-admin.card>

            <div id="sections" class="sections">
                @forelse ($extra->extra['sections'] as $item)
                    <x-admin.card>
                        <x-admin.input name="sectionIds[]" label="Section Id" :oldvalue="$item['id']"
                            placeholder="Enter Section Id" />
                        <x-admin.input-textarea name="sectionDetails[]" label="Section Detail" :oldvalue="$item['detail']" />
                        <button type="button" class="btn btn-danger" onclick="this.parentElement.remove()">Remove</button>
                    </x-admin.card>
                @empty
                @endforelse
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
