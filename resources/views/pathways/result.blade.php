@extends('layout.layout')

@section('title', 'BridgeEd - Pathways')

@section('content')
    <div class="container max-w-lg mx-auto bg-white p-6 rounded shadow m-40">
        <h1 class="text-2xl font-bold mb-6 text-Second text-center">Result</h1>
        <p class="mb-4">The predicted career path is: <span class="text-Second font-Overpass">{{ $careerPath }}</span></p>

        @if ($careerPath === 'Artificial Intelligence')
            <img src="{{ asset('images/AI.png') }}" alt="Artificial Intelligence Pathway" class="w-full h-auto mb-4">
            <a href="{{ route('ai') }}" class="bg-Second hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition-colors duration-300 text-center block mb-4">Go to AI Roadmap</a>
        @elseif ($careerPath === 'Data Science')
            <img src="{{ asset('images/data-science.png') }}" alt="Data Science Pathway" class="w-full h-auto mb-4">
            <a href="{{ route('datascience') }}" class="bg-Second hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition-colors duration-300 text-center block mb-4">Go to Data Science Roadmap</a>
        @elseif ($careerPath === 'Business Information System')
            <img src="{{ asset('images/information.png') }}" alt="Business Information Systems Pathway" class="w-full h-auto mb-4">
            <a href="{{ route('businessinformation') }}" class="bg-Second hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition-colors duration-300 text-center block mb-4">Go to BIS Roadmap</a>
        @elseif ($careerPath === 'Cyber Security')
            <img src="{{ asset('images/hacker.png') }}" alt="Cyber Security Pathway" class="w-full h-auto mb-4">
            <a href="{{ route('cybersecurity') }}" class="bg-Second hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition-colors duration-300 text-center block mb-4">Go to Cyber Security Roadmap</a>
        @elseif ($careerPath === 'Software Development')
            <img src="{{ asset('images/developer.png') }}" alt="Software Development Pathway" class="w-full h-auto mb-4">
            <a href="{{ route('softwaredevelopment') }}" class="bg-Second hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition-colors duration-300 text-center block mb-4">Go to Software Development Roadmap</a>
        @else
            <p>No specific pathway image available.</p>
        @endif

        <a href="{{ route('questionnaire') }}" class="text-Second hover:underline block text-center mt-4">Take the questionnaire again</a>
    </div>
@endsection
