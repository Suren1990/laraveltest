@if ($paginator->hasPages())
    <nav class="flex justify-center mt-8">
        <ul class="flex items-center space-x-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">Previous</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="px-4 py-2 text-blue-600 bg-white border border-blue-600 rounded-md hover:bg-blue-200 transition duration-200">Previous</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li><span class="px-4 py-2 text-gray-500">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span class="px-4 py-2 bg-blue-600 text-white rounded-md">{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="px-4 py-2 text-blue-600 bg-white border border-blue-600 rounded-md hover:bg-blue-200 transition duration-200">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="px-4 py-2 text-blue-600 bg-white border border-blue-600 rounded-md hover:bg-blue-200 transition duration-200">Next</a>
                </li>
            @else
                <li>
                    <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">Next</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
