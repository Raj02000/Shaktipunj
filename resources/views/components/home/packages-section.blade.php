@props(['packages', 'category'])
<section>
    <div class="container">
        <div class="mb-4 text-center">
            @isset($category->name)
                <div class="row d-flex justify-content-between">

                    <div>
                        <p class="mb-0 section-title position-relative">
                            {{ $category->name }}
                            <span
                                style="position: absolute; bottom: -5px;left: 0; width: 50%; height: 3px; background-color: #CB9331;"></span>
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('page.all-packages', ['category' => $category->slug]) }}" class="btn view-all-btn">
                            VIEW ALL PACKAGES
                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            @endisset
        </div>
        <div class="package-inner ">
            <div class="row ">

                @foreach ($packages as $package)
                    <div class="col-lg-4 mb-4 col-md-6 p-0">
                        <x-home.package :package="$package" />
                    </div>
                @endforeach

            </div>
            <div class="btn-wrap text-center mobile-view-all-btn">
                <a href="{{ route('page.all-packages', ['category' => $category->slug]) }}" class="button-primary">VIEW ALL
                    PACKAGES</a>
            </div>
        </div>
    </div>
</section>
