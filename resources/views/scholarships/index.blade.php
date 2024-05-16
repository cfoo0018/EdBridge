@extends('layout.layout')
@section('title', 'BridgeEd - Scholarships')

@section('content')
    <h1 class="text-2xl sm:text-3xl md:text-5xl font-Fredoka text-Second text-center mt-20 sm:mt-40 md:mt-36 mb-2">Find Your Scholarships</h1>
    <p class="text-lg text-center">Discover opportunities with our Scholarship Portal, connecting you to scholarships offered by universities in Victoria.</p>
    <div class="divider"></div>
    <div class="container mx-auto px-4 mt-12">
        <div class="mb-4 flex flex-col md:flex-row items-center justify-between">
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
            </form>
            <!-- Filter by international student -->
            <form action="{{ route('scholarships.index') }}" method="GET"
                class="flex items-center mb-2 md:mb-0 ml-0 md:ml-4">
                @csrf
                <label for="international" class="font-Fredoka mb-2 mr-2 text-Second">International Student:</label>
                <select id="international" name="international"
                    class="block py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:border-blue-500"
                    onchange="this.form.submit()">
                    <option value="">All</option>
                    <option value="1" {{ request('international') == '1' ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ request('international') == '0' ? 'selected' : '' }}>No</option>
                </select>
            </form>
            <!-- Sort by provider and amount -->
            <div class="flex items-center">
                <a href="{{ route('scholarships.index', ['sort' => 'provider']) }}"
                    class="text-Second hover:text-blue-700 ml-0 md:ml-4">
                    Sort by Provider <i class="fas fa-sort-alpha-down ml-1"></i>
                </a>
                {{-- <a href="{{ route('scholarships.index', ['sort' => 'amount']) }}"
                    class="text-Second hover:text-blue-700 ml-4">
                    Sort by Amount <i class="fas fa-sort-numeric-down ml-1"></i>
                </a> --}}
            </div>
        </div>
        <!-- Amount filter slider -->
        <form action="{{ route('scholarships.index') }}" method="GET" class="flex items-center mb-4">
            @csrf
            <label for="amount-range" class="font-Fredoka mb-2 mr-2 text-Second">Filter by Amount:</label>
            <div id="amount-range" class="w-full"></div>
            <input type="hidden" id="amount_min" name="amount_min" value="{{ request('amount_min', $amountRange->min_amount) }}">
            <input type="hidden" id="amount_max" name="amount_max" value="{{ request('amount_max', $amountRange->max_amount) }}">
            <button type="submit" class="ml-4 px-4 py-2 bg-Second text-white rounded">Apply</button>
        </form>
        <!-- Scholarship listings -->
        <ul id="scholarshipsList">
            @foreach ($scholarships as $scholarship)
                <li class="mb-4 p-4 bg-white shadow-lg rounded flex flex-col md:flex-row items-start scholarship-item"
                    data-provider="{{ strtolower($scholarship->provider) }}">
                    <div class="w-full md:w-1/3 p-4 flex justify-center items-center">
                        <div class="image-wrapper max-w-xs mx-auto">
                            @include('components.scholarship-logo', [
                                'provider' => strtolower($scholarship->provider),
                            ])
                        </div>
                    </div>
                    <!-- Scholarship details -->
                    <div class="flex-1 px-2 md:pl-4">
                        <div class="mb-2">
                            <h3 class="text-md sm:text-lg font-bold text-Second hover:text-blue-700">
                                {{ $scholarship->title }}</h3>
                            <span class="text-gray-600">{{ $scholarship->provider }}</span>
                        </div>
                        <div class="mb-4">
                            <ul class="space-y-1">
                                <li><strong>Amount: </strong>
                                    <span>{{ $scholarship->amount ? '$' . $scholarship->amount : 'Not available' }}</span>
                                </li>
                                <li><strong>Gender: </strong>
                                    <span>{{ $scholarship->gender ? $scholarship->gender : 'Not available' }}</span>
                                </li>
                                <li><strong>Closing Date: </strong>
                                    <span>{{ $scholarship->closing_date ? $scholarship->closing_date : 'Not available' }}</span>
                                </li>
                                <li><strong>Student Type: </strong>
                                    <span>{{ $scholarship->student_type ? $scholarship->student_type : 'Not available' }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="flex items-center justify-between">
                            <a href="{{ route('scholarships.show', $scholarship->id) }}"
                                class="text-white bg-Second hover:bg-blue-700 rounded px-4 py-2">View scholarship</a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        <!-- Pagination -->
        <div class="mt-4">
            {{ $scholarships->links() }}
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.js"></script>
<script>
    var amountRange = document.getElementById('amount-range');
    noUiSlider.create(amountRange, {
        start: [{{ request('amount_min', $amountRange->min_amount) }}, {{ request('amount_max', $amountRange->max_amount) }}],
        connect: true,
        range: {
            'min': {{ $amountRange->min_amount }},
            'max': {{ $amountRange->max_amount }}
        },
        tooltips: [true, true],
        format: {
            to: function (value) {
                return '$' + parseInt(value);
            },
            from: function (value) {
                return Number(value.replace('$', ''));
            }
        }
    });

    amountRange.noUiSlider.on('update', function (values, handle) {
        document.getElementById('amount_min').value = values[0].replace('$', '');
        document.getElementById('amount_max').value = values[1].replace('$', '');
    });
</script>
@endsection
