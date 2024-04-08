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
    <!-- Scripts -->
    @yield('scripts')
    <!-- Scripts -->
    @vite('resources/js/app.js')
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
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
