<div class="has-background-white p-3">
    @if ($paginator->hasPages())
        <nav class="pagination is-centered" role="navigation" aria-label="pagination">
            <span>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span class="pagination-previous" disabled>
                        السابق
                    </span>
                @else
                    <a wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="pagination-previous">
                        السابق
                    </a>
                @endif
            </span>

            <span>
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="pagination-next">
                        التالي
                    </a>
                @else
                    <span class="pagination-next" disabled>
                        التالي
                    </span>
                @endif
            </span>

            <ul class="pagination-list mt-0">
                @foreach($elements as $element)
                    @if(is_string($element))
                        <li>
                            <a class="pagination-ellipsis">
                                {{ $element }}
                            </a>
                        </li>
                    @endif

                    @if(is_array($element))
                        @foreach($element as $page=>$url)
                           @if($page == $paginator->currentPage())
                                <li class="mt-0" wire:key="paginator-page-{{$page}}">
                                    <span class="pagination-link is-current">
                                        {{ $page }}
                                    </span>
                                </li>
                            @else
                                <li class="mt-0"  wire:key="paginator-page-{{$page}}">
                                    <a class="pagination-link"
                                       wire:click="gotoPage('{{ $page }}')"
                                    >
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
</div>
