@if ($paginator->hasPages())
    <nav class="tg-pagination">
        <ul >
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class=" disabled" aria-label="@lang('pagination.previous')">
                    <a href="javascript:void(0);">
                    <span class="" aria-hidden="true">&lsaquo;</span>
                    </a>
                </li>
            @else
                <li class="">
                    <a class="" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class=" disabled"><span class="">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class=" tg-active"><a href="javascript:void(0);">{{ $page }}</a></li>
                        @else
                            <li class=""><a class="" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="">
                    <a class="" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class=" disabled" aria-label="@lang('pagination.next')">
                    <a href="javascript:void(0);">
                        <span class="" aria-hidden="true">&rsaquo;</span>
                    </a>
                </li>
            @endif
        </ul>
    </nav>

@else
    <nav class="tg-pagination">
        <ul>
            <li class="tg-active"><a href="javascript:void(0);">1</a></li>
        </ul>
    </nav>
@endif
