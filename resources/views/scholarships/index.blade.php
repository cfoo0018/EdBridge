@extends('layout.layout')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-xl font-bold mb-4">Available Scholarships</h1>
    <ul>
        @foreach ($scholarships as $scholarship)
            <li class="mb-2 p-2 bg-white shadow-lg rounded">
                <a href="{{ route('scholarships.show', $scholarship->id) }}" class="text-blue-500 hover:text-blue-700">{{ $scholarship->title }}</a>
                <p>{{ $scholarship->provider }}</p>
            </li>
        @endforeach
    </ul>
</div>
@endsection
