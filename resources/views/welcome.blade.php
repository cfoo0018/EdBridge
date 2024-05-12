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

        <div class="bg-Bg">
            <div id="features" class="features max-w-[1280px] mx-auto">

                <div id="resource-hub" class="feature mb-20 pt-20 flex flex-col lg:flex-row">
                    <div class="w-full lg:w-1/2 flex items-center justify-center p-3" data-aos="fade-left">
                        <img src="{{ asset('images/platform.png') }}" class="w-[30rem] rounded-md mx-auto"
                            alt="Resource Hub">
                    </div>
                    <div class="w-full lg:w-1/2">
                        <div class="feature-text p-4" data-aos="fade-right">
                            <h1 class="text-5xl font-Overpass mb-10">Resource Hub</h1>
                            <p>Explore a curated collection of educational resources designed to support vulnerable
                                students. Our Resource Hub offers a range of materials, including STEM and IT-related
                                courses, to empower and guide students in their educational journey.</p>
                            <a
                                href="{{ route('resourcehub') }}"class="mt-4 btn bg-Second text-white hover:text-Second hover:bg-white hover:border-Second">Explore
                                More</a>
                        </div>
                    </div>
                </div>

                <div id="support-directory" class="feature mb-20 flex flex-col lg:flex-row-reverse">
                    <div class="w-full lg:w-1/2 flex items-center justify-center p-3" data-aos="fade-right">
                        <img src="{{ asset('images/navigation.png') }}" class="w-[30rem] rounded-md"
                            alt="Support Service Directory">
                    </div>
                    <div class="w-full lg:w-1/2">
                        <div class="feature-text p-4" data-aos="fade-left">
                            <h1 class="text-5xl font-Overpass mb-10">Support Service Directory</h1>
                            <p>Access essential support services tailored for tertiary education, including tutoring and
                                counseling. Our Support Service Directory provides comprehensive resources to help students
                                find the support they need, including financial assistance, youth and adult services,
                                resources for individuals with disabilities, and education-related support.</p>
                            <a href="{{ route('support.index') }}"
                                class="mt-4 btn bg-Second text-white hover:text-Second hover:bg-white hover:border-Second">Explore
                                More</a>
                        </div>
                    </div>
                </div>

                <div id="education-pathways" class="feature mb-20 flex flex-col lg:flex-row">
                    <div class="w-full lg:w-1/2 flex items-center justify-center p-3" data-aos="fade-left">
                        <img src="{{ asset('images/guidepost.png') }}" class="w-[30rem] rounded-md "
                            alt="Personalized Education Pathways">
                    </div>
                    <div class="w-full lg:w-1/2">
                        <div class="feature-text p-4" data-aos="fade-right">
                            <h1 class="text-5xl font-Overpass mb-10">Personalized Education Pathways</h1>
                            <p>Discover personalized learning pathways that cater to the unique needs and goals of students.
                                Our platform offers tailored quizzes to help identify the most suitable courses and learning
                                options. Additionally, we provide specialized IT pathways to support students in building
                                technical skills and advancing their careers in the digital age.</p>
                            <a href="{{ route('pathways') }}"
                                class="mt-4 btn bg-Second text-white hover:text-Second hover:bg-white hover:border-Second">Explore
                                More</a>
                        </div>
                    </div>
                </div>

                <div id="financial-aid" class="feature mb-23 flex flex-col lg:flex-row-reverse">
                    <div class="w-full lg:w-1/2 flex items-center justify-center p-3" data-aos="fade-right">
                        <img src="{{ asset('images/scholarship.png') }}" class="w-[30rem] rounded-md"
                            alt="Financial Aid & Scholarship Portal">
                    </div>
                    <div class="w-full lg:w-1/2">
                        <div class="feature-text p-4" data-aos="fade-left">
                            <h1 class="text-5xl font-Overpass mb-10">Scholarship Portal</h1>
                            <p>Navigate a comprehensive portal for financial aid and scholarships. Discover opportunities
                                for grants, bursaries, and loans tailored to support students from diverse backgrounds. The
                                portal provides guidance on applying for scholarships, managing educational expenses, and
                                accessing resources for different levels of need. This includes assistance programs for
                                first-generation students, international students, and those pursuing specific fields of
                                study.</p>
                            <a href="{{ route('home') }}"
                                class="mt-4 btn bg-Second text-white hover:text-Second hover:bg-white hover:border-Second">Explore
                                More</a>
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
