@extends('layout.layout')

@section('title', 'BridgeEd - Pathways')

@section('content')
<!-- Pathway Title -->
<div class="bg-white text-center py-12 mt-40">
    <h1 class="text-3xl md:text-5xl font-Fredoka mb-3 text-Second">Unlock Your Future in IT with AI!</h1>
    <p class="text-xl mb-6">Discover which IT career path fits you best with our AI-driven guidance system.</p>
    <a href="{{ route('questionnaire') }}" class="inline-block bg-Second text-white font-Overpass px-8 py-4 rounded-lg hover:bg-gray-100 hover:text-Second transition-colors duration-300">
        Start Your Journey
    </a>
</div>

<div class="divider"></div>
<!-- Introduction to Pathways -->
<div class="mt-12 px-4 text-center">
    <h2 class="text-3xl font-Fredoka text-Second">Explore Predefined Pathways</h2>
    <p class="text-lg mt-4">Each pathway below represents a focused direction in IT. If you're unsure where to start, let our <span class="text-Second font-Fredoka"> <a href="{{ route('questionnaire') }}"> AI </a></span> guide help match you with a pathway that aligns with your interests and skills.</p>
</div>
<div id="pathway-div" class="w-4/5 mx-auto mt-12 space-y-12 md:space-y-24 mb-16">
    <div class="flex flex-col md:flex-row md:space-x-24 md:space-y-0 space-y-12 justify-center">
        <a href="{{ route('softwaredevelopment') }}" class="group">
            <div class="card md:card-side bg-base-200 shadow-xl transition-shadow duration-300 hover:shadow-2xl">
                <figure><img src="{{ asset('images/coding.jpg') }}" alt="Coding" class="md:size-72"/></figure>
                <div class="card-body">
                    <h2 class="card-title">Software Development Pathway</h2>
                    <p>Learn more about software development.</p>
                    <span class="text-blue-500 hover:text-blue-700 group-hover:underline">Explore Pathway</span>
                </div>
            </div>
        </a>
        <a href="{{ route('businessinformation') }}" class="group">
            <div class="card md:card-side bg-base-200 shadow-xl transition-shadow duration-300 hover:shadow-2xl w-full">
                <figure><img src="{{ asset('images/businessinformation.jpg') }}" alt="Business Information" class="md:size-72"/></figure>
                <div class="card-body">
                    <h2 class="card-title">Business Information Systems Pathway</h2>
                    <p>Learn more about Business Information Systems.</p>
                    <span class="text-blue-500 hover:text-blue-700 group-hover:underline">Explore Pathway</span>
                </div>
            </div>
        </a>
    </div>
    <div class="flex flex-col md:flex-row md:space-x-24 md:space-y-0 space-y-12 justify-center">
        <a href="{{ route('datascience') }}" class="group">
            <div class="card md:card-side bg-base-200 shadow-xl transition-shadow duration-300 hover:shadow-2xl">
                <figure><img src="{{ asset('images/datascience.jpg') }}" alt="Data Science" class="md:size-72"/></figure>
                <div class="card-body">
                    <h2 class="card-title">Data Science Pathway</h2>
                    <p>Learn more about data science.</p>
                    <span class="text-blue-500 hover:text-blue-700 group-hover:underline">Explore Pathway</span>
                </div>
            </div>
        </a>
        <a href="{{ route('cybersecurity') }}" class="group">
            <div class="card md:card-side bg-base-200 shadow-xl transition-shadow duration-300 hover:shadow-2xl w-full">
                <figure><img src="{{ asset('images/cybersecurity.webp') }}" alt="Cyber Security" class="md:size-72"/></figure>
                <div class="card-body">
                    <h2 class="card-title">Cyber Security Pathway</h2>
                    <p>Learn more about cyber security.</p>
                    <span class="text-blue-500 hover:text-blue-700 group-hover:underline">Explore Pathway</span>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection