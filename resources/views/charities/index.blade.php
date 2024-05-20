@extends('layout.layout')
@section('title', 'BridgeEd - Support Services Directory')

@section('content')
    <!-- Main Content -->
    <div class="mb-8 text-center mt-40">
        <h1 class="text-3xl md:text-5xl font-Fredoka text-Second">Support Service Directory</h1>
        <p class="text-lg text-gray-600 mt-2 mb-8">Find the nearest support services based on your location.</p>
        <!-- User Guide Button -->
        <button class="btn" onclick="userGuideModal.showModal()">User Guide<i
                class="fas fa-question-circle text-Second"></i></button>
    </div>
    <div class="divider"></div>
    <div class="py-8 px-4 md:px-8 lg:px-16 max-w-[1280px] mx-auto">
        <!-- Search Form -->
        <form id="searchForm" action="{{ route('support.index') }}" method="GET" class="mb-8 bg-white p-6 rounded-lg shadow-lg">
            <!-- Location Input and Search Button -->
            <div class="flex flex-col gap-4 lg:flex-row lg:gap-8">
                <div class="flex-grow">
                    <input type="text" name="search" id="locationInput" placeholder="Enter your address"
                        class="form-input w-full p-4 rounded-lg border-2 border-gray-300 focus:border-Second focus:ring-Second"
                        value="{{ request()->filled('search') ? request()->search : '' }}">
                </div>
                <button type="submit"
                    class="bg-Second hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition-colors duration-300">
                    Search
                </button>
            </div>
        
            <!-- Dropdown, Slider, and View Toggles -->
            <div class="mt-6 flex flex-col lg:flex-row gap-6 text-center">
                <!-- View Toggle Buttons with Icons and Text Labels -->
                <div class="flex items-center gap-4 text-Second lg:w-1/4">
                    <div class="tooltip" data-tooltip="Switch to list view">
                        <button id="listViewToggle"
                            class="hover:bg-gray-100 focus:outline-none py-2 px-4 rounded-lg text-lg transition-colors flex items-center justify-center gap-2">
                            <i class="fas fa-list"></i> List View
                        </button>
                    </div>
                    <div class="tooltip" data-tooltip="Switch to map view">
                        <button id="mapViewToggle"
                            class="hover:bg-gray-100 focus:outline-none py-2 px-4 rounded-lg text-lg transition-colors flex items-center justify-center gap-2">
                            <i class="fas fa-map-marker-alt"></i> Map View
                        </button>
                    </div>
                </div>
        
                <!-- Category Dropdown -->
                <div class="relative flex-grow lg:w-1/3">
                    <label for="serviceType" class="block font-semibold text-gray-800 mb-2">Filter by Service Type:</label>
                    <select id="serviceType" name="service_type" onchange="updateServiceType()"
                        class="form-select block w-full bg-gray-200 border border-gray-300 text-gray-800 py-2 px-4 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-Second transition-all duration-300">
                        <option value="">All Services</option>
                        @foreach ($serviceTypes as $key => $name)
                            <option value="{{ $key }}" {{ $currentType === $key ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                    <!-- Dropdown Indicator Icon -->
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-800">
                        {{-- <i class="fas fa-chevron-down"></i> --}}
                    </div>
                </div>
        
                <!-- Distance Slider with Min and Max Selection -->
                <div class="w-full lg:w-1/3 p-4">
                    <label for="distance-range" class="block font-semibold text-gray-800 mb-2">Distance Range (km):</label>
                    <div id="distance-range" class="w-full"></div>
                    <div class="flex justify-between mt-2">
                        <span id="minDistanceValue">{{ request('minDistance', 0) }} km</span>
                        <span id="maxDistanceValue">{{ request('maxDistance', 100) }} km</span>
                    </div>
                    <input type="hidden" id="minDistance" name="minDistance" value="{{ request('minDistance', 0) }}">
                    <input type="hidden" id="maxDistance" name="maxDistance" value="{{ request('maxDistance', 100) }}">
                </div>
            </div>
        </form>
        

        <!-- Views Container -->
        <div class="flex flex-col lg:flex-row gap-8 z-1">
            <!-- Map View -->
            <div id="mapView" class="w-full sm:h-screen z-1" style="height: 800px">
                @foreach ($charities as $charity)
                    <li class="p-4 hover:bg-gray-50 hidden" data-lat="{{ $charity->latitude ?? 'not set' }}"
                        data-lng="{{ $charity->longitude ?? 'not set' }}" data-name="{{ $charity->charity_legal_name }}"
                        data-website="{{ $charity->charity_website ? (Str::startsWith($charity->charity_website, ['http://', 'https://']) ? $charity->charity_website : 'http://' . $charity->charity_website) : '#' }}"
                        data-service-type="{{ $charity->formatted_service_type }}">
                        <!-- Charity details here -->
                    </li>
                @endforeach
                <div id="map" class="w-full h-full z-1"></div>
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
                                                {{ $charity->charity_legal_name }}</h2>
                                            <p class="text-sm md:text-base text-gray-600 mt-1">
                                                {{ $charity->full_address ?: 'Address not available' }}
                                                <br>
                                                <strong>Service Type:</strong> {{ $charity->formatted_service_type }}
                                            </p>
                                        </div>
                                        <div class="text-right ml-4">
                                            <div class="text-sm md:text-base font-medium text-gray-800 mb-2">
                                                <strong>Distance:</strong>
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
                    <div class="px-4 py-3">{{ $charities->links() }}</div>
                </div>
            </div>
        </div>
    </div>
    <!-- DaisyUI Modal Box -->
    <dialog id="userGuideModal" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box w-full">
            <h3 class="font-Overpass text-lg">User Guide</h3>
            <div class="py-4">
                <!-- User Guide Content -->
                <div class="bg-gray-100 rounded-lg shadow-lg mb-8">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 p-6">
                        <div>
                            <p class="text-base text-gray-700 text-center lg:text-left">
                                The <strong>Support Service Directory</strong> provides an intuitive way to find services
                                near your location.
                                Here's how to use it effectively:
                            </p>

                            <!-- Sections for each feature -->
                            <div class="mt-6">
                                <h3 class="text-xl font-Fredoka mb-2">Using the Search Form:</h3>
                                <ul class="list-disc pl-6 text-base text-gray-700">
                                    <li><strong>Location Input:</strong> Enter your current location or postal address to
                                        localize services.</li>
                                    <li><strong>Search Button:</strong> Click the <em>Search</em> button to retrieve nearby
                                        services.</li>
                                </ul>
                            </div>

                            <div class="mt-6">
                                <h3 class="text-xl font-Fredoka mb-2">Filtering Services:</h3>
                                <ul class="list-disc pl-6 text-base text-gray-700">
                                    <li><strong>Category Dropdown:</strong> Choose a service type, such as Youth or Adults,
                                        to reload the page with matching results.</li>
                                    <li><strong>Distance Slider:</strong> Adjust to specify a maximum distance (in km) for
                                        services from your location.</li>
                                    <li><strong>View Toggle Buttons:</strong> Switch between:
                                        <ul class="list-disc pl-6 text-base text-gray-700">
                                            <li><strong>List View <i class="fas fa-list text-Second"></i>:</strong>
                                                Displays services in a textual list format with essential details.</li>
                                            <li><strong>Map View <i
                                                        class="fas fa-map-marker-alt text-Second"></i>:</strong>
                                                Shows services as markers on a map, with pop-up information on clicking.
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div>
                            <div class="mt-6">
                                <h3 class="text-xl font-Fredoka mb-2">Interacting with the Results:</h3>
                                <ul class="list-disc pl-6 text-base text-gray-700">
                                    <li><strong>List View <i class="fas fa-list text-Second"></i>:</strong> Includes:
                                        <ul class="list-disc pl-6 text-base text-gray-700">
                                            <li><strong>Name:</strong> The service or organization's name.</li>
                                            <li><strong>Address:</strong> Full address or indication if unavailable.</li>
                                            <li><strong>Service Type:</strong> The type of support offered.</li>
                                            <li><strong>Distance:</strong> The distance from your current location.</li>
                                            <li><strong>Website:</strong> A link to the service's website, if available.
                                            </li>
                                        </ul>
                                    </li>
                                    <li><strong>Map View <i class="fas fa-map-marker-alt text-Second"></i>:</strong>
                                        Markers reveal a pop-up with:
                                        <ul class="list-disc pl-6 text-base text-gray-700">
                                            <li><strong>Name and Service Type:</strong> For quick identification.</li>
                                            <li><strong>Website:</strong> A link to the service's website.</li>
                                            <li><strong>Directions:</strong> A button to get directions from your current
                                                location to the service.</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-action">
                <form method="dialog">
                    <button class="btn">Close</button>
                </form>
            </div>
        </div>
    </dialog>
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
                    updateMapView(ui.item.value, $('#maxDistance').val(), $('#serviceType').val());
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

            // Custom icons for markers
            const userIcon = L.icon({
                iconUrl: "{{ asset('images/placement.png') }}",
                iconSize: [64, 64], // size of the icon
                iconAnchor: [32, 64], // point of the icon which will correspond to marker's location
                popupAnchor: [0, -64], // point from which the popup should open relative to the iconAnchor
                shadowSize: [64, 64] // size of the shadow
            });

            const charityIcon = L.icon({
                iconUrl: "{{ asset('images/location.png') }}",
                iconSize: [64, 64], // size of the icon
                iconAnchor: [32, 64], // point of the icon which will correspond to marker's location
                popupAnchor: [0, -64], // point from which the popup should open relative to the iconAnchor
                shadowSize: [64, 64] // size of the shadow
            });

            // Map Initialization
            let map = L.map('map').setView([-37.8136, 144.9631], 10); // Default to Melbourne coordinates
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 18,
                attribution: 'Map data &copy; OpenStreetMap contributors',
            }).addTo(map);

            let routingControl = null;
            let userMarker = null;

            // Retrieve saved location and zoom level from localStorage
            const savedLocation = localStorage.getItem('location');
            const savedZoom = localStorage.getItem('zoom');

            if (savedLocation && savedZoom) {
                const [lat, lng] = savedLocation.split(',');
                map.setView([parseFloat(lat), parseFloat(lng)], parseInt(savedZoom));
                // Add user marker on page load
                userMarker = L.marker([parseFloat(lat), parseFloat(lng)], {
                        icon: userIcon
                    }).addTo(map)
                    .bindPopup('<strong>Your Location</strong>').openPopup();
            }

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

            // Function to calculate a dynamic zoom level based on distance
            function calculateZoomLevel(distanceKm) {
                if (distanceKm <= 1) return 15;
                if (distanceKm <= 5) return 14;
                if (distanceKm <= 10) return 13;
                if (distanceKm <= 20) return 12;
                if (distanceKm <= 50) return 11;
                if (distanceKm <= 100) return 10;
                return 9;
            }

            function updateMapView(address, distanceKm, serviceType = null) {
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
                            const zoomLevel = calculateZoomLevel(
                                distanceKm); // Calculate zoom level based on distance
                            map.setView(newLocation, zoomLevel); // Update map center and zoom level

                            // Save location and zoom level to localStorage
                            localStorage.setItem('location', `${data[0].lat},${data[0].lon}`);
                            localStorage.setItem('zoom', zoomLevel);

                            // Add or update marker for user location
                            if (userMarker) {
                                userMarker.setLatLng(newLocation).bindPopup(
                                    '<strong>Your Location</strong>').openPopup();
                            } else {
                                userMarker = L.marker(newLocation, {
                                        icon: userIcon
                                    }).addTo(map)
                                    .bindPopup('<strong>Your Location</strong>').openPopup();
                            }

                            // Clear existing charity markers
                            map.eachLayer(function(layer) {
                                if (layer instanceof L.Marker && layer !== userMarker) {
                                    map.removeLayer(layer);
                                }
                            });

                            // Filter and update listings based on distance and service type
                            $('li[data-lat][data-lng]').each(function() {
                                const lat = parseFloat($(this).data('lat'));
                                const lng = parseFloat($(this).data('lng'));
                                const distance = haversineDistance(newLocation.lat, newLocation
                                    .lon, lat, lng);
                                const type = $(this).data('service-type');

                                if (distance <= distanceKm && (!serviceType || type ===
                                        serviceType)) {
                                    $(this).removeClass('hidden');

                                    const name = $(this).data('name');
                                    const website = $(this).data('website');

                                    const popupContent = `
                                    <strong>${name}</strong><br>
                                    <p>Service Type: ${type}</p>
                                    <p>Website: <a href="${website}" target="_blank">${website}</a></p>
                                    <a href="#" class="get-directions" data-lat="${lat}" data-lng="${lng}">Get Directions</a>
                                `;

                                    L.marker([lat, lng], {
                                        icon: charityIcon
                                    }).addTo(map).bindPopup(popupContent);

                                } else {
                                    $(this).addClass('hidden');
                                }
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

            $('#maxDistance').on('input', function() {
                const distance = $(this).val();
                $("#sliderValue").text(distance);

                const address = $('#locationInput').val();
                const serviceType = $('#serviceType').val();
                if (address) {
                    updateMapView(address, distance, serviceType);
                }
            });

            $('#locationInput').on('change', function() {
                const enteredAddress = $(this).val();
                const serviceType = $('#serviceType').val();
                if (!enteredAddress) {
                    alert('Please enter your postal location.');
                    return;
                }

                updateMapView(enteredAddress, $('#maxDistance').val(), serviceType);
            });

            $('#serviceType').on('change', function() {
                const serviceType = $(this).val();
                const address = $('#locationInput').val();
                const distance = $('#maxDistance').val();

                if (address) {
                    updateMapView(address, distance, serviceType);
                }
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
                                if (i === 0) {
                                    return L.marker(waypoint.latLng, {
                                        icon: userIcon
                                    });
                                } else {
                                    return L.marker(waypoint.latLng, {
                                        icon: charityIcon
                                    });
                                }
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

                L.marker([lat, lng], {
                    icon: charityIcon
                }).addTo(map).bindPopup(popupContent);
            });
        });

        function updateMinDistanceValue(value) {
            document.getElementById('minDistance').value = value;
            sessionStorage.setItem('minDistance', value);
        }

        function updateMaxDistanceValue(value) {
            document.getElementById('maxDistance').value = value;
            sessionStorage.setItem('maxDistance', value);
        }

        function syncSlidersWithInputs() {
            const minDistance = document.getElementById('minDistance').value;
            const maxDistance = document.getElementById('maxDistance').value;
            document.getElementById('minRangeSlider').value = minDistance;
            document.getElementById('maxRangeSlider').value = maxDistance;
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.js"></script>
    <script>
        var distanceRange = document.getElementById('distance-range');
        noUiSlider.create(distanceRange, {
            start: [{{ request('minDistance', 0) }}, {{ request('maxDistance', 100) }}],
            connect: true,
            range: {
                'min': 0,
                'max': 100
            },
            tooltips: [true, true],
            format: {
                to: function(value) {
                    return parseInt(value) + ' km';
                },
                from: function(value) {
                    return Number(value.replace(' km', ''));
                }
            }
        });

        distanceRange.noUiSlider.on('update', function(values, handle) {
            document.getElementById('minDistance').value = values[0].replace(' km', '');
            document.getElementById('maxDistance').value = values[1].replace(' km', '');
            document.getElementById('minDistanceValue').innerText = values[0];
            document.getElementById('maxDistanceValue').innerText = values[1];
        });

        distanceRange.noUiSlider.on('set', function(values, handle) {
            document.getElementById('searchForm').submit();
        });
    </script>
@endpush
