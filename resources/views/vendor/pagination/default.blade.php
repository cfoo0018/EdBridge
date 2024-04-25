<div class="join">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <span class="join-item btn" aria-disabled="true">Previous</span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="join-item btn">Previous</a>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <span class="join-item btn" aria-disabled="true">{{ $element }}</span>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="join-item btn btn-active" aria-current="page">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="join-item btn">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="join-item btn">Next</a>
    @else
        <span class="join-item btn" aria-disabled="true">Next</span>
    @endif
</div>
