@if ($paginator->hasPages())

    <nav class="pagination m-0 is-centered" role="navigation" aria-label="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="pagination-previous" disabled aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span aria-hidden="true">&lsaquo;</span>
            </a>
        @else
            <a class="pagination-previous" href="{{ $paginator->previousPageUrl() }}"
               rel="prev"
               aria-label="@lang('pagination.previous')"
            >
                &lsaquo;
            </a>
        @endif
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="pagination-next" rel="next" aria-label="@lang('pagination.next')">
                &rsaquo;
            </a>
        @else
            <a class="pagination-next" disabled aria-disabled="true" aria-label="@lang('pagination.next')">
                <span aria-hidden="true">
                    &rsaquo;
                </span>
            </a>
        @endif
        <ul class="pagination-list">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li>
                            <span class="pagination-ellipsis">{{ $element }}</span>
                        </li>
                    @endif
                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li>
                                    <a class="pagination-link is-current" aria-label="{{ $page }}" aria-current="page">
                                        {{ $page }}
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $url }}" class="pagination-link" aria-label="Goto page {{ $page }}">
                                        {{ $page }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endif
            @endforeach
        </ul>
    </nav>
@endif
