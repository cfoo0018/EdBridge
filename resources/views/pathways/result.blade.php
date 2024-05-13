@extends('layout.layout')

@section('title', 'BridgeEd - Pathways')

@section('content')
    <div class="container max-w-lg mx-auto bg-white p-6 rounded shadow m-40">
        <h1 class="text-2xl font-bold mb-6 text-Second text-center">Result</h1>
        <p class="mb-4">The predicted career path is: <span class="text-Second font-Overpass">{{ $careerPath }}</span></p>

        @if ($careerPath === 'Artificial Intelligence')
            <img src="{{ asset('images/AI.png') }}" alt="Artificial Intelligence Pathway" class="w-full h-auto">
        @elseif ($careerPath === 'Data Science')
            <img src="{{ asset('images/data-science.png') }}" alt="Data Science Pathway" class="w-full h-auto">
        @elseif ($careerPath === 'Business Information System')
            <img src="{{ asset('images/information.png') }}" alt="Business Information Systems Pathway" class="w-full h-auto">
        @elseif ($careerPath === 'Cyber Security')
            <img src="{{ asset('images/hacker.png') }}" alt="Business Information Systems Pathway" class="w-full h-auto">
        @elseif ($careerPath === 'Software Development')
            <img src="{{ asset('images/developer.png') }}" alt="Business Information Systems Pathway" class="w-full h-auto">
        @else
            <p>No specific pathway image available.</p>
        @endif

        <a href="{{ route('questionnaire') }}" class="text-blue-500 hover:underline">Take the questionnaire again</a>
    </div>
@endsection
