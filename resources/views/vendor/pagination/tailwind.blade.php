@if ($paginator->hasPages())
<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}">
<div>
    <p>
    {!! __('Showing') !!}
    @if ($paginator->firstItem())
        {{ $paginator->firstItem() }}
        {!! __('to') !!}
        {{ $paginator->lastItem() }}
    @else
        {{ $paginator->count() }}
    @endif
    {!! __('of') !!}
    {{ $paginator->total() }}
    {!! __('results') !!}
    </p>
</div>
<div>
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <span class="button" aria-disabled="true">
            {!! __('pagination.previous') !!}
        </span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="button">
            {!! __('pagination.previous') !!}
        </a>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <span class="button" aria-disabled="true">{{ $element }}</span>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span aria-current="page">
                        <span class="button" aria-disabled="true">{{ $page }}</span>
                    </span>
                @else
                    <a href="{{ $url }}" class="button" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                        {{ $page }}
                    </a>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="button">
            {!! __('pagination.next') !!}
        </a>
    @else
        <span class="button" aria-disabled="true">
            {!! __('pagination.next') !!}
        </span>
    @endif
</div>
</nav>
@endif
<!-- vi: set filetype=php: -->
