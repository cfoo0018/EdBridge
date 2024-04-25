<!-- Header Section -->
<header class="">
    <!-- Hamburger Menu Icon (Visible on small screens) -->
    <div class="md:hidden flex items-center justify-between fixed top-0 w-full h-16 px-4 bg-opacity-50 backdrop-blur-sm z-50 bg-Button/50">
        {{-- <div class="z-50 px-4 flex fixed self-center backdrop-blur-sm bg-Button/50 top-0 w-screen h-16"> --}}
        <span class="text-xl font-bold text-white font-Overpass">BridgeEd</span>
        <button id="hamburgerBtn" class="text-white focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-10 h-10">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" fill="none" stroke="currentColor" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>
    
    <!-- Navigation Links (Hidden on small screens, visible on medium and larger screens) -->
    <div class="hidden md:flex justify-center items-center static h-fit">
        <div class="z-50 px-4 flex fixed top-8 self-center backdrop-blur-sm bg-Button/50 rounded-full">
            <nav class="flex self-center space-x-4 text-white font-Fredoka py-4">
                <a href="{{ route('home') }}" class="{{ Route::is('home') ? 'bg-Button' : '' }} hover:backdrop-blur-none hover:bg-Button rounded-3xl px-4 py-1">Home</a>
                <a href="{{ route('resourcehub') }}" class="{{ Route::is('resourcehub') ? 'bg-Button' : '' }} hover:backdrop-blur-none hover:bg-Button rounded-3xl px-4 py-1">Resource Hub</a>
                <a href="{{ route('support.index') }}" class="{{ Route::is('support.index') ? 'bg-Button' : '' }} hover:backdrop-blur-none hover:bg-Button rounded-3xl px-4 py-1">Support</a>
                <a href="{{ route('pathways') }}" class="{{ Route::is('pathways') ? 'bg-Button' : '' }} hover:backdrop-blur-none hover:bg-Button rounded-3xl px-4 py-1">Pathways</a>
                {{-- <a href="#" class="hover:backdrop-blur-none hover:bg-Button rounded-3xl px-4 py-1">Accessibility</a>
                <a href="#" class="hover:backdrop-blur-none hover:bg-Button rounded-3xl px-4 py-1">Financial Aid</a>  --}}
            </nav>    
        </div>
    </div>
</header>

<!-- Mobile Navigation Menu (Initially hidden, shown when the hamburger menu is clicked) -->
<div id="mobileNav" class="hidden fixed inset-0 bg-black bg-opacity-25 z-50 glassmorphism-header font-Knewave">
    <div class="flex h-full w-full flex-col items-center justify-center">
        <!-- Close Button for Mobile Nav -->
        <div class="absolute top-0 right-0 p-4">
            <button id="closeMobileNav" class="text-white focus:outline-none">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <!-- Mobile Navigation Links -->
        <nav class="text-center">
            <a href="{{ route('home') }}" class="glow-effect block text-xl font-semibold hover:text-gray-300 my-5">Home</a>
            <a href="{{ route('resourcehub') }}" class="glow-effect block text-xl font-semibold hover:text-gray-300 my-5">Resource Hub</a>
            <a href="{{ route('support.index') }}"class="glow-effect block text-xl font-semibold hover:text-gray-300 my-5">Support</a>
            <a href="{{ route('pathways') }}" class="glow-effect block text-xl font-semibold hover:text-gray-300 my-5">Pathways</a>
            {{-- <a href="/" class="glow-effect block text-xl font-semibold hover:text-gray-300 my-5">Accessibility</a>
            <a href="/" class="glow-effect block text-xl font-semibold hover:text-gray-300 my-5">Financial Aid</a>  --}}
        </nav>
    </div>
</div>