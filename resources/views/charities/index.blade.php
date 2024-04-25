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
                <input type="text" name="search" id="locationInput" placeholder="Enter your postal address"
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
            <!-- Desktop view -->
            <div class="hidden md:block">
                @foreach ($serviceTypes as $key => $name)
                    <a href="{{ route('support.index', ['service_type' => $key, 'search' => request()->input('search'), 'location' => request()->input('location')]) }}"
                        class="text-sm {{ $currentType === $key ? 'bg-Second text-white' : 'bg-gray-200 text-gray-800' }} hover:bg-white hover:text-Second btn font-Fredoka py-2 px-4 rounded-full transition-colors duration-300">
                        {{ $name }}
                    </a>
                @endforeach
            </div>

            <!-- Mobile view -->
            <div class="md:hidden w-full">
                <div class="sm:w-full">
                    <select onchange="window.location.href = this.value;"
                        class="w-full text-sm bg-gray-200 text-gray-800 hover:bg-white hover:text-Second btn font-Fredoka py-2 px-4 rounded-full transition-colors duration-300">
                        @foreach ($serviceTypes as $key => $name)
                            <option
                                value="{{ route('support.index', ['service_type' => $key, 'search' => request()->input('search'), 'location' => request()->input('location')]) }}"
                                {{ $currentType === $key ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <!-- Views Container -->
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Map View -->
            <div id="mapView" class="flex w-full sm:h-screen" style="height: 800px">
                @foreach ($charities as $charity)
                    <li class="p-4 hover:bg-gray-50 hidden" data-lat="{{ $charity->latitude ?? 'not set' }}"
                        data-lng="{{ $charity->longitude ?? 'not set' }}" data-name="{{ $charity->charity_legal_name }}"
                        data-website="{{ $charity->charity_website ? (Str::startsWith($charity->charity_website, ['http://', 'https://']) ? $charity->charity_website : 'http://' . $charity->charity_website) : '#' }}"
                        data-service-type="{{ $charity->formatted_service_type }}">
                        <!-- Charity details here -->
                    </li>
                @endforeach
                <div id="map" class="w-full h-full"></div>
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
@push('script')
    <div x-data="{ showAlert: false }">
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const listView = document.getElementById('listView');
                const mapView = document.getElementById('mapView');
                const listViewToggle = document.getElementById('listViewToggle');
                const mapViewToggle = document.getElementById('mapViewToggle');

                function showListView() {
                    listView.classList.remove('hidden');
                    mapView.classList.add('hidden');
                    localStorage.setItem('preferredView', 'list');
                }

                function showMapView() {
                    listView.classList.add('hidden');
                    mapView.classList.remove('hidden');
                    localStorage.setItem('preferredView', 'map');
                }

                listViewToggle.addEventListener('click', showListView);
                mapViewToggle.addEventListener('click', showMapView);

                const savedView = localStorage.getItem('preferredView');
                if (savedView === 'map') {
                    showMapView();
                } else {
                    showListView();
                }

                // Map-related functionalities
                const map = L.map('map').setView([-23.6980, 133.8807], 4);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 18,
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                let routingControl = null;

                map.on('popupopen', function(e) {
                    // Close routing control if it exists
                    if (routingControl) {
                        map.removeControl(routingControl);
                        routingControl = null;
                    }

                    const link = e.popup._container.querySelector('.get-directions');
                    if (link && !link.classList.contains('listener-attached')) {
                        link.classList.add('listener-attached');
                        link.addEventListener('click', function(event) {
                            event.preventDefault();
                            const enteredAddress = document.getElementById('locationInput').value;
                            if (!enteredAddress) {
                                // Show alert if location input is not entered
                                alert('Please enter your postal location in the given input box.');
                                return;
                            }
                            const lat = link.dataset.lat;
                            const lng = link.dataset.lng;
                            getGeocodeAndRoute(enteredAddress, new L.LatLng(lat, lng));
                        });
                    }
                });

                function getGeocodeAndRoute(address, destinationLatLng) {
                    fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.length === 0) {
                                alert('Address not found!');
                                return;
                            }
                            const userLocation = new L.LatLng(data[0].lat, data[0].lon);
                            if (routingControl) {
                                map.removeControl(routingControl);
                            }
                            routingControl = L.Routing.control({
                                waypoints: [userLocation, destinationLatLng],
                                routeWhileDragging: true,
                                showAlternatives: true,
                                fitSelectedRoutes: true,
                                createMarker: function(i, waypoint) {
                                    return L.marker(waypoint.latLng);
                                }
                            }).addTo(map);
                        })
                        .catch(error => {
                            console.error('Error fetching address:', error);
                            alert('Error fetching address!');
                        });
                }

                document.querySelectorAll('li[data-lat][data-lng]').forEach(function(item) {
                    const lat = parseFloat(item.dataset.lat);
                    const lng = parseFloat(item.dataset.lng);
                    const name = item.dataset.name;
                    const website = item.dataset.website;
                    const serviceType = item.dataset.serviceType;
                    const popupContent =
                        `<strong>${name}</strong><br>
                    <p>Service Type: ${serviceType}</p>
                    <p>Website: <a href="${website}" target="_blank">${website}</a></p>
                    <a href="#" class="get-directions" data-lat="${lat}" data-lng="${lng}">Get Directions</a>`;
                    const marker = L.marker([lat, lng]).addTo(map).bindPopup(popupContent);
                });
            });
        </script>
    </div>
@endpush