@props(['name', 'count' => '0', 'color' => 'danger', 'addRoute' => null])
<div class="col-md-4 stretch-card grid-margin">
    <div class="card bg-gradient-{{ $color }} card-img-holder text-white">
        <div class="card-body">
            <img src="{{ asset('admin/images/dashboard/circle.svg    ') }}" class="card-img-absolute" alt="circle-image">
            <h4 class="font-weight-normal mb-3">{{ $name }} <i class="mdi mdi-chart-line mdi-24px float-end"></i>
            </h4>
            <h2 class="mb-5">{{ $count }}</h2>
            @isset($addRoute)
                <h6 class="card-text"><a href="{{route($addRoute)}}" class="btn btn-{{ $color }} text-light ">Add</a></h6>
            @endisset

        </div>
    </div>
</div>
