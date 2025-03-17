@props(['imageurl' => null, 'id' => null, 'delete_route' => null, 'title' => 'Existing Image'])
@if ($imageurl != '')
    <p class="my-3 ">{{ $title }}</p>
    <span class="my-3 pe-3" style="position: relative;">
        <img src="{{ asset($imageurl) }}" alt="image" height="200px" width="auto" />
        @if ($delete_route != null)
            <a href="{{ route($delete_route, ['extra' => $id, 'image' => $imageurl]) }}"
                style="position: absolute;top:-80px; right:20px; " class="btn btn-gradient-danger btn-sm "><span
                    class="mdi mdi-delete-forever"></span></a>
        @endif
    </span>
@endif
