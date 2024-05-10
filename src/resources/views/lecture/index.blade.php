@extends('lecture.master')

@section('body')
    <div class="inner">
        <div class="plyr__video-embed rbtplayer">
            <iframe src="{{ $lecture->videoEmbedUrl }}" allowfullscreen allow="autoplay"></iframe>
        </div>
    </div>
@endsection
