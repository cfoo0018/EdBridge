@extends('layout.layout')

@section('content')
<div class="container mx-auto px-4 py-8 mt-20">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl md:text-3xl font-Fredoka text-center mb-6 text-Second">{{ $scholarship->title }}</h1>
        <div class="bg-white p-6 shadow-lg rounded-lg">
            <p class="text-lg mb-4"><strong>Provider:</strong> {{ $scholarship->provider ?: 'Not available' }}</p>
            <p class="mb-4"><strong>Description:</strong> {{ $scholarship->description ?: 'Not available' }}</p>
            <p class="mb-4"><strong>Amount:</strong> ${{ isset($scholarship->amount) ? number_format($scholarship->amount, 2) : 'Not available' }}</p>
            <p class="mb-4"><strong>Eligibility:</strong> {{ $scholarship->eligibility ?: 'Not available' }}</p>
            <p class="mb-4"><strong>Gender:</strong> {{ $scholarship->gender ?: 'Not available' }}</p>
            <p class="mb-4"><strong>Level of Study:</strong> {{ $scholarship->level_of_study ?: 'Not available' }}</p>
            <p class="mb-4"><strong>Field of Study:</strong> {{ $scholarship->field_of_study ?: 'Not available' }}</p>
            <p class="mb-4"><strong>Student Type:</strong> {{ $scholarship->student_type ?: 'Not available' }}</p>
            <p class="mb-4"><strong>Frequency:</strong> {{ $scholarship->frequency ?: 'Not available' }}</p>
            <p class="mb-4"><strong>Number per Year:</strong> {{ $scholarship->number_per_year ?: 'Not available' }}</p>
            <p class="mb-4"><strong>Duration:</strong> {{ $scholarship->duration ?: 'Not available' }}</p>
            <p class="mb-4"><strong>Closing Date:</strong> {{ $scholarship->closing_date ?: 'Not available' }}</p>
            <p><strong>More Information:</strong> <a href="{{ $scholarship->more_information_url }}" target="_blank" class="text-blue-500 hover:text-blue-700">Click here</a></p>
        </div>
        <!-- Back Button -->
        <div class="mt-6">
            @if (session()->has('previous_page'))
                <a href="{{ session('previous_page') }}" class="text-blue-500 hover:text-blue-700">&larr; Back to Previous Page</a>
            @else
                <a href="{{ route('scholarships.index') }}" class="text-blue-500 hover:text-blue-700">&larr; Back to Scholarships</a>
            @endif
        </div>
    </div>
</div>
@endsection