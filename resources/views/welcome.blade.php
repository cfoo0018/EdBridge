@extends('layout.layout')
@section('title', 'BridgeEd')
@section('content')
<div class="hero mx-auto" style="min-height:100vh; background-image: url(../../images/landingpageheader.webp);">
    <div class="hero-overlay bg-opacity-60"></div>
    <div class="hero-content text-center text-neutral-content">
        <div class="max-w-md">
            <h1 class="my-5 text-7xl font-bold font-Overpass text-white">Bridge Ed</h1>
            <p id="typewriter-text" class="mb-5 font-Overpass-Mono blur-xs text-xl text-white"></p>
            <p class="font-Fredoka text-lg text-white">Empower your journey.</p>
            <p class="mb-10 font-Fredoka text-lg text-white">Find Warm Support & Resources with us!</p>
            <form action="{{ route('search') }}" method="GET" class="md:flex items-center md:flex-row space-x-4 space-y-4 md:space-y-0">
                <label class="input input-md input-bordered flex items-center gap-4 font-Fredoka w-96">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-6 h-6 stroke-2"><path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd" /></svg> 
                    <input type="text" name="query" class="grow text-Secondary" placeholder="What are you looking for?" />
                </label>
                <button type="submit" class="btn btn-ghost text-white font-Fredoka bg-Button font-normal">Search</button>
            </form>
        </div>
    </div>
</div>

<div class="hero bg-base-200 font-Fredoka">
    <div class="hero-content lg:mt-20 mb-20 flex-col lg:flex-row min-w-screen sm:mt-5 sm:mb-5">
        <img src="{{ asset('images/welcome.jpg') }}" class="rounded-lg lg:w-1/2 md:hero-h-sreen sm:w-full" />
        <div class="px-6 lg:w-2/3 sm:w-full">
            <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold font-Overpass text-Second text-center">What We Do</h1>
            {{-- <div class="card card-side bg-base-100 shadow-xl mb-4 sm:flex w-full">
                <figure class="lg:w-1/3 sm:w-1/3"><img src="{{ asset('images/icon.png') }}" alt="icon" class="pl-6 sm:w-full"/></figure>
                <div class="card-body lg:w-full sm:w-2/3">
                    <h2 class="card-title">Resource Hub</h2>
                    <p>Explore a curated collection of educational resources designed to support vulnerable students.</p>
                </div>
            </div> --}}
            <div class="card card-side bg-base-100 shadow-xl mb-4 flex w-full">
                <figure class="lg:w-20 sm:w-1/3"><img src="{{ asset('images/icon.png') }}" alt="icon" class="pl-6 w-full"/></figure>
                <div class="card-body w-2/3">
                    <h2 class="card-title">Resource Hub</h2>
                    <p>Explore a curated collection of educational resources designed to support vulnerable students.</p>
                </div>
            </div>
            <div class="card card-side bg-base-100 shadow-xl mb-4 flex w-full">
                <figure class="lg:w-20 sm:w-1/3"><img src="{{ asset('images/icon (1).png') }}" alt="icon" class="pl-6 w-full"/></figure>
                <div class="card-body w-2/3">
                    <h2 class="card-title">Support Service Directory</h2>
                    <p>Access essential support services tailored for tertiary education, including tutoring and counselling.</p>
                </div>
            </div>
            <div class="card card-side bg-base-100 shadow-xl mb-4 w-full">
                <figure class="lg:w-20 sm:w-1/3" ><img src="{{ asset('images/icon (2).png') }}" alt="icon" class="pl-6 w-full"/></figure>
                <div class="card-body w-2/3">
                    <h2 class="card-title">Personalised Education Pathways</h2>
                    <p>Discover personalized learning pathways that cater to the unique needs and goals of students.</p>
                </div>
            </div>
            <div class="card card-side bg-base-100 shadow-xl mb-4 w-full">
                <figure class="lg:w-20 sm:w-1/3"><img src="{{ asset('images/icon (3).png') }}" alt="icon" class="pl-6 w-full"/></figure>
                <div class="card-body w-2/3">
                    <h2 class="card-title">Accessibility & Inclusivity Tools</h2>
                    <p>Utilize advanced tools aimed at ensuring education is accessible and inclusive.</p>
                </div>
            </div>
            <div class="card card-side bg-base-100 shadow-xl w-full">
                <figure class="lg:w-20 sm:w-1/3"><img src="{{ asset('images/icon (4).png') }}" alt="icon" class="pl-6 w-full"/></figure>
                <div class="card-body w-2/3">
                    <h2 class="card-title">Financial Aid & Scholarship Portal</h2>
                    <p>Navigate a comprehensive portal for financial aid and scholarships.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="hidden justify-center mt-12">
    <div class="carousel carousel-center rounded-box">
        <div class="carousel-item">
            <img src="https://daisyui.com/images/stock/photo-1559703248-dcaaec9fab78.jpg" alt="carousel-item" />
        </div> 
        <div class="carousel-item">
            <img src="https://daisyui.com/images/stock/photo-1565098772267-60af42b81ef2.jpg" alt="carousel-item" />
        </div> 
        <div class="carousel-item">
            <img src="https://daisyui.com/images/stock/photo-1572635148818-ef6fd45eb394.jpg" alt="carousel-item" />
        </div> 
        <div class="carousel-item">
            <img src="https://daisyui.com/images/stock/photo-1494253109108-2e30c049369b.jpg" alt="carousel-item" />
        </div> 
        <div class="carousel-item">
            <img src="https://daisyui.com/images/stock/photo-1550258987-190a2d41a8ba.jpg" alt="carousel-item" />
        </div> 
        <div class="carousel-item">
            <img src="https://daisyui.com/images/stock/photo-1559181567-c3190ca9959b.jpg" alt="carousel-item" />
        </div> 
        <div class="carousel-item">
            <img src="https://daisyui.com/images/stock/photo-1601004890684-d8cbf643f5f2.jpg" alt="carousel-item" />
        </div>
    </div>
    <!-- <img src="{{ asset('images/genericstudy.jpg') }}" class="min-w-full" /> -->
</div>
@endsection

<style>
    .hero-h-sreen {
        height: 90vh;
    }
</style>

