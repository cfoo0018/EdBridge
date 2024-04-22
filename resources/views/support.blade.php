@extends('layout.layout')
@section('title', 'Support')
@section('content')
    <div class="relative" style="margin-left: 10%; margin-right: 10%;">
        <div class="md:flex-row md:space-y-0 md:space-x-2 flex items-center justify-between">
            <div class="inline-block text-left">
                <div>
                    <button type="button" id="dropdown-btn" class="inline-flex justify-center w-40 rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100" aria-expanded="true" aria-haspopup="true">
                        Select support
                        <!-- Heroicon name: solid/chevron-down -->
                        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

                <div id="dropdown-menu" class="origin-top-right absolute mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                    <div class="py-1" role="none">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem" id="financial-support">Financial Support</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem" id="lgbtq-support">LGBTQ Support</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem" id="migrant-support">Migrant</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem" id="refugees-support">Refugees Support</a>
                    </div>
                </div>
            </div>

            <div class="ml-auto">
                <div class="flex items-center" style="margin-right: 10%;">
                    <input type="text" class="px-4 py-2 border border-gray-300 rounded-l-md focus:ring-indigo-500 focus:border-indigo-500 w-72 md:w-96" placeholder="What support are you looking for?">
                    <button type="button" id="search-btn" class="bg-blue-500 text-white px-4 py-2 rounded-r-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        Search
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const dropdownBtn = document.getElementById('dropdown-btn');
        const dropdownMenu = document.getElementById('dropdown-menu');
        const financialSupport = document.getElementById('financial-support');
        const lgbtqSupport = document.getElementById('lgbtq-support');
        const migrantSupport = document.getElementById('migrant-support');
        const refugeesSupport = document.getElementById('refugees-support');

        dropdownBtn.addEventListener('click', function() {
            dropdownMenu.classList.toggle('hidden');
        });

        financialSupport.addEventListener('click', function() {
            dropdownMenu.classList.add('hidden');
        });

        lgbtqSupport.addEventListener('click', function() {
            dropdownMenu.classList.add('hidden');
        });

        migrantSupport.addEventListener('click', function() {
            dropdownMenu.classList.add('hidden');
        });

        refugeesSupport.addEventListener('click', function() {
            dropdownMenu.classList.add('hidden');
        });
    </script>
@endsection
