@props(['data'])

<style>
    .start-now {
        color: rgba(135, 7, 7, 1);
        text-decoration: none;
        font-size: 19px;
        font-weight: 700;
        position: absolute;
        width: 100%;
        bottom: 10px;
        left: 0%;
        transition: all 0.3s;
    }

    .services-bg {
        background: linear-gradient(to top, #FFFFFF 15.78%, #737373 255.58%);

    }

    .card-comp {
        --tw-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
    }

    .card-comp:hover {
        cursor: context-menu;
        /* box-shadow: 4px 4px 4px 4px rgba(0, 0, 0, 0.25); */
        box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.2), 0 4px 4px 0 rgba(0, 0, 0, 0.19);

        .start-now {
            bottom: 25px;
            left: 0%;
        }

        .title {
            font-size: 18px;
            font-weight: 400;
        }
    }
</style>
<div class="services-bg pt-1">
    <x-section-logo.section-logo name="Our Services"
        description="At Momentum Education, we pride ourselves on delivering exceptional services to students." />
    <div class="container d-flex justify-content-center ">
        <div class="row justify-content-center col-lg-9 px-lg-5">
            {{-- {{ dd($data) }} --}}
            @foreach ($data as $index => $service)
                @if ($index > 5)
                @break

            @else
                <div class="col-sm-5 col-lg-4 pt-sm-0 px-5 px-sm-3">
                    <a class="anchor" href="services/{{ $service->id }}) }}">
                        <div class="card-comp position-relative text-center border bg-light py-2 my-3 rounded-2">
                            <x-cards.services-card :image="$service->icon" title='{{ $service->title }}'
                                description='<a class="start-now" href="services/{{ $service->id }}) }}">Start Now<i
                                class="fa fa-arrow-right ps-1" aria-hidden="true"></i></i></a>' />
                        </div>
                    </a>
                </div>
            @endif
        @endforeach
    </div>
</div>
</div>
