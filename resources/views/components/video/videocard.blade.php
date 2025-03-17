@props(['title', 'link', 'source'])
<script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>
<div class="col-lg-4 col-md-6 col-sm-6 my-2">

    @php
        if (str_contains($link, '=')) {
            $trimmedString = explode('=', $link)[1];
        } else {
            $trimmedString = explode('videos/', $link)[1];
        }
    @endphp

    @if (strtolower($source) == 'facebook')
        <div class="fb-video w-100 " data-href="https://www.facebook.com/facebook/videos/{{ $trimmedString }}"
            data-height="300px" data-show-text="false">
            <div class="fb-xfbml-parse-ignore">
                <blockquote cite="https://www.facebook.com/facebook/videos/{{ $trimmedString }}">
                    <a href="https://www.facebook.com/facebook/videos/{{ $trimmedString }}">How to Share
                        With
                        Just
                        Friends</a>
                    <p>How to share with just friends.</p>
                    Posted by <a href="https://www.facebook.com/facebook/">Facebook</a> on Friday, December
                    5,
                    2014
                </blockquote>
            </div>
        </div>
        <div class="d-flex mt-0 align-items-center" style="height: 40px; background-color:rgba(227, 218, 218, 0.69)">
            <p class="ms-3" style="font-weight:700; font-size: 20px;">{{ $title }}</p>
        </div>
    @elseif (strtolower($source) == 'youtube')
        @php
            $key = explode('&', $trimmedString)[0];
        @endphp

        <iframe height="300" class="w-100"
            src="https://www.youtube.com/embed/{{ $key }}?si=4A7j912KuxDse_Cc" title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <div class="d-flex mt-0 align-items-center" style="height: 40px; background-color:rgba(227, 218, 218, 0.69)">
            <p class="ms-3" style="font-weight:700; font-size: 20px;">{{ $title }}</p>
        </div>
    @endif

</div>
