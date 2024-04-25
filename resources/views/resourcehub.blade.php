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
    <form action="{{ route('youtube.search') }}" method="GET" class="mt-20 md:mt-32 mb-4 p-4">
        <div class="flex flex-wrap items-center justify-center gap-4">
            <!-- Course Selection -->
            <div class="w-full md:w-1/4">
                <select name="course" class="select select-bordered w-full">
                    @foreach ($allowedCourses as $course)
                        <option value="{{ $course }}" {{ request('course') === $course ? 'selected' : '' }}>
                            {{ $course }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Duration Selection -->
            <div class="w-full md:w-1/4">
                <select name="duration" class="select select-bordered w-full">
                    <option value="">Any duration</option>
                    <option value="short" {{ request('duration') == 'short' ? 'selected' : '' }}>Short (&lt; 4 minutes)
                    </option>
                    <option value="medium" {{ request('duration') == 'medium' ? 'selected' : '' }}>Medium (4-20 minutes)
                    </option>
                    <option value="long" {{ request('duration') == 'long' ? 'selected' : '' }}>Long (&gt; 20 minutes)
                    </option>
                </select>
            </div>

            <!-- Search Button -->
            <div class="w-full md:w-auto">
                <button type="submit"
                    class="btn btn-md bg-Button text-white font-Fredoka hover:text-Second w-full md:w-auto">Search</button>
            </div>
        </div>
    </form>

    <!-- Search Results and Pagination -->
    <div class="flex flex-col items-center justify-center space-y-8 mx-auto p-4" style="max-width: 768px;">
        @isset($videos)
            @forelse ($videos as $video)
                <div class="card w-full md:max-w-4xl bg-base-100 shadow-lg overflow-hidden">
                    <div class="md:flex">
                        <img src="{{ $video->snippet->thumbnails->high->url }}" alt="Thumbnail"
                            class="w-full h-48 object-cover md:w-48">
                        <div class="p-4">
                            <h2 class="card-title text-xl font-semibold mb-2">{{ $video->snippet->title }}</h2>
                            <p class="text-gray-700">{{ $video->snippet->description }}</p>
                            <a href="#" onclick="openVideoModal('{{ $video->id->videoId }}')"
                                class="btn bg-Second hover:bg-white hover:text-Second text-white font-bold py-2 px-4 rounded mt-4 w-full">Watch</a>
                        </div>
                    </div>
                </div>
            @empty
                <p>No videos found.</p>
            @endforelse
        @endisset

        @if (!empty($prevPageToken) || !empty($nextPageToken))
            <div class="btn-group">
                @if (!empty($prevPageToken))
                    <a href="{{ route('youtube.search', ['course' => request('course'), 'duration' => request('duration'), 'pageToken' => $prevPageToken]) }}"
                        class="btn">« Previous</a>
                @endif
                @if (!empty($nextPageToken))
                    <a href="{{ route('youtube.search', ['course' => request('course'), 'duration' => request('duration'), 'pageToken' => $nextPageToken]) }}"
                        class="btn">Next »</a>
                @endif
            </div>
        @endif
    </div>

    <!-- Modal Placeholder -->
    <div id="videoModal" class="modal" onclick="closeVideoModal()">
        <div class="modal-box" onclick="event.stopPropagation();">
            <!-- Dynamically injected content -->
        </div>
    </div>
@endsection
