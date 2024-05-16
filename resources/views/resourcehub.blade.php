@extends('layout.layout')

@section('title', 'BridgeEd - ResourceHub')

@section('content')
    <!-- Resource Hub Title -->
    <div id="resourcehub-title" class="mx-auto md:w-3/5 mt-24 md:mt-36 px-4 md:px-0 text-center">
        <div class="flex space-x-4 mb-2 flex-row justify-center">
            <h1 class="font-Fredoka sm:text-3xl md:text-4xl text-2xl text-Second">Resource Hub</h1>
            <img src="{{ asset('images/bookshelf.png') }}" alt="books" class=" h-9"/>
        </div>
        <p class="text-xl">Welcome to the Resource Hub, your gateway to free STEM education resources tailored for low socioeconomic status (SES) students, offering free tutorials and courses to support your academic journey.</p>
    </div>
    <div class="divider"></div>

    <form action="{{ route('youtube.search') }}" method="GET" class="md:mt-12 mb-4 p-4">
        <div class="flex flex-wrap items-center justify-center gap-4 md:w-3/5 mx-auto">
            <!-- Course Selection -->
            <div class="w-full md:w-1/4 text-center">
                <label for="course" class="block mb-2 text-sm font-medium text-gray-900">Course</label>
                <select id="course" name="course" class="select select-bordered w-full">
                    @foreach ($allowedCourses as $course)
                        <option value="{{ $course }}" {{ request('course') === $course ? 'selected' : '' }}>
                            {{ $course }}
                        </option>
                    @endforeach
                </select>
            </div>
    
            <!-- Duration Selection -->
            <div class="w-full md:w-1/4 text-center">
                <label for="duration" class="block mb-2 text-sm font-medium text-gray-900">Duration</label>
                <select id="duration" name="duration" class="select select-bordered w-full">
                    <option value="">Any duration</option>
                    <option value="short" {{ request('duration') == 'short' ? 'selected' : '' }}>Short (&lt; 4 minutes)</option>
                    <option value="medium" {{ request('duration') == 'medium' ? 'selected' : '' }}>Medium (4-20 minutes)</option>
                    <option value="long" {{ request('duration') == 'long' ? 'selected' : '' }}>Long (&gt; 20 minutes)</option>
                </select>
            </div>
    
            <!-- Level Selection -->
            <div class="w-full md:w-1/4 text-center">
                <label for="level" class="block mb-2 text-sm font-medium text-gray-900">Difficulty Level</label>
                <select id="level" name="level" class="select select-bordered w-full">
                    <option value="">Select difficulty</option>
                    <option value="beginner" {{ request('level') == 'beginner' ? 'selected' : '' }}>Beginner</option>
                    <option value="intermediate" {{ request('level') == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                    <option value="advanced" {{ request('level') == 'advanced' ? 'selected' : '' }}>Advanced</option>
                </select>
            </div>
    
            <!-- Search Button -->
            <div class="w-full md:w-auto text-center mt-6">
                <button type="submit" class="btn btn-ghost bg-Button text-white font-bold py-2 px-4 rounded">Search</button>
            </div>
        </div>
    </form>
    
    
    <!-- Search Results and Pagination -->
    <div class="mx-auto p-4" style="max-width: 1200px;">
        {{-- @if (session('no-results'))
            <div class="alert alert-warning">{{ session('no-results') }}</div>
        @endif --}}

        @isset($videos)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @forelse ($videos as $video)
                    <div class="card bg-base-100 shadow-lg overflow-hidden flex flex-col" style="height: 100%;">
                        <!-- Thumbnail on top -->
                        <img src="{{ $video->snippet->thumbnails->high->url }}" alt="Thumbnail" class="w-full flex-shrink-0"
                            style="height: 200px; object-fit: cover;">

                        <!-- Text and button below -->
                        <div class="p-4 flex flex-col flex-grow">
                            <h2 class="card-title text-xl font-semibold mb-2">{{ $video->snippet->title }}</h2>
                            <p class="text-gray-700 text-sm flex-grow">{{ $video->snippet->description }}</p>
                            <a href="#" onclick="openVideoModal('{{ $video->id->videoId }}')"
                                class="btn bg-Button text-white font-bold py-2 px-4 rounded mt-4">Watch</a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center">
                        <p class="text-lg font-semibold">No videos found. Try adjusting your search criteria.</p>
                    </div>
                @endforelse
            </div>
        @endisset

        @if (!empty($prevPageToken) || !empty($nextPageToken))
            <div class="flex justify-center mt-6">
                <div class="btn-group">
                    @if (!empty($prevPageToken))
                        <a href="{{ route('youtube.search', ['course' => request('course'), 'duration' => request('duration'), 'pageToken' => $prevPageToken, 'level' => request('level')]) }}"
                            class="btn bg-Button text-white">« Previous</a>
                    @endif
                    @if (!empty($nextPageToken))
                        <a href="{{ route('youtube.search', ['course' => request('course'), 'duration' => request('duration'), 'pageToken' => $nextPageToken, 'level' => request('level')]) }}"
                            class="btn bg-Button text-white">Next »</a>
                    @endif
                </div>
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
