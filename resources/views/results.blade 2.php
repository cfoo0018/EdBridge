@extends('layout.layout')

@section('content')
<div class="container mx-auto p-8">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-10 mt-100">Search Results</h1>
    @forelse ($results as $result)
        <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-lg shadow-lg hover:shadow-2xl transition duration-300">
            <div class="md:flex">
                <div class="w-full p-4">
                    <p class="text-gray-600 text-lg">{{ $result['content'] }}</p>
                </div>
            </div>
        </div>
        <div class="my-6"></div>
    @empty
        <div class="text-center">
            <p class="text-xl text-gray-700">No results found for your query.</p>
            <img src="/images/no-results.png" alt="No Results" class="mx-auto w-1/2 mt-4 opacity-75">  <!-- Consider adding a relevant image -->
        </div>
    @endforelse
</div>
@endsection