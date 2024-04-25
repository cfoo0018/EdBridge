@extends('layout.layout')
@section('title', 'BridgeEd - Support Services Directory')

@section('content')
    <!-- Main Content -->
    <div class="py-8 px-4 md:px-8 lg:px-16 mt-20">
        <!-- Title, Search Bar, and View Toggle -->
        <div class="mb-8">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl md:text-4xl font-Fredoka text-Second text-center">Support Service Directory</h1>
                <!-- View Toggle -->
                <div class="flex items-center">
                    <button id="listViewToggle" class="text-Second hover:text-gray-800 focus:outline-none text-3xl">
                        <i class="fas fa-list"></i>
                    </button>
                    <button id="mapViewToggle" class="ml-2 text-Second hover:text-gray-800 focus:outline-none text-3xl">
                        <i class="fas fa-map-marker-alt"></i>
                    </button>
                </div>
            </div>
            <p class="text-lg text-gray-600 mt-2">Find the nearest support services based on your location</p>
            <!-- Search Form -->
            <form action="{{ route('support.index') }}" method="GET" class="mt-4">
                <input type="text" name="search" placeholder="Enter your postal address"
                    class="w-full p-4 rounded-lg border-2 border-gray-200"
                    value="{{ request()->filled('search') ? request()->search : '' }}">
                <!-- Include the entered location in a hidden input field -->
                <input type="hidden" name="location" value="{{ $userLocation ? implode(',', $userLocation) : '' }}">
                <button type="submit"
                    class="mt-2 w-full bg-Button hover:bg-blue-700 text-white font-Fredoka py-2 px-4 rounded-lg">Search</button>
            </form>
        </div>
        <!-- Category Filters -->
        <div class="mb-4 flex flex-wrap gap-2">
            @foreach ($serviceTypes as $key => $name)
                <a href="{{ route('support.index', ['service_type' => $key, 'search' => request()->input('search'), 'location' => request()->input('location')]) }}"
                    class="text-sm {{ $currentType === $key ? 'bg-Second text-white' : 'bg-gray-200 text-gray-800' }} hover:bg-white hover:text-Second btn font-Fredoka py-2 px-4 rounded-full transition-colors duration-300">
                    {{ $name }}
                </a>
            @endforeach
        </div>

        <!-- Views Container -->
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Map View -->
            <div id="mapView" class="flex-1">
                <div class="h-64 lg:h-full bg-gray-200 rounded-xl overflow-hidden">
                    <p class="text-center pt-24">Map Placeholder</p>
                </div>
            </div>

            <!-- List View -->
            <div id="listView" class="hidden w-full">
                <div class="overflow-auto h-96 lg:h-full bg-white rounded-xl shadow-lg">
                    <ul class="divide-y divide-gray-200">
                        @foreach ($charities as $charity)
                            @if ($charity)
                                <li class="p-4 hover:bg-gray-50">
                                    <div class="flex items-start justify-between">
                                        <div class="flex-1">
                                            <h2 class="font-Fredoka text-xl md:text-2xl text-gray-800">
                                                {{ $charity->charity_legal_name }}
                                            </h2>
                                            <p class="text-sm md:text-base text-gray-600 mt-1">
                                                {{ $charity->full_address ?: 'Address not available' }}
                                                <br>
                                                <strong>Service Type: </strong>{{ $charity->formatted_service_type }}
                                            </p>
                                        </div>
                                        <div class="text-right ml-4">
                                            <div class="text-sm md:text-base font-medium text-gray-800 mb-2">
                                                <strong>Distance: </strong>
                                                @if (isset($charity->distance))
                                                    {{ round($charity->distance, 2) }} km
                                                @else
                                                    N/A
                                                @endif
                                            </div>
                                            <div>
                                                @if ($charity->charity_website)
                                                    <a href="{{ Str::startsWith($charity->charity_website, ['http://', 'https://']) ? $charity->charity_website : 'http://' . $charity->charity_website }}"
                                                        target="_blank" rel="noopener noreferrer"
                                                        class="inline-block bg-Button hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg text-xs md:text-sm transition-colors duration-300">
                                                        Visit Website
                                                    </a>
                                                @else
                                                    <span class="text-sm text-red-500">No website available</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    <!-- Pagination Links -->
                    <div class="px-4 py-3">
                        {{ $charities->appends(request()->query())->links() }}
                        {{-- {{ $charities->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
