@extends('layout.layout')

@section('title', 'BridgeEd - Pathways')

@section('content')
    <!-- Pathway Title -->
    <!-- Resource Hub Title -->
    <div id="resourcehub-title" class="mx-auto md:w-3/5 mt-24 md:mt-36 px-4 md:px-0 text-center">
        <div class="flex space-x-4 mb-2 flex-row justify-center">
            <h1 class="font-Fredoka sm:text-3xl md:text-5xl text-2xl text-Second">IT Education Pathway</h1>
            {{-- <img src="{{ asset('images/roadmap.png') }}" alt="books" class=" h-10" /> --}}
        </div>
        <p class="text-xl">
            Navigate your educational journey with our personalized IT Pathway, guiding you towards your academic and career
            goals in the tech industry.</p>
    </div>
    <div class="divider"></div>

    <!-- Introduction to Pathways -->


    <!-- Pathway Cards -->
    <div class="mx-auto px-4">
        <div class="border-2 border-slate-300 rounded-3xl bg-stone-100 py-8 md:p-20 md:mx-36 md:my-10">
            <div class="text-center md:mb-10">
                <h2 class="text-3xl font-Fredoka text-Second font-semibold">Explore Predefined Pathways</h2>
            </div>
            <div id="pathway-div"
                class="flex flex-wrap gap-8 md:gap-y-12 md:gap-x-12 justify-center font-semibold mt-12 mb-16 px-4">
                <!-- 1st Row -->
                <!-- Software Card -->
                <a href="{{ route('softwaredevelopment') }}" class="group">
                    <div class="card bg-base-200 shadow-xl transition-shadow duration-300 hover:shadow-2xl">
                        <figure><img src="{{ asset('images/information.png') }}" alt="Coding" /></figure>
                        <div class="card-body justify-between flex flex-wrap">
                            <h2 class="card-title">Software Development Pathway</h2>
                            <span class="text-Button hover:text-Second group-hover:underline">Explore Pathway</span>
                        </div>
                    </div>
                </a>
                <!-- Business Card -->
                <a href="{{ route('businessinformation') }}" class="group">
                    <div class="card bg-base-200 shadow-xl transition-shadow duration-300 hover:shadow-2xl">
                        <figure><img src="{{ asset('images/bis_f.png') }}" alt="Business Information" /></figure>
                        <div class="card-body justify-between flex flex-wrap">
                            <h2 class="card-title">Business Information Systems Pathway</h2>
                            <span class="text-Button hover:text-Second group-hover:underline">Explore Pathway</span>
                        </div>
                    </div>
                </a>
                <!-- 2nd Row -->
                <!-- Data Card -->
                <a href="{{ route('datascience') }}" class="group">
                    <div class="card bg-base-200 shadow-xl transition-shadow duration-300 hover:shadow-2xl">
                        <figure><img src="{{ asset('images/data-science.png') }}" alt="Data Science" /></figure>
                        <div class="card-body justify-between flex flex-wrap">
                            <h2 class="card-title">Data Science Pathway</h2>
                            <span class="text-Button hover:text-Second group-hover:underline">Explore Pathway</span>
                        </div>
                    </div>
                </a>
                <!-- Cyber Card -->
                <a href="{{ route('cybersecurity') }}" class="group">
                    <div class="card bg-base-200 shadow-xl transition-shadow duration-300 hover:shadow-2xl">
                        <figure><img src="{{ asset('images/hacker.png') }}" alt="Cyber Security" /></figure>
                        <div class="card-body justify-between flex flex-wrap">
                            <h2 class="card-title">Cyber Security Pathway</h2>
                            <span class="text-Button hover:text-Second group-hover:underline">Explore Pathway</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class=" text-center py-6 border-slate-300 rounded-3xl">
                <h1 class="text-3xl md:text-5xl font-Fredoka mb-3 text-Second">Unlock Your Future in IT with AI!</h1>
                <p class="text-xl mb-6">Feeling lost and unsure about your IT career direction? <br> Let our AI-driven guidance system help you discover the perfect IT pathway for you!</p>
                <a href="{{ route('questionnaire') }}"
                    class="inline-block bg-Second text-white font-Overpass px-8 py-4 rounded-lg hover:bg-gray-100 hover:text-Second transition-colors duration-300">
                    Start Your Journey
                </a>
            </div>
        </div>
    </div>
    {{-- <div class="divider"></div> --}}

    </div>



@endsection
