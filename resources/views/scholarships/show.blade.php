@extends('layout.layout')
@section('title', 'BridgeEd - Scholarship Details')
@section('content')
<div class="container mx-auto px-4 py-8 mt-20">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl md:text-3xl font-Fredoka text-center mb-6 text-Second">{{ $scholarship->title }}</h1>
        <div class="bg-white p-6 shadow-lg rounded-lg">
            <!-- University Logo -->
            <div class="mb-6 max-w-[400px] text-center mx-auto">
                @include('components.scholarship-logo', [
                    'provider' => strtolower($scholarship->provider),
                ])
            </div>
            <div class="mb-4">
                <p class="text-lg font-medium text-gray-700"><strong>Provider:</strong> {{ $scholarship->provider ?: 'Not available' }}</p>
            </div>
            <div class="mb-4">
                <p class="text-lg text-gray-700"><strong>Description:</strong></p>
                <p class="text-gray-600">{{ $scholarship->description ?: 'Not available' }}</p>
            </div>
            <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                <p class="text-lg font-medium text-gray-700"><strong>Amount:</strong> ${{ isset($scholarship->amount) ? number_format($scholarship->amount, 2) : 'Not available' }}</p>
                <p class="text-lg font-medium text-gray-700"><strong>Gender:</strong> {{ $scholarship->gender ?: 'Not available' }}</p>
            </div>
            <div class="mb-4">
                <p class="text-lg text-gray-700"><strong>Eligibility:</strong></p>
                <p class="text-gray-600">{{ $scholarship->eligibility ?: 'Not available' }}</p>
            </div>
            <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                <p class="text-lg font-medium text-gray-700"><strong>Level of Study:</strong> {{ $scholarship->level_of_study ?: 'Not available' }}</p>
                <p class="text-lg font-medium text-gray-700"><strong>Field of Study:</strong> {{ $scholarship->field_of_study ?: 'Not available' }}</p>
                <p class="text-lg font-medium text-gray-700"><strong>Student Type:</strong> {{ $scholarship->student_type ?: 'Not available' }}</p>
                <p class="text-lg font-medium text-gray-700"><strong>Frequency:</strong> {{ $scholarship->frequency ?: 'Not available' }}</p>
            </div>
            <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                <p class="text-lg font-medium text-gray-700"><strong>Number per Year:</strong> {{ $scholarship->number_per_year ?: 'Not available' }}</p>
                <p class="text-lg font-medium text-gray-700"><strong>Duration:</strong> {{ $scholarship->duration ?: 'Not available' }}</p>
            </div>
            <div class="mb-4">
                <p class="text-lg font-medium text-gray-700"><strong>Closing Date:</strong> {{ $scholarship->closing_date ?: 'Not available' }}</p>
            </div>
            <div class="mb-4">
                <p class="text-lg font-medium text-gray-700"><strong>More Information:</strong> <a href="{{ $scholarship->more_information_url }}" target="_blank" class="text-blue-500 hover:text-blue-700">Click here</a></p>
            </div>
        </div>
        <!-- Back Button -->
        <div class="mt-6 text-center">
            @if (session()->has('previous_page'))
                <a href="{{ session('previous_page') }}" class="text-blue-500 hover:text-blue-700">&larr; Back to Previous Page</a>
            @else
                <a href="{{ route('scholarships.index') }}" class="text-blue-500 hover:text-blue-700">&larr; Back to Scholarships</a>
            @endif
        </div>
    </div>
</div>
@endsection