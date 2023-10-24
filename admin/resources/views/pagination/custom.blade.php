@if ($paginator->hasPages())
<nav class="text-center" aria-label="Page navigation example">
    <ul class="pagination">

    @if ($paginator->onFirstPage())
        <li class="page-item">
            <a class="page-link" href="javascript:void(0)" aria-label="Previous">
                <span aria-hidden="true">«</span>
            </a>
        </li>
    @else
        <li class="page-item">
            <a class="page-link previous_page_url" href="javascript:void(0)" data-previous_page_url="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                <span aria-hidden="true">«</span>
            </a>
        </li>
    @endif

    @foreach ($elements as $element)
        @if (is_string($element))
            <li class="disabled">{{ $element }}</li>
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="page-item active" >
                        <a class="page-link" href="javascript:void(0)">{{ $page }}</a>
                    </li>
                @else
                    <li class="page-item" >
                        <a class="page-link element_page_url" href="javascript:void(0)" data-element_page_url="{{ $url }}">{{ $page }}</a>
                    </li>
                @endif
            @endforeach
        @endif
    @endforeach

    @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="page-link next_page_url" href="javascript:void(0)" data-next_page_url="{{ $paginator->nextPageUrl() }}" aria-label="next">
                <span aria-hidden="true">»</span>
            </a>
        </li>
    @else
        <li class="page-item">
            <a class="page-link" href="javascript:void(0)" aria-label="next">
                <span aria-hidden="true">»</span>
            </a>
        </li>
    @endif
    </ul>
  </nav>
  @endif