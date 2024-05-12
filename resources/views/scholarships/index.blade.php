@extends('layout.layout')
@section('title', 'BridgeEd - Scholarships')

@section('content')
    <div class="container mx-auto px-4 mt-40">
        <h1 class="text-3xl md:text-4xl font-bold font-fredoka text-Second text-center">Find Your Scholarships</h1>
        <ul>
            @foreach ($scholarships as $scholarship)
                <li class="mb-4 p-4 bg-white shadow-lg rounded flex items-start">
                    <div class="w-1/3">
                        <div class="image-wrapper">
                            @if (strtolower($scholarship->provider) == 'monash university')
                                <img src="{{ asset('images/monash.png') }}" alt="Monash University"
                                    class="h-full w-auto object-contain">
                            @elseif(strtolower($scholarship->provider) == 'The University of Melbourne' ||
                                    strtolower($scholarship->provider) == 'the university of melbourne')
                                <img src="{{ asset('images/uniMelb.png') }}" alt="The University of Melbourne"
                                    class="h-full w-auto object-contain">
                            @elseif(strtolower($scholarship->provider) == 'la trobe university' || strtolower($scholarship->provider) == 'latrobe')
                                <img src="{{ asset('images/latrobe.png') }}" alt="La Trobe University"
                                    class="h-full w-auto object-contain">
                            @elseif(strtolower($scholarship->provider) == 'rmit university' || strtolower($scholarship->provider) == 'rmit')
                                <img src="{{ asset('images/RMIT.avif') }}" alt="RMIT University"
                                    class="h-full w-auto object-contain">
                            @elseif(strtolower($scholarship->provider) == 'Swinburne University of Technology' ||
                                    strtolower($scholarship->provider) == 'swinburne university of technology')
                                <img src="{{ asset('images/swinburne.svg') }}" alt="Swinburne University of Technology"
                                    class="h-full w-auto object-contain">
                            @elseif(strtolower($scholarship->provider) == 'CQUniversity Australia' ||
                                    strtolower($scholarship->provider) == 'cquniversity australia')
                                <img src="{{ asset('images/cqu.png') }}" alt="CQUniversity Australia"
                                    class="h-full w-auto object-contain">
                            @elseif(strtolower($scholarship->provider) == 'Holmesglen Institute' ||
                                    strtolower($scholarship->provider) == 'holmesglen institute')
                                <img src="{{ asset('images/holmesglen.png') }}" alt="Holmesglen Institute"
                                    class="h-full w-auto object-contain">
                            @elseif(strtolower($scholarship->provider) == 'Deakin University' ||
                                    strtolower($scholarship->provider) == 'deakin university')
                                <img src="{{ asset('images/deakin.jpeg') }}" alt="Deakin University"
                                    class="h-full w-auto object-contain">
                            @elseif(strtolower($scholarship->provider) == 'Australian Women Graduates' ||
                                    strtolower($scholarship->provider) == 'australian women graduates')
                                <img src="{{ asset('images/gwv.png') }}" alt="Australian Women Graduates"
                                    class="h-full w-auto object-contain">
                            @elseif(strtolower($scholarship->provider) == 'Victoria University (VU)' ||
                                    strtolower($scholarship->provider) == 'victoria university (vu)')
                                <img src="{{ asset('images/vic.png') }}" alt="Victoria University (VU)"
                                    class="h-full w-auto object-contain">
                            @elseif(strtolower($scholarship->provider) == 'Kangan Institute, TAFE VIC' ||
                                    strtolower($scholarship->provider) == 'kangan institute, tafe vic')
                                <img src="{{ asset('images/kangan.jpeg') }}" alt="RMIT University"
                                    class="h-full w-auto object-contain">
                            @endif
                        </div>
                    </div>
                    <!-- Scholarship details -->
                    <div class="flex-1 pl-4">
                        <div class="mb-2">
                            <h3 class="text-lg font-bold text-Second hover:text-blue-700">{{ $scholarship->title }}</h3>
                            <span class="text-gray-600">{{ $scholarship->provider }}</span>
                        </div>
                        <div class="mb-4">
                            <ul class="space-y-1">
                                <li><strong>Amount: </strong><span>${{ $scholarship->amount }}</span></li>
                                <li><strong>Gender: </strong><span>{{ $scholarship->gender }}</span></li>
                                <li><strong>Closing Date: </strong><span>{{ $scholarship->closing_date }}</span></li>
                                <li><strong>Student Type: </strong><span>{{ $scholarship->student_type }}</span></li>
                            </ul>
                        </div>
                        <div class="flex items-center justify-between">
                            <a href="{{ route('scholarships.show', $scholarship->id) }}"
                                class="text-white bg-Second hover:bg-blue-700 rounded px-4 py-2">View scholarship</a>
                            <div class="lg:hidden w-24 h-24">
                                <img src="{{ asset('images/monash.avif') }}" alt="Monash University"
                                    class="object-cover w-full h-full">
                            </div>
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
