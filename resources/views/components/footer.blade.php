<footer class="bg-base-200 text-Second font-Fredoka p-10 sm:text-center">
    <div class="container mx-auto flex flex-wrap justify-between sm:justify-center items-start sm:items-center text-center">

        <!-- Brand and Motto -->
        <aside class="w-full lg:w-2/6 mb-6 lg:mb-0  lg:text-center sm:text-center">
            <a href="{{ route('home') }}" class="font-Overpass font-bold text-5xl">Bridge Ed</a>
            <p class="mt-4">Empower your journey.<br>Find Warm Support & Resources with us!</p>
        </aside>

        <!-- Footer Navigation -->
        <div class="flex flex-wrap justify-around w-full lg:w-3/6 text-center gap-4">
            <nav class="w-1/2 lg:w-auto mb-4 lg:mb-0">
                <h6 class="font-bold text-lg mb-2">Explore</h6>
                <ul>
                    <li><a href="{{ route('resourcehub') }}" class="link link-hover">Resource Hub</a></li>
                    <li><a href="{{ route('support.index') }}" class="link link-hover">Support Services</a></li>
                </ul>
            </nav>
            <nav class="w-1/2 lg:w-auto mb-4 lg:mb-0">
                <h6 class="font-bold text-lg mb-2">Resources</h6>
                <ul>
                    <li><a href="{{ route('scholarships.index') }}" class="link link-hover">Find Scholarships</a></li>
                    <li><a href="{{ route('pathways') }}" class="link link-hover">IT Pathways</a></li>
                </ul>
            </nav>
            <nav class="w-full lg:w-auto mb-4 lg:mb-0">
                <h6 class="font-bold text-lg mb-2">Contact Us</h6>
                <ul>
                    <li><a href="mailto:info@bridgeed.com" class="link link-hover">info@bridgeed.me</a></li>
                </ul>
            </nav>
        </div>

        <!-- Social Icons -->
        <div class="flex justify-center lg:justify-end w-full lg:w-1/6 mt-6 lg:mt-0">
            <a href="#" class="mx-2 text-Second hover:text-blue-700">
                <i class="fab fa-facebook-f fa-lg"></i>
            </a>
            <a href="#" class="mx-2 text-Second hover:text-blue-700">
                <i class="fab fa-twitter fa-lg"></i>
            </a>
            <a href="#" class="mx-2 text-Second hover:text-blue-700">
                <i class="fab fa-instagram fa-lg"></i>
            </a>
        </div>

    </div>

    <!-- Footer Copyright -->
    <div class="text-center mt-10">
        <p>© 2024 Bridge Ed. All rights reserved.</p>
    </div>
</footer>

<style>
    footer a.link-hover {
        transition: color 0.3s ease-in-out;
    }
    footer a.link-hover:hover {
        color: #3490dc;
    }
</style>
