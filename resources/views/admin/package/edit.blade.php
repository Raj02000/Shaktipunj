@extends('admin.layout.admin-layout')
@section('body')
{{-- {{ dd($trip) }} --}}
<x-admin.page-header title="Trip" />


<form action="{{ route('package.update', $package->id) }}" method="post" enctype="multipart/form-data" class="form-sample">
    @csrf
    <x-admin.card title="Edit Package">

        <x-admin.image-view :imageurl="$package->image" title="Existing Image" />
        <x-admin.input type="file" name="image" label="Image" />
        <x-admin.input name="name" label="Name" placeholder="Enter Name" :oldvalue="$package->name" />
        <x-admin.input-textarea :ckeditor="true" name="short_description" label="Short Description"
            :oldvalue="old('short_description')" />

        <div class="row">
            <div class="col-8">
                <x-admin.input name="location" label="Location" placeholder="Enter Location" :oldvalue="$package->location" />
            </div>
            <div class="col-4">
                <x-admin.input type="number" name="duration" label="Duration" placeholder="Enter Duration"
                    :oldvalue="$package->duration" />
            </div>

        </div>

        <x-admin.input-select name="destination" label="Select Destination" :values="$destinations" :oldvalue="$package->destination_id" />

        <x-admin.input-select name="tag_id" label="Select Tag" :values="$tags" :oldvalue="$package->tag_id" />

        <x-admin.input type="file" label="Upload pdf" accept="application/pdf" name="pdf" />
    </x-admin.card>

    <x-admin.card title="At a Glance">
        <div class="row">
            <div class="col-3">
                <x-admin.input name="extra_destination" label="Destination" placeholder="Destination"
                    :oldvalue="isset($package->extra['extra_destination'])
                            ? $package->extra['extra_destination']
                            : null" />
            </div>
            <div class="col-3">
                <x-admin.input name="difficulty" label="Difficulty Level" placeholder="Difficulty Level"
                    :oldvalue="$package->extra['difficulty']" />
            </div>

        </div>

        <div class="row">
            <div class="col-4">
                <x-admin.input name="activities" label="Activities" placeholder="Activities" :oldvalue="isset($package->extra['activities']) ? $package->extra['activities'] : null" />
            </div>
            <div class="col-4">
                <x-admin.input name="accommodation" label="Accommodation" placeholder="Accommodation"
                    :oldvalue="isset($package->extra['accommodation']) ? $package->extra['accommodation'] : null" />
            </div>
            <div class="col-4">
                <x-admin.input name="meals" label="Meal" placeholder="Meal" :oldvalue="isset($package->extra['meals']) ? $package->extra['meals'] : null" />
            </div>
        </div>

    </x-admin.card>

    <x-admin.card title="Overview">
        <x-admin.input-textarea :ckeditor="true" name="overview" label="Overview" :oldvalue="$package->overview" />
    </x-admin.card>

    <x-admin.card title="Itinerary">
        <div id="iteration">
            <!-- Initial set of fields -->
            @if (null !== old('iti_questions'))
            @php
            $itiQuestions = old('iti_questions') ?? [];
            @endphp
            @foreach ($itiQuestions as $iteration => $item)
            <div class="itinerary-entry">

                <div class="col-lg-12 stretch-card">
                    <div class="card p-2">
                        <div class="p-2">
                            <div class="row">
                                <h4 class="card-title mb-2">Itinerary</h4>
                                <div class="col-2">
                                    <x-admin.input name="iti_questions[]" label="Key" placeholder="Day 1"
                                        :oldvalue="$item" />
                                </div>
                                <div class="col-10">
                                    <x-admin.input name="iti_answers[]" label="Title"
                                        placeholder="Itinerary title" :oldvalue="old('iti_answers')[$iteration]" />
                                </div>



                                <div class="row">
                                    <div class="col-6">
                                        <x-admin.input name="iti_meals[]" label="Meals" placeholder="Meals"
                                            :oldvalue="old('iti_meals')[$iteration]" />
                                    </div>
                                    <div class="col-6">
                                        <x-admin.input name="iti_acc_type[]" label="Accommodation Type"
                                            placeholder="Accommodation Type" :oldvalue="old('iti_acc_type')[$iteration]" />
                                    </div>
                                </div>

                                <div>
                                    <x-admin.input-textarea :ckeditor="true" name="itineraryDescriptions[]"
                                        label="Description" :oldvalue="old('itineraryDescriptions')[$iteration]" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @elseif (isset($package->itinerary))
            @foreach ($package->itinerary as $itinerary)
            <div class="itinerary-entry">

                <div class="col-lg-12 stretch-card">
                    <div class="card p-2">
                        <div class="p-2">
                            <div class="row">
                                <h4 class="card-title mb-2">Itinerary</h4>
                                <div class="col-2">
                                    <x-admin.input name="iti_questions[]" label="Key" placeholder="Day 1"
                                        :oldvalue="$itinerary['question']" />
                                </div>
                                <div class="col-10">
                                    <x-admin.input name="iti_answers[]" label="Title"
                                        placeholder="Itinerary title" :oldvalue="$itinerary['answer']" />
                                </div>




                                <div class="row">
                                    <div class="col-6">
                                        <x-admin.input name="iti_meals[]" label="Meals" placeholder="Meals"
                                            :oldvalue="isset($itinerary['iti_meals'])
                                                            ? $itinerary['iti_meals']
                                                            : null" />
                                    </div>
                                    <div class="col-6">
                                        <x-admin.input name="iti_acc_type[]" label="Accommodation Type"
                                            placeholder="Accommodation Type" :oldvalue="isset($itinerary['iti_acc_type'])
                                                            ? $itinerary['iti_acc_type']
                                                            : null" />
                                    </div>
                                </div>

                                <div>
                                    <x-admin.input-textarea :ckeditor="true" name="itineraryDescriptions[]"
                                        label="Description" :oldvalue="$itinerary['description']" />
                                </div>
                            </div>

                            <button type="button" class="btn btn-danger"
                                onclick="this.parentElement.parentElement.remove()">Remove</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="p-2">
                    <button type="button" class=" btn btn-success mb-1" onclick="addItineraryEntry()">Add more
                        itinerary</button>
                    <br>
                </div>
            </div>
        </div>
    </x-admin.card>

    <x-admin.card title="Package Map">
        <x-admin.image-view :imageurl="$package->trip_map" title="Existing Image" />
        <x-admin.input type="file" name="trip_map" label="Trip Map" />
    </x-admin.card>

    <x-admin.card title="What we expect">
        <x-admin.input-textarea :ckeditor="true" name="include" label="Include" :oldvalue="$package->include" />
        <x-admin.input-textarea :ckeditor="true" name="exclude" label="Exclude" :oldvalue="$package->exclude" />
    </x-admin.card>
    <x-admin.card title="Package Video">
        @if (isset($package->extra['video']) && isset($package->extra['video']['video_link']))
        <x-admin.input type="url" name="video_link" placeholder="Enter video link" label="Video Link"
            :oldvalue="$package->extra['video']['video_link'] ?? null" />
        <x-admin.input-textarea :ckeditor="true" name="video_description" label="Video Description"
            :oldvalue="$package->extra['video']['video_description'] ?? null" />
        @else
        <x-admin.input type="url" name="video_link" placeholder="Enter video link" label="Video Link" />
        <x-admin.input-textarea :ckeditor="true" name="video_description" label="Video Description" />
        @endif
    </x-admin.card>

    <x-admin.card title="Gallery">
        <x-admin.input type="file" name="gallery[]" label="Video Link" multiple />
        @isset($package->extra['gallery'])
        @foreach ($package->extra['gallery'] as $item)
        <x-admin.image-view :imageurl="$item" :id="$package->id" delete_route="removePackageGalleryItem" />
        @endforeach
        @endisset
    </x-admin.card>

    <x-admin.card title="Cost and Dates">
        <div id="costDates">
            <!-- Initial set of fields -->
            <div id="cost-entry">
                @if (null !== old('package_price'))
                @php
                $packagePrice = old('package_price') ?? [];
                @endphp
                @foreach ($packagePrice as $iteration => $item)
                <div class="col-lg-12 stretch-card">
                    <div class="card ">
                        <div class="p-2">
                            <div class="row align-items-center">

                                <div class="col-4">
                                    <x-admin.input type="date" name="start_date[]" label="Start Date"
                                        placeholder="Start Date" :oldvalue="old('start_date')[$iteration]" />
                                </div>
                                <div class="col-4">
                                    <x-admin.input type="date" name="end_date[]" label="End Date"
                                        placeholder="End Date" :oldvalue="old('end_date')[$iteration]" />
                                </div>
                                <div class="col-3">
                                    <x-admin.input type="number" name="package_price[]" label="Price"
                                        placeholder="Price" :oldvalue="$item" />
                                </div>
                                <div class="col-1">
                                    <button type="button" class="btn btn-outline-danger btn-sm"
                                        onclick="this.parentElement.parentElement.parentElement.remove()"><i
                                            class="mdi mdi-delete"></i></button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @elseif (isset($package->cost_dates) && is_array($package->cost_dates))
                @foreach ($package->cost_dates as $cost_date)
                <div class="col-lg-12 stretch-card">
                    <div class="card ">
                        <div class="p-2">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <x-admin.input type="date" name="start_date[]" label="Start Date"
                                        placeholder="Start Date" :oldvalue="$cost_date['start_date']" />
                                </div>
                                <div class="col-4">
                                    <x-admin.input type="date" name="end_date[]" label="End Date"
                                        placeholder="End Date" :oldvalue="$cost_date['end_date']" />
                                </div>
                                <div class="col-3">
                                    <x-admin.input type="number" name="package_price[]" label="Price"
                                        placeholder="Price" :oldvalue="$cost_date['package_price']" />
                                </div>
                                <div class="col-1">
                                    <button type="button" class="btn btn-outline-danger btn-sm"
                                        onclick="this.parentElement.parentElement.parentElement.remove()"><i
                                            class="mdi mdi-delete"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="p-2">
                        <button type="button" class="btn btn-success mb-1" onclick="addMoreCostDates()">Add
                            More</button>
                    </div>
                </div>
            </div>
        </div>
    </x-admin.card>

    <x-admin.card title="Useful Informations">
        <x-admin.input-textarea :ckeditor="true" name="useful_info" label="Useful Info" :oldvalue="$package->useful_info" />
    </x-admin.card>

    <x-admin.card title="Package Cost">
        <div id="packageCost" class="mt-4">
            {{-- <h4 class="card-title mb-2">Package Cost</h4> --}}
            <!-- Initial set of fields -->
            <div id="package-cost-entry">
                @if (null !== old('person_range'))
                @php
                $personRange = old('person_range') ?? [];
                @endphp
                @foreach ($personRange as $iteration => $item)
                <div class="col-lg-12 stretch-card">
                    <div class="card ">
                        <div class="p-2">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <x-admin.input type="number" name="person_range[]"
                                        label="Number of People" placeholder="Number of People"
                                        :oldvalue="$item" />
                                </div>
                                <div class="col-2">
                                    <x-admin.input type="number" name="npr_amount[]" label="NPR Amount"
                                        placeholder="NPR Amount" :oldvalue="old('npr_amount')[$iteration]" />
                                </div>
                                <div class="col-2">
                                    <x-admin.input type="number" name="inr_amount[]" label="INR Amount"
                                        placeholder="INR Amount" :oldvalue="old('inr_amount')[$iteration]" />
                                </div>
                                <div class="col-2">
                                    <x-admin.input type="number" name="usd_amount[]" label="USD Amount"
                                        placeholder="USD Amount" :oldvalue="old('usd_amount')[$iteration]" />
                                </div>
                                <div class="col-1">
                                    <button type="button" class="btn btn-outline-danger btn-sm"
                                        onclick="this.parentElement.parentElement.parentElement.remove()"><i
                                            class="mdi mdi-delete"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @elseif (isset($package->extra['package_costs']) && is_array($package->extra['package_costs']))
                @foreach ($package->extra['package_costs'] as $item)
                <div class="col-lg-12 stretch-card">
                    <div class="card ">
                        <div class="p-2">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <x-admin.input type="number" name="person_range[]"
                                        label="Number of People" placeholder="Number of People"
                                        :oldvalue="$item['person_range']" />
                                </div>
                                <div class="col-2">
                                    <x-admin.input type="number" name="npr_amount[]" label="NPR Amount"
                                        placeholder="NPR Amount" :oldvalue="$item['npr_amount']" />
                                </div>
                                <div class="col-2">
                                    <x-admin.input type="number" name="inr_amount[]" label="INR Amount"
                                        placeholder="INR Amount" :oldvalue="$item['inr_amount']" />
                                </div>
                                <div class="col-2">
                                    <x-admin.input type="number" name="usd_amount[]" label="USD Amount"
                                        placeholder="USD Amount" :oldvalue="$item['usd_amount']" />
                                </div>

                                <div class="col-1">
                                    <button type="button" class="btn btn-outline-danger btn-sm"
                                        onclick="this.parentElement.parentElement.parentElement.remove()"><i
                                            class="mdi mdi-delete"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="p-2">
                    <button type="button" class=" btn btn-success mb-1" onclick="addPackageCost()">Add</button>
                    <br>
                </div>
            </div>
        </div>
    </x-admin.card>



    <x-admin.card title="FAQ's">
        <div id="faqEntries">
            <!-- Initial set of fields -->
            @if (null !== old('questions'))
            @php
            $questions = old('questions') ?? [];
            @endphp
            @foreach ($questions as $iteration => $item)
            <div class="col-lg-12 stretch-card">
                <div class="card p-2">
                    <div class="p-2">
                        <h4 class="card-title mb-2">FAQs</h4>
                        <x-admin.input name="questions[]" label="Question" placeholder="Enter Question"
                            :oldvalue="$item" />
                        <x-admin.input-textarea name="answers[]" label="Answer" placeholder="Enter Answer"
                            :oldvalue="old('answers')[$iteration]" />
                    </div>
                </div>
            </div>
            @endforeach
            @elseif($package->faqs)
            @foreach ($package->faqs as $faq)
            <div class="faq-entry">
                <div class="col-lg-12 stretch-card">
                    <div class="card p-2">
                        <div class="p-2">
                            <x-admin.input name="questions[]" label="Question" placeholder="Enter Question"
                                :oldvalue="$faq['question']" />
                            <x-admin.input-textarea name="answers[]" label="Answer"
                                placeholder="Enter Answer" :oldvalue="$faq['answer']" />
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-danger"
                    onclick="this.parentElement.remove()">Remove</button>
            </div>
            @endforeach
            @endif
        </div>


        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="p-2">
                    <button type="button" class=" btn btn-success mb-1" onclick="addFAQEntry()">Add
                        more
                        Questions</button>
                    <br>
                </div>
            </div>
        </div>
    </x-admin.card>

    <x-admin.card title="Meta Information">
        <x-admin.input name="meta_title" label="Meta Title" :oldvalue="$package->meta_title" placeholder="Enter Meta Title" />
        <x-admin.input name="meta_description" label="Meta Description" :oldvalue="$package->meta_description"
            placeholder="Enter Meta Description" />
        <x-admin.input name="meta_keywords" label="Meta Keywords" :oldvalue="$package->meta_keywords"
            placeholder="Enter Meta Keywords (Separate by comma)" />
    </x-admin.card>

    <button type="submit" class="btn btn-primary">Submit</button>


</form>
@endsection


@section('js')
<script>
    // Add new FAQ Entry
    function addFAQEntry() {
        const faqEntries = document.getElementById('faqEntries');
        const faqEntry = document.createElement('div');
        faqEntry.classList.add('faq-entry');
        faqEntry.innerHTML = `
                <div class="faq-entry">
                    <div class="col-lg-12 stretch-card">
                        <div class="card p-2">
                            <div class="p-2">
                                <x-admin.input name="questions[]" label="Question" placeholder="Enter Question" />
                                <x-admin.input name="answers[]" label="Answer" placeholder="Enter Answer" />
                                <button type="button" class="btn btn-danger"
                                    onclick="this.parentElement.parentElement.parentElement.remove()">Remove</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        faqEntries.appendChild(faqEntry);
    }

    // Add new Itinerary Entry
    function addItineraryEntry() {
        const itineraryEntries = document.getElementById('iteration');
        const itineraryEntry = document.createElement('div');
        itineraryEntry.classList.add('itinerary-entry');
        itineraryEntry.innerHTML = `
                <div class="itinerary-entry">
                    <div class="col-lg-12 stretch-card">
                        <div class="card p-2">
                            <div class="p-2">
                                <div class="row">
                                    <div class="col-2">
                                        <x-admin.input name="iti_questions[]" label="Key" placeholder="Day 1" />
                                    </div>
                                    <div class="col-10">
                                        <x-admin.input name="iti_answers[]" label="Title" placeholder="Itinerary title" />
                                    </div>
                                    <div class="row">
                                            <div class="col-4">
                                                <x-admin.input name="iti_max_elevation[]" label="Max Elevation"
                                                    placeholder="Max Elevation" />
                                            </div>
                                            <div class="col-4">
                                                <x-admin.input name="iti_duration[]" label="Hike Duration"
                                                    placeholder="Hike Duration" />
                                            </div>
                                            <div class="col-4">
                                                <x-admin.input name="iti_hike_distance[]" label="Hike Distance"
                                                    placeholder="Hike Distance" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <x-admin.input name="iti_meals[]" label="Meals" placeholder="Meals" />
                                            </div>
                                            <div class="col-6">
                                                <x-admin.input name="iti_acc_type[]" label="Accommodation Type"
                                                    placeholder="Accommodation Type" />
                                            </div>
                                        </div>
                                    <div>
                                        <x-admin.input-textarea name="itineraryDescriptions[]"/>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-danger"
                                    onclick="this.parentElement.parentElement.remove()">Remove</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        itineraryEntries.appendChild(itineraryEntry);

        // Reinitialize CKEditor for the new textarea
        initCkEditor();
    }

    function addMoreCostDates() {
        const costDates = document.getElementById('cost-entry');
        const costDate = document.createElement('div');
        costDate.innerHTML = `

                    <div class="col-lg-12 stretch-card">
                        <div class="card ">
                            <div class="p-2">
                                <div class="row align-items-center">
                                    <div class="col-4">
                                        <x-admin.input type="date" name="start_date[]" label="Start Date" placeholder="Start Date" />
                                    </div>
                                    <div class="col-4">
                                        <x-admin.input type="date" name="end_date[]" label="End Date" placeholder="End Date" />
                                    </div>
                                    <div class="col-3">
                                        <x-admin.input type="number" name="package_price[]" label="Price" placeholder="Price" />
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="btn btn-outline-danger btn-sm"
                                            onclick="this.parentElement.parentElement.parentElement.remove()"><i class="mdi mdi-delete"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            `;
        costDates.appendChild(costDate);
    }


    // Initialize CKEditor on page load
    document.addEventListener('DOMContentLoaded', () => {
        initializeCKEditor();
    });

    function addPackageCost() {
        const packageCosts = document.getElementById('package-cost-entry');

        const packageCost = document.createElement('div');
        packageCost.innerHTML = `

                    <div class="col-lg-12 stretch-card" >
                        <div class="card ">
                            <div class="p-2">
                                <div class="row align-items-center">
                                     <div class="col-4">
                                        <x-admin.input type="number" name="person_range[]" label="Number of people"
                                            placeholder="Number of people" oldvalue="0" />
                                    </div>
                                    <div class="col-2">
                                        <x-admin.input type="number" name="npr_amount[]" label="NPR Amount"
                                            placeholder="NPR Amount" oldvalue="0" />
                                    </div>
                                    <div class="col-2">
                                        <x-admin.input type="number" name="inr_amount[]" label="INR Amount"
                                            placeholder="INR Amount" oldvalue="0" />
                                    </div>
                                    <div class="col-2">
                                        <x-admin.input type="number" name="usd_amount[]" label="USD Amount"
                                            placeholder="USD Amount" oldvalue="0" />
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="btn btn-outline-danger btn-sm"
                                            onclick="this.parentElement.parentElement.parentElement.remove()"><i class="mdi mdi-delete"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            `;
        packageCosts.appendChild(packageCost);
    }
</script>
@endsection