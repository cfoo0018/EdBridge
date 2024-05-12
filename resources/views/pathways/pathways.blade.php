@extends('layout.layout')

@section('title', 'BridgeEd - Pathways')

@section('content')
<!-- Pathway Title -->
<div id="pathway-title" class="mx-auto md:w-3/5 text-left mt-24 md:mt-36 px-4 md:px-0">
    <div class="flex space-x-4 mb-2">
        <h1 class="font-Overpass font-bold text-4xl text-Button">IT Pathways</h1>
        <img src="{{ asset('images/roadmap.png') }}" alt="pathway" class=" h-10"/>
    </div>
    <p class="text-xl">Welcome to our IT pathways guide! Explore diverse avenues in technology with us. From software development and cybersecurity to data science and AI, uncover your passion and potential in the dynamic world of IT.</p>
</div>

<div class="divider"></div>

<div id="pathway-div" class="w-4/5 mx-auto mt-12 space-y-12 md:space-y-24 mb-16">
    <div class="flex flex-col md:flex-row md:space-x-24 md:space-y-0 space-y-12 justify-center">
        <a href="{{ route('softwaredevelopment') }}">
            <div class="card md:card-side bg-base-200 shadow-xl">
                <figure class=""><img src="{{ asset('images/coding.jpg') }}" alt="Coding" class="md:size-72"/></figure>
                <div class="card-body">
                    <h2 class="card-title">Software Development Pathway</h2>
                    <p>Learn more about software development.</p>
                </div>
            </div>
        </a>
        <a href="{{ route('businessinformation') }}">
            <div class="card md:card-side bg-base-200 shadow-xl w-full">
                <figure><img src="{{ asset('images/businessinformation.jpg') }}" alt="Business Information" class="md:size-72"/></figure>
                <div class="card-body">
                    <h2 class="card-title">Business Information Systems Pathway</h2>
                    <p>Learn more about Business Information Systems.</p>
                </div>
            </div>
        </a>
    </div>
    <div class="flex flex-col md:flex-row md:space-x-24 md:space-y-0 space-y-12 justify-center">
        <a href="{{ route('datascience') }}">
            <div class="card md:card-side bg-base-200 shadow-xl">
                <figure><img src="{{ asset('images/datascience.jpg') }}" alt="Data Science" class="md:size-72"/></figure>
                <div class="card-body">
                    <h2 class="card-title">Data Science Pathway</h2>
                    <p>Learn more about data science.</p>
                </div>
            </div>
        </a>
        <a href="{{ route('cybersecurity') }}">
            <div class="card md:card-side bg-base-200 shadow-xl w-full">
                <figure><img src="{{ asset('images/cybersecurity.webp') }}" alt="Cyber Security" class="md:size-72"/></figure>
                <div class="card-body">
                    <h2 class="card-title">Cyber Security Pathway</h2>
                    <p>Learn more about cyber security.</p>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection