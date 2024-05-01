@extends('layout.layout')
@section('title', 'BridgeEd - Support Services Directory')

@section('content')
    <!-- Main Content -->
    <div class="py-8 px-4 md:px-8 lg:px-16 mt-20">
        <!-- Title, Search Bar, and View Toggle -->
        <div class="mb-8">
            <div class="items-center">
                <h1 class="text-3xl md:text-4xl font-Fredoka text-Second text-center">Support Service Directory</h1>
            </div>
            <p class="text-lg text-gray-600 mt-2">Find the nearest support services based on your location</p>
            <!-- Search Form -->
            <form action="{{ route('support.index') }}" method="GET" class="mt-4">
                <input type="text" name="search" id="locationInput" placeholder="Enter your postal address"
                    class="w-full p-4 rounded-lg border-2 border-gray-200"
                    value="{{ request()->filled('search') ? request()->search : '' }}">
                <button type="submit"
                    class="mt-2 w-full bg-Button hover:bg-blue-700 text-white font-Fredoka py-2 px-4 rounded-lg">Search</button>
            </form>
        </div>

        <!-- Category Filters with Dropdown, Range Slider, and View Toggle -->
        <div class="mb-4 flex justify-between">
            <!-- Dropdown Select -->
            <div class="relative mr-2">
                <select onchange="window.location.href = this.value;"
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-800 py-2 px-4 pr-8 rounded-full leading-tight focus:outline-none focus:bg-white focus:border-gray-500 transition-colors duration-300">
                    @foreach ($serviceTypes as $key => $name)
                        <option
                            value="{{ route('support.index', ['service_type' => $key, 'search' => request()->input('search'), 'location' => request()->input('location')]) }}"
                            {{ $currentType === $key ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
                <!-- Dropdown Indicator Icon -->
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-800">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4.293 7.293a 1 1 0 0 1 1.414-1.414L10 10.586l4.293-4.293a1 1 0 0 1 1.414 1.414l-5 5a1 1 0 0 1-1.414 0l-5-5z" />
                    </svg>
                </div>
            </div>

            <!-- Range Slider -->
            <div class="w-1/4">
                <label for="rangeSlider">Max Distance (km): <span id="sliderValue">50</span></label>
                <input type="range" min="0" max="100" value="50" name="distance"
                    class="slider w-full appearance-none bg-gray-200 h-2 rounded-full mt-2" id="rangeSlider">
            </div>

            <!-- View Toggle Buttons -->
            <div class="flex items-center">
                <button id="listViewToggle" class="text-Second hover=text-gray-800 focus:outline-none text-3xl">
                    <i class="fas fa-list"></i>
                </button>
                <button id="mapViewToggle" class="ml-2 text-Second hover=text-gray-800 focus:outline-none text-3xl">
                    <i class="fas fa-map-marker-alt"></i>
                </button>
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
                        data-service-type="{{ $charity->service_type }}">
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
                                                <strong>Service Type: </strong>{{ $charity->service_type }}
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
                        {{ $charities->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script>
    $(document).ready(function() {
        // Autocomplete initialization
        $('#locationInput').autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: '{{ route('support.search') }}',
                    dataType: 'json',
                    data: {
                        term: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            minLength: 2,
            select: function(event, ui) {
                $('#locationInput').val(ui.item.value);
            }
        });
    
        // View toggling logic
        const listView = $('#listView');
        const mapView = $('#mapView');
        const listViewToggle = $('#listViewToggle');
        const mapViewToggle = $('#mapViewToggle');
    
        function showListView() {
            listView.removeClass('hidden');
            mapView.addClass('hidden');
            localStorage.setItem('preferredView', 'list');
        }
    
        function showMapView() {
            listView.addClass('hidden');
            mapView.removeClass('hidden');
            localStorage.setItem('preferredView', 'map');
            // map.invalidateSize(); // Ensure the map resizes correctly, This may break the working function**
        }
    
        listViewToggle.on('click', showListView);
        mapViewToggle.on('click', showMapView);
    
        const savedView = localStorage.getItem('preferredView');
        if (savedView === 'map') {
            showMapView();
        } else {
            showListView();
        }
    
        // Initialize the map with Melbourne coordinates by default
        const defaultLocation = [-37.8136, 144.9631]; // Melbourne coordinates
        const map = L.map('map').setView(defaultLocation, 10);
    
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: 'Map data &copy; OpenStreetMap contributors',
        }).addTo(map);
    
        let routingControl = null;
    
        // Function to geocode an address and update the map's view
        function updateMapView(address) {
            $.ajax({
                url: `https://nominatim.openstreetmap.org/search`,
                data: {
                    format: 'json',
                    q: address
                },
                dataType: 'json',
                success: function(data) {
                    if (data.length === 0) {
                        alert('Address not found!');
                        return;
                    }
    
                    const newLocation = new L.LatLng(data[0].lat, data[0].lon);
                    map.setView(newLocation, 12); // Update the map's center and zoom level
    
                    // redraw markers and popups
                    $('li[data-lat][data-lng]').each(function() {
                        const lat = parseFloat($(this).data('lat'));
                        const lng = parseFloat($(this).data('lng'));
                        const name = $(this).data('name');
                        const website = $(this).data('website');
                        const serviceType = $(this).data('service-type');
    
                        const popupContent = `
                            <strong>${name}</strong><br>
                            <p>Service Type: ${serviceType}</p>
                            <p>Website: <a href="${website}" target="_blank">${website}</a></p>
                            <a href="#" class="get-directions" data-lat="${lat}" data-lng="${lng}">Get Directions</a>
                        `;
    
                        L.marker([lat, lng]).addTo(map).bindPopup(popupContent);
                    });
                },
                error: function(error) {
                    console.error('Error fetching address:', error);
                    alert('Error fetching address!');
                }
            });
        }
    
        // Event listener for location input changes
        $('#locationInput').on('change', function() {
            const enteredAddress = $(this).val();
            if (!enteredAddress) {
                alert('Please enter your postal location in the given input box.');
                return;
            }
    
            updateMapView(enteredAddress);
        });
    
        map.on('popupopen', function(e) {
            if (routingControl) {
                map.removeControl(routingControl);
                routingControl = null;
            }
    
            const link = $(e.popup._container).find('.get-directions');
            if (link.length > 0 && !link.hasClass('listener-attached')) {
                link.addClass('listener-attached').on('click', function(event) {
                    event.preventDefault();
    
                    const lat = link.data('lat');
                    const lng = link.data('lng');
                    getGeocodeAndRoute($('#locationInput').val(), new L.LatLng(lat, lng));
                });
            }
        });
    
        function getGeocodeAndRoute(address, destinationLatLng) {
            $.ajax({
                url: `https://nominatim.openstreetmap.org/search`,
                data: {
                    format: 'json',
                    q: address
                },
                dataType: 'json',
                success: function(data) {
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
                },
                error: function(error) {
                    console.error('Error fetching address:', error);
                    alert('Error fetching address!');
                }
            });
        }
    
        // Markers and popups initialization
        $('li[data-lat][data-lng]').each(function() {
            const lat = parseFloat($(this).data('lat'));
            const lng = parseFloat($(this).data('lng'));
            const name = $(this).data('name');
            const website = $(this).data('website');
            const serviceType = $(this).data('service-type');
    
            const popupContent = `
                <strong>${name}</strong><br>
                <p>Service Type: ${serviceType}</p>
                <p>Website: <a href="${website}" target="_blank">${website}</a></p>
                <a href="#" class="get-directions" data-lat="${lat}" data-lng="${lng}">Get Directions</a>
            `;
    
            L.marker([lat, lng]).addTo(map).bindPopup(popupContent);
        });
    });
    </script> 
@endpush