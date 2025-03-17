@props(['videos'])
<div class="row">
    @foreach ($videos as $video)
        <x-video.videocard :title="$video->title" :link="$video->link" :source="$video->source" />
    @endforeach
</div>
