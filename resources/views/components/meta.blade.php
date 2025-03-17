@props([
    'title',
    'description' =>
        'Momentum is a leading education consultancy dedicated to helping students achieve their dreams of studying abroad.',
    'url',
    'imageurl' => 'images/m.png',
    'keywords' => 'consultancy, study abroad, study in usa, best consultancy in kathmandu, best consultancy in nepal',
])


<meta name="description" content="{!! Illuminate\Support\Str::limit(strip_tags($description), $limit = 150, $end = '...') !!}">
<meta property="og:title" content="{{ $title }}" />
<meta property="og:description" content="{!! Illuminate\Support\Str::limit(strip_tags($description), $limit = 150, $end = '...') !!}" />
<meta property="og:site_name" content="Siddhartha Academy/Multiple College" />
<meta property="og:url" content="{{ $url }}" />
<link rel="canonical" href="{{ \Illuminate\Support\Facades\URL::current() }}" />
<meta property="og:type" content="website" />
<meta property="og:image" content="{{ asset($imageurl) }}" />
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="620">
<meta name="keywords" content="{{ $keywords }}">
<meta name="robots" content="index, follow">
