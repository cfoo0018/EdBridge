@extends('layout.layout')
@section('title', 'BridgeEd - Support Services Directory')

@section('content')
    <!-- Main Content -->
    <div class="py-8 px-4 md:px-8 lg:px-16 mt-20">
        <!-- Title and Description -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl md:text-4xl font-Fredoka text-Second">Support Service Directory</h1>
            <p class="text-lg text-gray-600 mt-2">Find the nearest support services based on your location.</p>
        </div>

        <!-- User Guide Section -->
        <div class="bg-gray-100 p-6 rounded-lg shadow-lg mb-8">
            <h2 class="text-2xl font-Fredoka mb-4 text-center">User Guide</h2>

            <p class="text-base text-gray-700 text-center">
                The <strong>Support Service Directory</strong> provides an intuitive way to find services near your
                location.
                Here's how to use it effectively:
            </p>

            <!-- Sections for each feature -->
            <div class="mt-6">
                <h3 class="text-xl font-Fredoka mb-2">Using the Search Form:</h3>
                <ul class="list-disc pl-6 text-base text-gray-700">
                    <li><strong>Location Input:</strong> Enter your current location or postal address to localize services.
                    </li>
                    <li><strong>Search Button:</strong> Click the <em>Search</em> button to retrieve nearby services.</li>
                </ul>
            </div>

            <div class="mt-6">
                <h3 class="text-xl font-Fredoka mb-2">Filtering Services:</h3>
                <ul class="list-disc pl-6 text-base text-gray-700">
                    <li><strong>Category Dropdown:</strong> Choose a service type, such as Youth or Adults, to reload the
                        page with matching results.</li>
                    <li><strong>Distance Slider:</strong> Adjust to specify a maximum distance (in km) for services from
                        your location.</li>
                    <li><strong>View Toggle Buttons:</strong> Switch between:
                        <ul class="list-disc pl-6 text-base text-gray-700">
                            <li><strong>List View: <i class="fas fa-list text-Second"></i></strong> Displays services in a
                                textual list format with essential details.</li>
                            <li><strong>Map View: <i class="fas fa-map-marker-alt text-Second"></i></strong> Shows services
                                as markers on a map, with pop-up information on clicking.</li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="mt-6">
                <h3 class="text-xl font-Fredoka mb-2">Interacting with the Results:</h3>
                <ul class="list-disc pl-6 text-base text-gray-700">
                    <li><strong>List View:</strong> Includes:
                        <ul class="list-disc pl-6 text-base text-gray-700">
                            <li><strong>Name:</strong> The service or organization's name.</li>
                            <li><strong>Address:</strong> Full address or indication if unavailable.</li>
                            <li><strong>Service Type:</strong> The type of support offered.</li>
                            <li><strong>Distance:</strong> The distance from your current location.</li>
                            <li><strong>Website:</strong> A link to the service's website, if available.</li>
                        </ul>
                    </li>
                    <li><strong>Map View:</strong> Markers reveal a pop-up with:
                        <ul class="list-disc pl-6 text-base text-gray-700">
                            <li><strong>Name and Service Type:</strong> For quick identification.</li>
                            <li><strong>Website:</strong> A link to the service's website.</li>
                            <li><strong>Directions:</strong> A button to get directions from your current location to the
                                service.</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Search Form -->
        <form action="{{ route('support.index') }}" method="GET" class="mb-4">
            <!-- Location Input and Search Button -->
            <div class="flex flex-col gap-4 lg:flex-row lg:gap-8">
                <!-- Location Input -->
                <div class="flex-grow">
                    <input type="text" name="search" id="locationInput" placeholder="Enter your postal address"
                        class="w-full p-4 rounded-lg border-2 border-gray-200"
                        value="{{ request()->filled('search') ? request()->search : '' }}">
                </div>

                <!-- Search Button -->
                <button type="submit" class="bg-Button hover:bg-blue-700 text-white font-Fredoka py-2 px-4 rounded-lg">
                    Search
                </button>
            </div>

            <!-- Dropdown, Slider, and View Toggles -->
            <div class="mt-4 flex flex-col lg:flex-row gap-6">
                <!-- View Toggle Buttons -->
                <div class="flex items-center gap-2 text-Second lg:w-1/5">
                    <button id="listViewToggle" class="hover:text-gray-800 focus:outline-none text-3xl transition-colors">
                        <i class="fas fa-list"></i>
                    </button>
                    <button id="mapViewToggle" class="hover:text-gray-800 focus:outline-none text-3xl transition-colors">
                        <i class="fas fa-map-marker-alt"></i>
                    </button>
                </div>

                <!-- Category Dropdown -->
                <div class="relative flex-grow lg:w-1/3">
                    <select onchange="window.location.href = this value;"
                        class="block w-full bg-gray-200 border border-gray-300 text-gray-800 py-2 px-4 pr-8 rounded-full leading-tight focus:outline-none focus:bg-white focus:border-gray-500 transition-all duration-300">
                        @foreach ($serviceTypes as $key => $name)
                            <option
                                value="{{ route('support.index', ['service_type' => $key, 'search' => request()->input('search'), 'distance' => request()->input('distance')]) }}"
                                {{ $currentType === $key ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>

                    <!-- Dropdown Indicator Icon -->
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-800">
                        {{-- <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4.293 7.293a 1 1 0 0 1 1.414-1.414L10 10.586l4.293-4.293a 1 1 0 0 1 1.414 1.414l-5-5z" />
                        </svg> --}}
                    </div>
                </div>

                <!-- Distance Slider -->
                <div class="w-full lg:w-1/4">
                    <label for="rangeSlider" class="block font-semibold">Max Distance (km): <span
                            id="sliderValue">{{ $distanceKm }}</span></label>
                    <input type="range" min="0" max="100" value="{{ $distanceKm }}" name="distance"
                        class="slider w-full appearance-none bg-gray-200 h-2 rounded-full mt-2 transition-colors duration-300"
                        id="rangeSlider">
                </div>

            </div>
        </form>

        <!-- Views Container -->
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Map View -->
            <div id="mapView" class="w-full sm:h-screen" style="height: 800px">
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
                    updateMapView(ui.item.value, $('#rangeSlider').val());
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
            }

            listViewToggle.on('click', showListView);
            mapViewToggle.on('click', showMapView);

            const savedView = localStorage.getItem('preferredView');
            if (savedView === 'map') {
                showMapView();
            } else {
                showListView();
            }

            // Map Initialization
            let map = L.map('map').setView([-37.8136, 144.9631], 10); // Melbourne coordinates
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 18,
                attribution: 'Map data &copy; OpenStreetMap contributors',
            }).addTo(map);

            let routingControl = null;

            // Function to compute the distance between two coordinates using the haversine formula
            function haversineDistance(lat1, lon1, lat2, lon2, radius = 6371) {
                const dLat = deg2rad(lat2 - lat1);
                const dLon = deg2rad(lon2 - lon1);
                const a = Math.pow(Math.sin(dLat / 2), 2) +
                    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * Math.pow(Math.sin(dLon / 2), 2);
                return 2 * radius * Math.asin(Math.sqrt(a));
            }

            function deg2rad(deg) {
                return deg * Math.PI / 180;
            }

            function updateMapView(address, distanceKm) {
                $.ajax({
                    url: `https://nominatim.openstreetmap.org/search`,
                    data: {
                        format: 'json',
                        q: address
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.length > 0) {
                            const newLocation = new L.LatLng(data[0].lat, data[0].lon);
                            map.setView(newLocation, 12); // Update map center and zoom level

                            // Filter and update listings based on distance
                            $('li[data-lat][data-lng]').each(function() {
                                const lat = parseFloat($(this).data('lat'));
                                const lng = parseFloat($(this).data('lng'));
                                const distance = haversineDistance(newLocation.lat, newLocation
                                    .lon, lat, lng);

                                if (distance <= distanceKm) {
                                    $(this).removeClass('hidden');
                                } else {
                                    $(this).addClass('hidden');
                                }

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
                        } else {
                            alert('Address not found!');
                        }
                    },
                    error: function() {
                        alert('Error fetching address. Please try again.');
                    }
                });
            }

            $('#rangeSlider').on('input', function() {
                const distance = $(this).val();
                $("#sliderValue").text(distance);

                const address = $('#locationInput').val();
                if (address) {
                    updateMapView(address, distance);
                }
            });

            $('#locationInput').on('change', function() {
                const enteredAddress = $(this).val();
                if (!enteredAddress) {
                    alert('Please enter your postal location.');
                    return;
                }

                updateMapView(enteredAddress, $('#rangeSlider').val());
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

            // Markers and pop-ups initialization
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
