<!-- Header Section -->
<header class="">
    <!-- Hamburger Menu Icon (Visible on small screens) -->
    <div class="md:hidden flex items-center">
        <button id="hamburgerBtn" class="text-white focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>

    <!-- Navigation Links (Hidden on small screens, visible on medium and larger screens) -->
    <div class="flex justify-center items-center static h-fit">
        <div class="z-50 px-4 flex fixed top-8 self-center backdrop-blur-sm bg-Button/50 rounded-full">
            <nav class="flex self-center space-x-4 text-white font-Fredoka py-4">
                <a href="/" class="hover:backdrop-blur-none hover:bg-Button rounded-3xl px-4 py-1">Home</a>
                <a href="#" class="hover:backdrop-blur-none hover:bg-Button rounded-3xl px-4 py-1">Resource Hub</a>
                <a href="#" class="hover:backdrop-blur-none hover:bg-Button rounded-full px-4 py-1">Support</a>
                <a href="#" class="hover:backdrop-blur-none hover:bg-Button rounded-full px-4 py-1">Pathways</a>
                <a href="#" class="hover:backdrop-blur-none hover:bg-Button rounded-full px-4 py-1">Accessibility</a>
                <a href="#" class="hover:backdrop-blur-none hover:bg-Button rounded-full px-4 py-1">Financial Aid</a>
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
            <a href="/" class="glow-effect block text-Primary text-xl hover:text-gray-300 my-4">UV Check</a>
            <a href="/" class="glow-effect block text-Primary text-xl hover:text-gray-300 my-4">Safety Guide</a>
            <a href="/" class="glow-effect block text-Primary text-xl hover:text-gray-300 my-4">Reminder</a>
        </nav>
    </div>
</div>