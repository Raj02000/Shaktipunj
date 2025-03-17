@props([
    'title' => null,
    'description' => null,
    'keywords' => null,
    'author' => null,
    'robots' => 'index, follow',
    'ogImage' => null,
    'ogUrl' => null,
    'twitterCard' => 'summary_large_image',
    'twitterImage' => null,
])

@if($title)
    <title>{{ $title }}</title>
    <meta name="title" content="{{ $title }}">
@endif

@if($description)
    <meta name="description" content="{{ $description }}">
@endif

@if($keywords)
    <meta name="keywords" content="{{ $keywords }}">
@endif

@if($author)
    <meta name="author" content="{{ $author }}">
@endif

<meta name="robots" content="{{ $robots }}">

<!-- Open Graph Meta Tags -->
@if($ogImage)
    <meta property="og:image" content="{{ $ogImage }}">
@endif

@if($ogUrl)
    <meta property="og:url" content="{{ $ogUrl }}">
@endif

@if($title)
    <meta property="og:title" content="{{ $title }}">
@endif

@if($description)
    <meta property="og:description" content="{{ $description }}">
@endif

<!-- Twitter Card Meta Tags -->
@if($twitterImage)
    <meta name="twitter:image" content="{{ $twitterImage }}">
@endif

<meta name="twitter:card" content="{{ $twitterCard }}">

@if($title)
    <meta name="twitter:title" content="{{ $title }}">
@endif

@if($description)
    <meta name="twitter:description" content="{{ $description }}">
@endif
