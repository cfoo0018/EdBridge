@extends('layout.layout')

@section('title', 'BridgeEd')
@section('content')
    <div class="w-full">
        <div class="hero min-h-screen bg-cover bg-center relative">
            <div class="hero-overlay bg-opacity-60"></div>
            <div class="hero-content text-center text-neutral-content">
                <div class="mx-auto">
                    <div id="changing-text" class="font-Overpass text-4xl text-white font-bold backdrop:blur-sm mb-10">
                        <p>Access quality education, regardless of your background.</p>
                        <p>Empowering your journey with free resources and dedicated support.</p>
                        <p>Start building your future with us today!</p>
                    </div>
                    <h1 class="my-5 text-7xl font-bold font-Overpass text-white">BridgeEd</h1>
                    <p id="typewriter-text" class="mb-5 font-Overpass-Mono text-xl blur-xs text-white"></p>
                    <a href="{{ route('resourcehub') }}" class="font-Fredoka"><button class="special-button text-white">
                            Explore Resources
                        </button>
                    </a>
                    {{-- <a href="{{ route('pathways') }}"
                        class="ml-4 btn btn-lg font-Fredoka text-Second border-Second hover:bg-Second hover:text-white btn-animated">
                        Discover Pathways
                    </a> --}}
                </div>
            </div>
            <div id="scroll-down-button"class="scrolldown"></div>
        </div>
        <div class="about-us bg-light-blue-100 py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl leading-9 fond-Overpass text-Second sm:text-4xl sm:leading-10">
                        Our Commitment to Your Future
                    </h2>
                    <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-600 sm:mt-4">
                        At <span class="text-Second">BridgeEd</span>, we believe everyone deserves a chance to succeed.
                        We're here to bridge the gap between
                        <span class="text-Second">potential and opportunity</span>, providing tailored resources and support to help you <span class="text-Second">overcome educational
                        barriers.</span> Discover our journey towards making education accessible for all.
                    </p>
                </div>
            </div>
        </div>
        <div class="bg-Bg">
            <div id="features" class="features max-w-[1280px] mx-auto px-4 py-10">
                <!-- Resource Hub Section -->
                <div id="resource-hub" class="feature mb-20 pt-20 flex flex-col lg:flex-row items-center gap-8">
                    <div class="neu-inset p-3">
                        <img src="{{ asset('images/platform.png') }}" class="feature-image" alt="Resource Hub">
                    </div>
                    <div class="neu p-6 w-full lg:w-1/2">
                        <h1 class="text-4xl font-Overpass mb-5 text-Second">Education Resource Hub</h1>
                        <p class="mb-10">Explore a curated collection of educational resources designed to support vulnerable students.</p>
                        <a href="{{ route('resourcehub') }}" class="neu-btn mt-10">Explore Our Resources</a>
                    </div>
                </div>
        
                <!-- Support Service Directory Section -->
                <div id="support-directory" class="feature mb-20 flex flex-col lg:flex-row-reverse items-center gap-8">
                    <div class="neu-inset p-3">
                        <img src="{{ asset('images/navigation.png') }}" class="feature-image" alt="Support Service Directory">
                    </div>
                    <div class="neu p-6 w-full lg:w-1/2">
                        <h1 class="text-4xl font-Overpass mb-5 text-Second">Support Service Directory</h1>
                        <p class="mb-10">Access essential support services tailored for tertiary education, including tutoring and counseling.</p>
                        <a href="{{ route('support.index') }}" class="neu-btn mt-10">Find Support Services</a>
                    </div>
                </div>
        
                <!-- Education Pathways Section -->
                <div id="education-pathways" class="feature mb-20 flex flex-col lg:flex-row items-center gap-8">
                    <div class="neu-inset p-3">
                        <img src="{{ asset('images/guidepost.png') }}" class="feature-image" alt="Personalized Education Pathways">
                    </div>
                    <div class="neu p-6 w-full lg:w-1/2">
                        <h1 class="text-4xl font-Overpass mb-5 text-Second">Personalized Education Pathways</h1>
                        <p class="mb-10">Discover personalized learning pathways that cater to the unique needs and goals of students.</p>
                        <a href="{{ route('pathways') }}" class="neu-btn mt-10">Explore Learning Pathways</a>
                    </div>
                </div>
        
                <!-- Financial Aid & Scholarship Portal Section -->
                <div id="financial-aid" class="feature mb-23 flex flex-col lg:flex-row-reverse items-center gap-8">
                    <div class="neu-inset p-3">
                        <img src="{{ asset('images/scholarship.png') }}" class="feature-image" alt="Financial Aid & Scholarship Portal">
                    </div>
                    <div class="neu p-6 w-full lg:w-1/2">
                        <h1 class="text-4xl font-Overpass mb-5 text-Second">Scholarship Portal</h1>
                        <p class="mb-10">Navigate a comprehensive portal for financial aid and scholarships tailored to diverse backgrounds.</p>
                        <a href="{{ route('scholarships.index') }}" class="neu-btn mt-10 bg-Second">Apply Scholarship</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="team-section bg-white py-20">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-Overpass text-Second">Meet Our Team</h2>
                    <p class="text-lg text-gray-600 mt-4">Driven by passion and expertise, our team<span
                            class="text-Second">(SaveTheKids)</span> is dedicated to making quality education accessible to
                        everyone.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    <!-- Team Member Cards -->
                    <div
                        class="team-card group bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                        <div class="bg-cover bg-center h-60 w-full"
                            style="background-image: url('{{ asset('images/data_m.png') }}')"></div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-1">MDS</h3>
                            <p class="text-Second">AI/DS/Web Development Lead</p>
                            <p class="text-gray-500 mt-3">Driving innovation through data and development to empower
                                educational equity.</p>
                        </div>
                    </div>
                    <div
                        class="team-card group bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                        <div class="bg-cover bg-center h-60 w-full"
                            style="background-image: url('{{ asset('images/hacker.png') }}')"></div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-1">MCS</h3>
                            <p class="text-Second">Cyber Security Lead</p>
                            <p class="text-gray-500 mt-3">Safeguarding our platforms to ensure a secure and reliable
                                learning environment for all.</p>
                        </div>
                    </div>
                    <div
                        class="team-card group bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                        <div class="bg-cover bg-center h-60 w-full"
                            style="background-image: url('{{ asset('images/data_f.png') }}')"></div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-1">MDS</h3>
                            <p class="text-Second">Data Visualization Lead</p>
                            <p class="text-gray-500 mt-3">Transforming data into visual stories that enlighten and guide our
                                educational strategies.</p>
                        </div>
                    </div>
                    <div
                        class="team-card group bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                        <div class="bg-cover bg-center h-60 w-full"
                            style="background-image: url('{{ asset('images/bis_f.png') }}')"></div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-1">MBIS</h3>
                            <p class="text-Second">Business Analyst</p>
                            <p class="text-gray-500 mt-3">Bridging technology and business to create sustainable solutions
                                for educational challenges.</p>
                        </div>
                    </div>
                    <div
                        class="team-card group bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                        <div class="bg-cover bg-center h-60 w-full"
                            style="background-image: url('{{ asset('images/developer.png') }}')"></div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-1">MIT</h3>
                            <p class="text-Second">Web Developer</p>
                            <p class="text-gray-500 mt-3">Enhancing user experiences through seamless, cutting-edge web
                                interfaces.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/gh/sirxemic/jquery.ripples/dist/jquery.ripples-min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const scrollDownButton = document.getElementById('scroll-down-button');

            if (scrollDownButton) {
                scrollDownButton.addEventListener('click', () => {
                    const featuresSection = document.getElementById('features');
                    if (featuresSection) {
                        // Smooth scroll down to the features section
                        featuresSection.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            }
        });

        $(document).ready(function() {
            $('.hero').ripples({
                resolution: 512,
                dropRadius: 20,
                perturbance: 0.04,
            });

            // Now apply styles directly after
            $('.hero').css({
                'background-size': 'cover',
                'background-position': 'center',
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const texts = document.querySelectorAll('#changing-text p');
            let index = 0;

            // Initially show the first element
            texts[index].style.display = 'block';
            setTimeout(() => texts[index].classList.add('active'), 50);

            setInterval(function() {
                // Fade out the current text
                texts[index].classList.remove('active');
                setTimeout(() => {
                    texts[index].style.display = 'none';
                    index = (index + 1) % texts.length;
                    texts[index].style.display = 'block';
                    setTimeout(() => texts[index].classList.add('active'), 50);
                }, 2000);
            }, 5000);
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
@endpush
