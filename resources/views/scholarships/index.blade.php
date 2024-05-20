@extends('layout.layout')

@section('title', 'BridgeEd - Scholarships')

@section('content')
    <h1 class="text-2xl sm:text-3xl md:text-5xl font-Fredoka text-Second text-center mt-20 sm:mt-40 md:mt-36 mb-2 ">Find Your
        Scholarships</h1>
    <p class="text-lg text-center">Discover opportunities with our Scholarship Portal, connecting you to scholarships offered
        by universities in Victoria.</p>
    <div class="divider"></div>
    <div class="container mx-auto px-4 mt-12 max-w-[1280px]" x-data="{ showFilters: {{ session('showFilters', 'false') }} }" x-init="$watch('showFilters', value => sessionStorage.setItem('showFilters', value))">
        <button @click="showFilters = !showFilters" class="bg-Second text-white px-4 py-2 rounded mb-4 flex items-center">
            <span x-show="!showFilters" class="mr-2"><i class="fas fa-filter"></i> Show Filters</span>
            <span x-show="showFilters" class="mr-2"><i class="fas fa-times"></i> Hide Filters</span>
        </button>
        <div x-show="showFilters" class="mb-4 flex flex-col space-y-4">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <!-- Filter by Provider -->
                <form action="{{ route('scholarships.index') }}" method="GET" class="flex items-center mb-2 md:mb-0">
                    @csrf
                    <label for="provider" class="font-Fredoka mb-2 mr-2 text-Second">Filter by Provider:</label>
                    <select id="provider" name="provider"
                        class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:border-blue-500"
                        onchange="this.form.submit()">
                        <option value="">All Providers</option>
                        @foreach ($providers as $provider)
                            <option value="{{ $provider }}" {{ request('provider') == $provider ? 'selected' : '' }}>
                                {{ $provider }}
                            </option>
                        @endforeach
                    </select>
                    <!-- Hidden inputs for maintaining other filter states -->
                    <input type="hidden" name="international" value="{{ request('international') }}">
                    <input type="hidden" name="gender" value="{{ request('gender') }}">
                    <input type="hidden" name="amount_min" value="{{ request('amount_min') }}">
                    <input type="hidden" name="amount_max" value="{{ request('amount_max') }}">
                </form>
                <!-- Filter by International Student -->
                <form action="{{ route('scholarships.index') }}" method="GET" class="flex items-center mb-2 md:mb-0">
                    @csrf
                    <label for="international" class="font-Fredoka mb-2 mr-2 text-Second">International Student:</label>
                    <select id="international" name="international"
                        class="block py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:border-blue-500"
                        onchange="this.form.submit()">
                        <option value="">All</option>
                        <option value="1" {{ request('international') == '1' ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ request('international') == '0' ? 'selected' : '' }}>No</option>
                    </select>
                    <!-- Hidden inputs for maintaining other filter states -->
                    <input type="hidden" name="provider" value="{{ request('provider') }}">
                    <input type="hidden" name="gender" value="{{ request('gender') }}">
                    <input type="hidden" name="amount_min" value="{{ request('amount_min') }}">
                    <input type="hidden" name="amount_max" value="{{ request('amount_max') }}">
                </form>
                <!-- Filter by Gender -->
                <form action="{{ route('scholarships.index') }}" method="GET" class="flex items-center mb-2 md:mb-0">
                    @csrf
                    <label for="gender" class="font-Fredoka mb-2 mr-2 text-Second">Gender:</label>
                    <select id="gender" name="gender"
                        class="block py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:border-blue-500"
                        onchange="this.form.submit()">
                        <option value="">All</option>
                        <option value="Female" {{ request('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Co-Ed" {{ request('gender') == 'Co-Ed' ? 'selected' : '' }}>Others</option>
                    </select>
                    <!-- Hidden inputs for maintaining other filter states -->
                    <input type="hidden" name="provider" value="{{ request('provider') }}">
                    <input type="hidden" name="international" value="{{ request('international') }}">
                    <input type="hidden" name="amount_min" value="{{ request('amount_min') }}">
                    <input type="hidden" name="amount_max" value="{{ request('amount_max') }}">
                </form>
                <!-- Sort links (not forms, but ensure consistency if needed) -->
                <div class="flex items-center">
                    <a href="{{ route('scholarships.index', ['sort' => 'provider'] + request()->except('sort')) }}"
                        class="text-Second hover:text-blue-700 ml-0 md:ml-4">
                        Sort by Provider <i class="fas fa-sort-alpha-down ml-1"></i>
                    </a>
                </div>
            </div>
            <!-- Amount filter slider -->
            <form action="{{ route('scholarships.index') }}" method="GET" class="flex items-center mb-4">
                @csrf
                <label for="amount-range" class="font-Fredoka mb-2 mr-2 text-Second">Filter by Amount:</label>
                <div id="amount-range" class="w-full"></div>
                <input type="hidden" id="amount_min" name="amount_min"
                    value="{{ request('amount_min', $amountRange->min_amount) }}">
                <input type="hidden" id="amount_max" name="amount_max"
                    value="{{ request('amount_max', $amountRange->max_amount) }}">
                <!-- Include other filters as hidden fields -->
                <input type="hidden" name="provider" value="{{ request('provider') }}">
                <input type="hidden" name="international" value="{{ request('international') }}">
                <input type="hidden" name="gender" value="{{ request('gender') }}">
                <button type="submit" class="ml-4 px-4 py-2 bg-Second text-white rounded">Apply</button>
            </form>
        </div>
    </div>

<!-- Scholarship listings -->
<div id="scholarshipsList" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 max-w-[1280px] mx-auto">
    @foreach ($scholarships as $scholarship)
        <div class="bg-white shadow-md rounded-lg overflow-hidden flex flex-col" data-provider="{{ strtolower($scholarship->provider) }}">
            <div class="p-4 flex justify-center items-center bg-gray-100 h-60 w-60 mx-auto">
                <div class="h-full w-full flex items-center justify-center">
                    @include('components.scholarship-logo', [
                        'provider' => strtolower($scholarship->provider),
                    ])
                </div>
            </div>
            <div class="flex-1 p-4 flex flex-col justify-between ">
                <div>
                    <p class="text-sm font-medium text-Second">
                        {{ $scholarship->provider }}
                    </p>
                    <a href="{{ route('scholarships.show', $scholarship->id) }}" class="block mt-1">
                        <p class="text-lg font-semibold text-gray-900">{{ $scholarship->title }}</p>
                    </a>
                    <ul class="mt-2 text-sm text-gray-500 space-y-1">
                        <li><strong>Amount:</strong> {{ $scholarship->amount ? '$' . $scholarship->amount : 'Not available' }}</li>
                        <li><strong>Gender:</strong> {{ $scholarship->gender ? $scholarship->gender : 'Not available' }}</li>
                        <li><strong>Closing Date:</strong> {{ $scholarship->closing_date ? $scholarship->closing_date : 'Not available' }}</li>
                        <li><strong>Student Type:</strong> {{ $scholarship->student_type ? $scholarship->student_type : 'Not available' }}</li>
                    </ul>
                </div>
                <div class="mt-4 text-center">
                    <a href="{{ route('scholarships.show', $scholarship->id) }}" class="text-white bg-Second hover:bg-blue-700 rounded px-3 py-2 text-sm">View scholarship</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

    <!-- Pagination -->
    <div class="mt-4 mb-4 max-w-[1280px] mx-auto">
        {{ $scholarships->links() }}
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.js"></script>
    <script>
        var amountRange = document.getElementById('amount-range');
        noUiSlider.create(amountRange, {
            start: [{{ request('amount_min', $amountRange->min_amount) }},
                {{ request('amount_max', $amountRange->max_amount) }}
            ],
            connect: true,
            range: {
                'min': {{ $amountRange->min_amount }},
                'max': {{ $amountRange->max_amount }}
            },
            tooltips: [true, true],
            format: {
                to: function(value) {
                    return '$' + parseInt(value);
                },
                from: function(value) {
                    return Number(value.replace('$', ''));
                }
            }
        });

        amountRange.noUiSlider.on('update', function(values, handle) {
            document.getElementById('amount_min').value = values[0].replace('$', '');
            document.getElementById('amount_max').value = values[1].replace('$', '');
        });

        // Restore showFilters state from sessionStorage
        document.addEventListener('DOMContentLoaded', function() {
            const showFilters = sessionStorage.getItem('showFilters') === 'true';
            if (showFilters) {
                document.querySelector('[x-data]').__x.$data.showFilters = true;
            }
        });
    </script>
@endsection
