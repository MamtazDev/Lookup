@if ($paginator->hasPages())
@foreach ($elements as $element)
@if (is_array($element))
        @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
        @endif
    @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
                <li class="active"><span>{{ $page }}</span></li>
        @else
                <li><a href="{{ $url }}">{{ $page }}</a></li>
        @endif
    @endforeach
@endif

@endforeach

@endif