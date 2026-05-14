@if ($paginator->hasPages())
    <!-- Pagination -->
    <div class="pull-right pagination">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())  
            @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">«</span>
                    <span class="sr-only">Trang trước</span>
                </a>
            </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                        <li class="page-item active"><a class="page-link" href="javascript:void(0)">{{ $page }}</a></li>
                        @elseif (($page == $paginator->currentPage() - 1||$page == $paginator->currentPage() + 1) || $page == $paginator->lastPage())
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @elseif ($page == $paginator->currentPage() + 2 || $page == $paginator->currentPage() -2)
                            <li class="disabled page-item"><a class="page-link" href="javascript:void(0)"><i class="fa fa-ellipsis-h"></i></a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                    <span aria-hidden="true">»</span>
                    <span class="sr-only">Trang sau</span>
                </a>
            </li>
            @else
              
            @endif
        </ul>
    </div>
    <!-- Pagination -->
@endif
{{-- <ul class="pagination">
    <li class="page-item">
        <a class="page-link" href="javascript:void(0)" aria-label="Previous">
            <span aria-hidden="true">«</span>
            <span class="sr-only">Previous</span>
        </a>
    </li> --}}
   
    {{-- <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
    <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
    <li class="page-item">
        <a class="page-link" href="javascript:void(0)" aria-label="Next">
            <span aria-hidden="true">»</span>
            <span class="sr-only">Next</span>
        </a>
    </li>
</ul> --}}
