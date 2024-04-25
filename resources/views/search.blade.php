<!-- resources/views/youtube/search.blade.php -->

@extends('layout.layout')
@section('title', 'BridgeEd - Search')
@section('content')
    <h1>Search YouTube Videos</h1>

    <form action="{{ route('youtube.search') }}" method="GET">
        <input type="text" name="query" placeholder="Enter search query">
        <button type="submit">Search</button>
    </form>

    @if(isset($videos))
        <h2>Search Results</h2>
        @foreach ($videos as $video)
            <div>
                <h3>{{ $video->snippet->title }}</h3>
                <img src="{{ $video->snippet->thumbnails->default->url }}" alt="{{ $video->snippet->title }}">
                <p>{{ $video->snippet->description }}</p>
                <p><a href="https://www.youtube.com/watch?v={{ $video->id->videoId }}" target="_blank">Watch on YouTube</a></p>
            </div>
        @endforeach
    @endif
@endsection
