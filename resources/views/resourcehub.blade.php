{{-- @extends('layout.layout')
@section('title', 'BridgeEd - ResourceHub')
@section('content')
<div class="flex items-center justify-center flex-row space-x-4 space-y-4 md:space-y-0 mt-20 md:mt-32 mb-4">
    <label class="input input-md input-bordered flex items-center gap-4 font-Fredoka w-5/6 md:w-1/2">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-6 h-6 stroke-2"><path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd" /></svg> 
        <input type="text" class="grow text-Secondary" placeholder="What are you looking for?" />
        <button class="md:hidden btn btn-sm btn-ghost text-white font-Fredoka bg-Button font-normal">Search</button>
    </label>
    <button class="hidden md:flex btn btn-ghost text-white font-Fredoka bg-Button font-normal">Search</button>
</div>
<div class="flex justify-center flex-row">
    <!-- <button id="slideLeft" type="button" class="btn btn-circle">❮</button> -->
    <div id="subjects" class="carousel rounded-box h-16 max-w-80 md:max-w-96 space-x-4 md:space-x-8">
        <div class="carousel-item flex flex-col items-center">
            <img src="{{ asset('images/web-development.png') }}" alt="Burger" />
            <p>coding</p>
        </div> 
        <div class="carousel-item flex flex-col items-center">
            <img src="{{ asset('images/eng.png') }}" alt="Burger" />
            <p>english</p>
        </div> 
        <div class="carousel-item flex flex-col items-center">
            <img src="{{ asset('images/web-development.png') }}" alt="Burger" />
            <p>coding</p>
        </div> 
        <div class="carousel-item flex flex-col items-center">
            <img src="{{ asset('images/web-development.png') }}" alt="Burger" />
            <p>coding</p>
        </div> 
        <div class="carousel-item flex flex-col items-center">
            <img src="{{ asset('images/web-development.png') }}" alt="Burger" />
            <p>coding</p>
        </div> 
    </div>
    <!-- <button id="slideRight" type="button" class="btn btn-circle">❯</button   -->
</div>

<div class="flex items-center justify-center flex-col space-y-4">
    <div class="card w-80 md:w-3/5 bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title">Python</h2>
            <p>If a dog chews shoes whose shoes does he choose?</p>
            <div class="card-actions justify-end">
                <button class="btn btn-primary">See more</button>
            </div>
        </div>
    </div>
    <div class="card w-80 md:w-3/5 bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title">English</h2>
            <p>If a dog chews shoes whose shoes does he choose?</p>
            <div class="card-actions justify-end">
                <button class="btn btn-primary">See more</button>
            </div>
        </div>
    </div>
    <div class="card w-80 md:w-3/5 bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title">Card title!</h2>
            <p>If a dog chews shoes whose shoes does he choose?</p>
            <div class="card-actions justify-end">
                <button class="btn btn-primary">Buy Now</button>
            </div>
        </div>
    </div>
    <div class="card w-80 md:w-3/5 bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title">Card title!</h2>
            <p>If a dog chews shoes whose shoes does he choose?</p>
            <div class="card-actions justify-end">
                <button class="btn btn-primary">Buy Now</button>
            </div>
        </div>
    </div>
    <div class="card w-80 md:w-3/5 bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title">Card title!</h2>
            <p>If a dog chews shoes whose shoes does he choose?</p>
            <div class="card-actions justify-end">
                <button class="btn btn-primary">Buy Now</button>
            </div>
        </div>
    </div>
    <div class="join mt-4">
        <button class="join-item btn btn-active">1</button>
        <button class="join-item btn ">2</button>
        <button class="join-item btn ">3</button>
        <button class="join-item btn ">4</button>
    </div>
</div>
@endsection --}}

@extends('layout.layout')
@section('title', 'BridgeEd - ResourceHub')
@section('content')

    <form action="{{ route('youtube.search') }}" method="GET">
        <div class="flex flex-col md:flex-row items-center justify-center gap-4 mt-20 md:mt-32 mb-4 p-4">
            <div class="w-full md:max-w-md">
                <input type="text" name="query" class="input input-md input-bordered font-Fredoka w-full"
                    placeholder="What are you looking for?" value="{{ request('query', 'STEM education') }}">
            </div>
            <div class="w-full md:max-w-xs">
                <select name="duration" class="select select-bordered w-full">
                    <option value="">Any duration</option>
                    <option value="short" {{ request('duration') == 'short' ? 'selected' : '' }}>Short (< 4
                            minutes)</option>
                    <option value="medium" {{ request('duration') == 'medium' ? 'selected' : '' }}>Medium (4-20 minutes)
                    </option>
                    <option value="long" {{ request('duration') == 'long' ? 'selected' : '' }}>Long (> 20 minutes)
                    </option>
                </select>
            </div>
            <button type="submit" class="btn btn-md bg-Button text-white font-Fredoka hover:text-Second">Search</button>
        </div>

        {{-- <div class="flex flex-col items-center justify-center gap-4 mt-12 md:mt-20 lg:mt-32 mb-4 w-full px-4 md:px-0">
            <input type="text" name="query" class="input input-md input-bordered font-Fredoka w-full"
                   placeholder="What are you looking for?" value="{{ request('query', 'STEM education') }}">
        
            <select name="duration" class="select select-bordered w-full">
                <option value="">Any duration</option>
                <option value="short" {{ request('duration') == 'short' ? 'selected' : '' }}>Short (< 4 minutes)</option>
                <option value="medium" {{ request('duration') == 'medium' ? 'selected' : '' }}>Medium (4-20 minutes)</option>
                <option value="long" {{ request('duration') == 'long' ? 'selected' : '' }}>Long (> 20 minutes)</option>
            </select>
        
            <button type="submit" class="btn btn-md bg-Button text-white font-Fredoka">Search</button>
        </div> --}}
        
    </form>

    <!-- Search Results -->
    <div class="flex items-center justify-center flex-col space-y-8 mx-auto p-4" style="max-width: 768px;">
        @forelse ($videos as $video)
            <div class="card flex flex-col md:flex-row w-full bg-base-100 shadow-lg overflow-hidden">
                <!-- Thumbnail Image -->
                <div class="md:flex-shrink-0">
                    <img src="{{ $video->snippet->thumbnails->high->url }}" alt="Thumbnail for {{ $video->snippet->title }}"
                        class="w-full h-48 object-cover md:w-48">
                </div>

                <!-- Text Content -->
                <div class="p-4 flex flex-col justify-between">
                    <h2 class="card-title text-xl font-semibold mb-2">{{ $video->snippet->title }}</h2>
                    <p class="text-gray-700 text-base mb-4">{{ $video->snippet->description }}</p>
                    <a href="#" onclick="openVideoModal('{{ $video->id->videoId }}')"
                        class="btn bg-Second hover:bg-white hover:text-Second text-white font-bold py-2 px-4 rounded"
                        data-video-id="{{ $video->id->videoId }}">Watch</a>
                </div>
            </div>
        @empty
            <p>No videos found.</p>
        @endforelse
    </div>


    <!-- Pagination -->
    <div class="flex justify-center mt-8">
        <div class="btn-group">
            @if (!empty($prevPageToken))
                <a href="{{ route('youtube.search', ['query' => $query, 'pageToken' => $prevPageToken]) }}"
                    class="btn">« Previous</a>
            @endif
            @if (!empty($nextPageToken))
                <a href="{{ route('youtube.search', ['query' => $query, 'pageToken' => $nextPageToken]) }}"
                    class="btn">Next »</a>
            @endif
        </div>
    </div>
    </div>

    <!-- Modal placeholder -->
    <div id="videoModal" class="modal" onclick="closeVideoModal()">
        <div class="modal-box" onclick="event.stopPropagation();">
            <!-- Content will be injected here -->
        </div>
    </div>

@endsection
