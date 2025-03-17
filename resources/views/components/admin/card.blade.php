@props(['title' => null])
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-2">{{ $title }}</h4>
            {{-- <p class="card-description"> Add class <code>.table</code> 
            </p> --}}

            {{ $slot }}
        </div>
    </div>
</div>
