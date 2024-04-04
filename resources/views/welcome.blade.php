
@extends('layout.layout')

@section('content')
<div class="hero mb-12" style="height:38rem; background-image: url(../../images/landingpageheader.webp);">
    <div class="hero-overlay bg-opacity-60"></div>
    <div class="hero-content text-center text-neutral-content">
        <div class="max-w-md">
            <h1 class="my-5 text-7xl font-bold font-Overpass text-white">Bridge Ed</h1>
            <p class="mb-5 font-Overpass-Mono blur-xs text-xl ">"Collecting Paths, Unlocking Potential".</p>
            <p class="font-Fredoka text-lg text-white">Empower your journey.</p>
            <p class="mb-10 font-Fredoka text-lg text-white">Find Warm Support & Resources with us!</p>
            <div class="flex items-center flex-row space-x-4">
                <label class="input input-md input-bordered flex items-center gap-4 font-Fredoka w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-6 h-6 stroke-2"><path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd" /></svg> 
                    <input type="text" class="grow text-Secondary" placeholder="What are you looking for?" />
                </label>
                <button class="btn btn-ghost text-white font-Fredoka bg-Button font-normal">Search</button>
            </div>
        </div>
    </div>
</div>

<!-- <div class="hero bg-base-200 min-w-screen">
    <div class="hero-content flex-col lg:flex-row min-w-screen">
        <img src="{{ asset('images/welcome.jpg') }}" class="max-w-sm rounded-lg shadow-2xl min-h-screen" />
        <div class="px-6 text-center">
            <h1 class="text-7xl font-bold font-Overpass text-Second">What We Do</h1>
            <div class="card card-side bg-base-100 shadow-xl mb-4 w-full">
                <figure><img src="{{ asset('images/icon.png') }}" alt="Movie" class="p-6"/></figure>
                <div class="card-body">
                    <h2 class="card-title">New movie is released!</h2>
                    <p>Click the button to watch on Jetflix app.</p>
                    <div class="card-actions justify-end">
                        <button class="btn bg-Button text-white">See more</button>
                    </div>
                </div>
            </div>
            <div class="card card-side bg-base-100 shadow-xl">
                <figure><img src="{{ asset('images/icon.png') }}" alt="Movie" class="p-6"/></figure>
                <div class="card-body">
                    <h2 class="card-title">New movie is released!</h2>
                    <p>Click the button to watch on Jetflix app.</p>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Watch</button>
                    </div>
                </div>
            </div>
            <div class="card card-side bg-base-100 shadow-xl">
                <figure><img src="{{ asset('images/icon.png') }}" alt="Movie" class="p-6"/></figure>
                <div class="card-body">
                    <h2 class="card-title">New movie is released!</h2>
                    <p>Click the button to watch on Jetflix app.</p>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Watch</button>
                    </div>
                </div>
            </div>
            <div class="card card-side bg-base-100 shadow-xl">
                <figure><img src="{{ asset('images/icon.png') }}" alt="Movie" class="p-6"/></figure>
                <div class="card-body">
                    <h2 class="card-title">New movie is released!</h2>
                    <p>Click the button to watch on Jetflix app.</p>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Watch</button>
                    </div>
                </div>
            </div>
            <div class="card card-side bg-base-100 shadow-xl">
                <figure><img src="{{ asset('images/icon.png') }}" alt="Movie" class="p-6"/></figure>
                <div class="card-body">
                    <h2 class="card-title">New movie is released!</h2>
                    <p>Click the button to watch on Jetflix app.</p>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Watch</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection

