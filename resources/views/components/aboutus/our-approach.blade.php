@props(['approach'])

<style>
    .approach-card {
        background: rgba(255, 246, 246, 1);
        height: 170px;
    }

    .aproach-category {
        font-size: 30px;
        font-weight: 500;
        text-align: center;
    }

    @media (max-width: 576px) {
        .aproach-category {
            font-size: 21px;
        }

        .approach-card {
            background: rgba(255, 246, 246, 1);
            height: 190px;
        }
    }
</style>



<div class="container mt-3">
    <div class="row">
        <div class="col-12 col-lg-6">
            <p class="aproach-category my-5">PROGRAMMATIC APPROACHES</h3>
                @foreach ($approach as $approach1)
                    @if ($approach1->category_name == 'PROGRAMMATIC APPROACHES')
                        <div class="row mb-3">
                            <div class="col-3 d-flex justify-content-center align-items-center d-none d-sm-block">
                                <img src="{{ asset($approach1->image) }}" alt="our-approach"
                                    class="img-fluid object-fit-cover aproach-icon" />
                            </div>
                            <div class="col-12 col-sm-9 p-0">
                                <div class="approach-card rounded me-lg-4 me-xl-5 p-2 px-1 px-sm-3">
                                    <h5 class="primary-text">{{ $approach1->title }}</h4>
                                        <p>{!! $approach1->description !!}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

        </div>
        <div class="col-12 col-lg-6">
            <p class="aproach-category my-5">INSTITUTIONAL APPROACHES</p>
            @foreach ($approach as $approach2)
                @if ($approach2->category_name == 'INSTITUTIONAL APPROACHES')
                    <div class="row mb-3">
                        <div class="col-3 d-flex justify-content-center align-items-center d-none d-sm-block">
                            <img src="{{ asset($approach2->image) }}" alt="our-approach"
                                class="img-fluid w-100 object-fit-cover" />
                        </div>
                        <div class="col-12 col-sm-9 p-0">
                            <div class="approach-card rounded me-lg-4 mx-0 me-xl-5 p-2 px-sm-3">
                                <h5 class="primary-text">{{ $approach2->title }}</h4>
                                    <p>{!! $approach2->description !!}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
