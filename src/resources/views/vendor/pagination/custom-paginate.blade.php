@if ($paginator->hasPages())
    <nav>



{{--            <div>--}}
{{--                <p class="small text-muted">--}}
{{--                    {!! __('Showing') !!}--}}
{{--                    <span class="fw-semibold">{{ $paginator->firstItem() }}</span>--}}
{{--                    {!! __('to') !!}--}}
{{--                    <span class="fw-semibold">{{ $paginator->lastItem() }}</span>--}}
{{--                    {!! __('of') !!}--}}
{{--                    <span class="fw-semibold">{{ $paginator->total() }}</span>--}}
{{--                    {!! __('results') !!}--}}
{{--                </p>--}}
{{--            </div>--}}


            <ul class="rbt-pagination pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="disabled"><a href="#" aria-label="Previous"><i class="feather-chevron-left"></i></a></li>
                @else
                    <li><a href="{{ $paginator->previousPageUrl() }}" aria-label="Previous"><i class="feather-chevron-left"></i></a></li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="active"><a href="#">{{ $page }}</a></li>
                            @else
                                <li class=""><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li><a href="{{ $paginator->nextPageUrl() }}" aria-label="Next"><i class="feather-chevron-right"></i></a></li>
                @else
                    <li class="disabled"><a href="" aria-label="Next"><i class="feather-chevron-right"></i></a></li>
                @endif
            </ul>


    </nav>
@endif
