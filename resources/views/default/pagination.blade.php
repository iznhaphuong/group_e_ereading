{{-- None limit link processing --}}
@if ($paginator->hasPages())

    <div class="my-5 d-flex justify-content-center ">
        <nav aria-label="Pagination">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if (!$paginator->onFirstPage())
                    <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"><i
                                class="fa-solid fa-angle-left"></i></a>
                    </li>
                @endif
                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item"><a class="page-link">{{ $element }}</a></li>
                    @endif
                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active"><a class="page-link">{{ $page }}</a></li>
                            @else
                                <li class="page-item"><a class="page-link"
                                        href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}"><i
                                class="fa-solid fa-angle-right"></i></a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@else
    <div class="my-5"></div>
@endif
