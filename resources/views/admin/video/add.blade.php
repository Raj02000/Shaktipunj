@extends('admin.layout.admin-layout')
@section('body')
    <x-admin.page-header title="Testimonials" />
    @isset($video)
        <x-admin.card title="Edit Video">
            <form action="{{ route('video.update', $video->id) }}" method="post">
                @csrf
                <x-admin.input name="title" label="Title" placeholder="Enter Title" :oldvalue="$video->title" required />
                <x-admin.input name="link" label="Video" placeholder="Enter Video Link" :oldvalue="$video->link" />

                <div class="form-group mt-3">
                    <label for="type">Type</label>
                    <select name="type" id="type" class="form-select" aria-label="Default select example">
                        <option value="null">Type</option>
                        <option value="video" @if ($video->type == 'video') selected @endif>Video</option>
                        <option value="podcast" @if ($video->type == 'podcast') selected @endif>Podcast</option>
                        <option value="introduction" @if ($video->type == 'introduction') selected @endif>Introduction</option>
                    </select>
                    @error('type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="source">Source</label>
                    <select name="source" id="source" class="form-select" aria-label="Default select example">
                        <option value="null">Source</option>
                        <option value="1" @if ($video->source == 'youtube') selected @endif>Youtube</option>
                        <option value="2" @if ($video->source == 'facebook') selected @endif>Facebook</option>
                    </select>
                    @error('source')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </x-admin.card>
    @else
        <x-admin.card title="Add Video">
            <form action="{{ route('video.store') }}" method="post">
                @csrf
                <x-admin.input name="title" label="Title" placeholder="Enter Title" required />
                <x-admin.input name="link" label="Video" placeholder="Enter Video Link" />

                <div class="form-group mt-3">
                    <label for="type">Type</label>
                    <select name="type" id="type" class="form-select" aria-label="Default select example" required>
                        <option value="null">Type</option>
                        <option value="video">Video</option>
                        <option value="podcast">Podcast</option>
                        <option value="introduction">Introduction</option>
                    </select>
                    @error('type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="source">Source</label>
                    <select name="source" id="source" class="form-select" aria-label="Default select example" required>
                        <option value="null">Source</option>
                        <option value="1">Youtube</option>
                        <option value="2">Facebook</option>
                    </select>
                    @error('source')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </x-admin.card>
    @endisset

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const typeSelect = document.getElementById('type');
            const sourceSelect = document.getElementById('source');

            function updateSourceOptions() {
                const selectedType = typeSelect.value;
                if (selectedType === 'introduction') {
                    sourceSelect.innerHTML = `
                        <option value="1" selected>Youtube</option>
                    `;
                } else {
                    sourceSelect.innerHTML = `
                        <option value="null">Source</option>
                        <option value="1">Youtube</option>
                        <option value="2">Facebook</option>
                    `;
                }
            }

            // Initial call to set the correct state
            updateSourceOptions();

            // Add event listener for change event
            typeSelect.addEventListener('change', updateSourceOptions);
        });
    </script>
@endsection
