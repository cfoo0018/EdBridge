@extends('layout.layout')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-xl font-bold mb-4">{{ $scholarship->title }}</h1>
    <div class="bg-white p-4 shadow-lg rounded">
        <p><strong>Provider:</strong> {{ $scholarship->provider }}</p>
        <p><strong>Description:</strong> {{ $scholarship->description }}</p>
        <p><strong>Amount:</strong> ${{ number_format($scholarship->amount, 2) }}</p>
        <p><strong>More Information:</strong> <a href="{{ $scholarship->more_information_url }}" target="_blank" class="text-blue-500 hover:text-blue-700">Click here</a></p>
    </div>
</div>
@endsection
