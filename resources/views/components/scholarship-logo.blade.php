@props(['provider'])

<div class="">
    @switch($provider)
        @case('monash university')
            <img src="{{ asset('images/monash.png') }}" alt="Monash University" class="h-full w-auto object-contain">
            @break

        @case('the university of melbourne')
        @case('unimelb')
            <img src="{{ asset('images/uniMelb.png') }}" alt="The University of Melbourne" class="h-full w-auto object-contain">
            @break

        @case('la trobe university')
        @case('latrobe')
            <img src="{{ asset('images/latrobe.png') }}" alt="La Trobe University" class="h-full w-auto object-contain">
            @break

        @case('rmit university')
        @case('rmit')
            <img src="{{ asset('images/rmit.png') }}" alt="RMIT University" class="h-full w-auto object-contain">
            @break

        @case('swinburne university of technology')
        @case('swinburne')
            <img src="{{ asset('images/swinburne.svg') }}" alt="Swinburne University of Technology" class="h-full w-auto object-contain">
            @break

        @case('cquniversity australia')
        @case('cqu')
            <img src="{{ asset('images/cqu.png') }}" alt="CQUniversity Australia" class="h-full w-auto object-contain">
            @break

        @case('holmesglen institute')
            <img src="{{ asset('images/holmesglen.png') }}" alt="Holmesglen Institute" class="h-full w-auto object-contain">
            @break

        @case('deakin university')
            <img src="{{ asset('images/deakin.jpeg') }}" alt="Deakin University" class="h-full w-auto object-contain">
            @break

        @case('australian women graduates')
            <img src="{{ asset('images/gwv.png') }}" alt="Australian Women Graduates" class="h-full w-auto object-contain">
            @break

        @case('victoria university (vu)')
        @case('vu')
            <img src="{{ asset('images/vic.png') }}" alt="Victoria University" class="h-full w-auto object-contain">
            @break

        @case('kangan institute, tafe vic')
            <img src="{{ asset('images/kangan.jpeg') }}" alt="Kangan Institute" class="h-full w-auto object-contain">
            @break

        @default
            <span class="text-sm text-gray-500">No logo available</span>
    @endswitch
</div>
