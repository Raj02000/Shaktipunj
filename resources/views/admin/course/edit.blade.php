@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Edit Courses" />

    <form id="courseForm" class="form-sample" action="{{ route('course.update', $country->id) }}" method="POST">
        @csrf
        @if (count($courses) > 0)
            <div id="courseEntries">
                @foreach ($courses as $index => $course)
                    <x-admin.card title="Course">
                        <div class="course-entry">

                            <input type="hidden" name="course_ids[{{ $index }}]" value="{{ $course->id }}">
                            <x-admin.input name="names[{{ $index }}]" label="Name" :oldvalue="$course->name" />


                            <div class="universities-container">
                                @foreach (json_decode($course->universities) as $university)
                                    <div class="university-entry row d-flex align-items-center">
                                        <x-admin.input name="universities[{{ $index }}][]" label="University"
                                            oldvalue="{{ $university }}" class="col-11" required />

                                        <button type="button" class="mt-2 col-1 btn btn-danger "
                                            onclick="this.parentElement.remove()"><span
                                                class="mdi mdi-trash-can-outline"></span></button>

                                    </div>
                                @endforeach
                            </div>
                            <button type="button" class="my-1 btn btn-success" onclick="addUniversityEntry(this,{{$index}})">Add
                                University</button>
                            <button type="button" class="my-1 btn btn-danger" onclick="this.parentElement.remove()">Remove
                                Course</button>
                        </div>
                    </x-admin.card>
                @endforeach

            </div>
        @else
            <div id="courseEntries"></div>
        @endif
        <x-admin.card>
            <button type="button" class="my-1 btn btn-success" onclick="addCourseEntry(this)">Add
                course</button>
            <button class="btn btn-primary" type="submit">Submit</button>
        </x-admin.card>
    </form>
@endsection

@section('js')
    <script>

        function addCourseEntry() {
            const courseEntries = document.getElementById('courseEntries');
            const courseEntryCount = courseEntries.children.length;
            const courseEntry = document.createElement('div');
            courseEntry.classList.add('course-entry');
            courseEntry.innerHTML = `
                <x-admin.card title="Course">

                    <div class="course-entry">
                        <x-admin.input name="names[${courseEntryCount}]" label="Name" placeholder="Enter name" />

                        <div class="universities-container">
                            <div class="university-entry row d-flex align-items-center">
                                <x-admin.input name="universities[${courseEntryCount}][]" label="University"
                                    placeholder="Enter University Name" class="col-11" />
                                
                                <button type="button" class="mt-2 col-1 btn btn-danger "
                                    onclick="this.parentElement.remove()"><span class="mdi mdi-trash-can-outline"></span></button>
                                
                            </div>
                        </div>

                        <button type="button" class="my-1 btn btn-success" onclick="addUniversityEntry(this,${courseEntryCount})">Add
                            University</button>

                    </div>
                    <button type="button" class="my-1 btn btn-danger" onclick="this.parentElement.remove()">Remove
                        Course</button>
                </x-admin.card>
            `;
            courseEntries.appendChild(courseEntry);
        }

        function addUniversityEntry(button,index) {
            console.log(index);
            const courseEntry = button.parentElement;
            const universitiesContainer = courseEntry.querySelector('.universities-container');
            const courseIndex = Array.prototype.indexOf.call(courseEntry.parentElement.children, courseEntry);
            const universityEntry = document.createElement('div');
            universityEntry.classList.add('university-entry');
            universityEntry.innerHTML = `
            <div class="university-entry row d-flex align-items-center">
                <x-admin.input name="universities[${index}][]" label="University"
                    placeholder="Enter University Name" class="col-11" />
                
                <button type="button" class="mt-2 col-1 btn btn-danger "
                    onclick="this.parentElement.remove()"><span class="mdi mdi-trash-can-outline"></span></button>
               
            </div>

        `;
            universitiesContainer.appendChild(universityEntry);
        }
    </script>
@endsection
