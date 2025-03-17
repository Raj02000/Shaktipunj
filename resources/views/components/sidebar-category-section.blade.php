@props(['title', 'values', 'value_prefix' => '', 'route', 'route_value' => 'slug', 'name' => 'name'])

<div class="blog-categories sidebar-div mb-50">

    <!-- Title -->
    <h5 class="h5-lg">{{ $title }}</h5>

    <!-- List -->
    <ul class="blog-category-list no-list-style clearfix">
        @foreach ($values as $value)
            <li><a href="{{ route($route, $value[$route_value]) }}" class="txt-400"><i
                        class="fas fa-angle-double-right primary-color"></i>
                    {{ $value_prefix }} {{ $value[$name] }}</a>
        @endforeach
    </ul>

</div>
