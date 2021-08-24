@if ($paginator->hasPages())
    <div class="pull-right pagination d-flex justify-content-sm-end align-item-center justify-content-center">
        <ul class="pagination">
            <li class="page-item">
                <a href="{{ $paginator->previousPageUrl() }}">
                    <span class="previous next-link page-link"><i class="fas fa-long-arrow-alt-left"></i></span>
                </a>
            </li>

            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <span class="page-link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            <li class="page-item">
                <a href="{{ $paginator->nextPageUrl() }}">
                    <span class="next-link next page-link">
                        <i class="fas fa-long-arrow-alt-right"></i>
                    </span>
                </a>
            </li>
        </ul>
    </div>
@endif
