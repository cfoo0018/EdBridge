<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>@yield('title', 'Default Title')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />

</head>

<body class="antialiased font-Fredoka">
    {{-- <nav> --}}
    @include('components.header')
    {{-- </nav> --}}

    {{-- <main> --}}
    <div>
        @yield('content')
    </div>
    {{-- <footer> --}}
    @include('components.footer')
    {{-- </footer> --}}

    {{-- <main> --}}

    @vite('resources/js/app.js')
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js"></script>
    <!-- Scripts -->
    @yield('scripts')
    <script src="{{ mix('js/app.js') }}"></script>
    @stack('script')
    <!-- Scripts -->
    {{-- <script>
        // Constants for the view modes
        const listView = document.getElementById('listView');
        const mapView = document.getElementById('mapView');
        const listViewToggle = document.getElementById('listViewToggle');
        const mapViewToggle = document.getElementById('mapViewToggle');

        // Function to show the list view and hide the map view
        function showListView() {
            listView.style.display = 'block';
            mapView.style.display = 'none';
            localStorage.setItem('preferredView', 'list'); // Save the state
        }

        // Function to show the map view and hide the list view
        function showMapView() {
            mapView.style.display = 'block';
            listView.style.display = 'none';
            localStorage.setItem('preferredView', 'map'); // Save the state
        }

        // Event listeners for the buttons
        listViewToggle.addEventListener('click', showListView);
        mapViewToggle.addEventListener('click', showMapView);

        // Check local storage for the preferred view on document load
        document.addEventListener('DOMContentLoaded', function() {
            const savedView = localStorage.getItem('preferredView');
            if (savedView === 'map') {
                showMapView();
            } else {
                showListView();
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const map = L.map('map').setView([-23.6980, 133.8807], 4);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            let routingControl = null;

            map.on('popupopen', function(e) {
                const link = e.popup._container.querySelector('.get-directions');
                if (link && !link.classList.contains('listener-attached')) {
                    link.classList.add('listener-attached');
                    link.addEventListener('click', function(event) {
                        event.preventDefault();
                        const enteredAddress = document.getElementById('locationInput').value;
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
                const popupContent =
                    `<strong>${name}</strong><br><a href="#" class="get-directions" data-lat="${lat}" data-lng="${lng}">Get Directions</a>`;
                const marker = L.marker([lat, lng]).addTo(map).bindPopup(popupContent);
            });
        });
    </script> --}}

    <script>
        $(function() {
            $('a').each(function() {
                if ($(this).prop('href') == window.location.href) {
                    $(this).addClass('active');
                    $(this).parents('li').addClass('active');
                }
            });
        });
    </script>
    <script type="text/javascript">
        var buttonRight = document.getElementById('slideRight');
        var buttonLeft = document.getElementById('slideLeft');

        buttonRight.onclick = function() {
            document.getElementById('subjects').scrollBy += 200;
        };
        buttonLeft.onclick = function() {
            document.getElementById('subjects').scrollBy -= 200;
        };
    </script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var hamburgerBtn = document.getElementById('hamburgerBtn');
            var mobileNav = document.getElementById('mobileNav');
            var closeMobileNav = document.getElementById('closeMobileNav');

            if (hamburgerBtn && mobileNav) {
                hamburgerBtn.addEventListener('click', function() {
                    mobileNav.classList.toggle('hidden');
                });
            }

            if (closeMobileNav && mobileNav) {
                closeMobileNav.addEventListener('click', function() {
                    mobileNav.classList.add('hidden');
                });
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.center').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const typeWriterText = document.getElementById('typewriter-text');
            const originalText = 'Connecting Paths, Unlocking Potential.';
            const text = '"' + originalText + '"'; // Including quotes directly in the text
            let index = 0;

            function typeWriterEffect() {
                if (index < text.length) {
                    typeWriterText.innerHTML += text.charAt(index);
                    index++;
                    setTimeout(typeWriterEffect, 100); // typing speed
                } else {
                    setTimeout(clearText, 2000); // Wait 
                }
            }

            function clearText() {
                typeWriterText.innerHTML = ''; // Clear the text
                index = 0; // Reset index
                typeWriterEffect(); // Start the effect again
            }

            typeWriterEffect(); // Initiate the typewriter effect
        });
    </script>

    <script>
        function openVideoModal(videoId) {
            const modal = document.getElementById('videoModal');
            // Set innerHTML of the modal box to include the video iframe
            modal.querySelector('.modal-box').innerHTML = `
        <div class="flex justify-end">
          <button onclick="closeVideoModal()" class="btn btn-sm btn-circle absolute right-2 top-2">✕</button>
        </div>
        <div class="aspect-video">
          <iframe class="w-full h-full" src="https://www.youtube.com/embed/${videoId}" 
          frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      `;
            modal.classList.add('modal-open'); // Use DaisyUI's class to open the modal
        }

        function closeVideoModal() {
            const modal = document.getElementById('videoModal');
            // Clear the innerHTML of the modal box to stop the video
            modal.querySelector('.modal-box').innerHTML = '';
            modal.classList.remove('modal-open'); // Use DaisyUI's class to close the modal
        }
    </script>


</body>

</html>
