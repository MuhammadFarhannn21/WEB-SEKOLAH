@if ($paginator->hasPages())
<div style="display:flex; justify-content:center; align-items:center; gap:5px; flex-wrap:wrap; margin-top:24px;">

    {{-- Prev --}}
    @if ($paginator->onFirstPage())
    <span style="width:30px; height:30px; border-radius:6px; background:#f5f5f5; color:#ccc; display:flex; align-items:center; justify-content:center; font-size:12px; cursor:not-allowed;">
        <i class="fa fa-angle-left"></i>
    </span>
    @else
    <a href="{{ $paginator->previousPageUrl() }}"
        style="width:30px; height:30px; border-radius:6px; background:#fff; color:#1a2e5a; display:flex; align-items:center; justify-content:center; font-size:12px; text-decoration:none; border:1px solid #e0e0e0; transition:all 0.2s;"
        onmouseover="this.style.background='#1a2e5a'; this.style.color='#fff'"
        onmouseout="this.style.background='#fff'; this.style.color='#1a2e5a'">
        <i class="fa fa-angle-left"></i>
    </a>
    @endif

    {{-- Nomor --}}
    @foreach ($elements as $element)
        @if (is_string($element))
        <span style="width:30px; height:30px; border-radius:6px; background:#fff; color:#999; display:flex; align-items:center; justify-content:center; font-size:12px; border:1px solid #e0e0e0;">...</span>
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <span style="width:30px; height:30px; border-radius:6px; background:#1a2e5a; color:#fff; display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:700;">
                    {{ $page }}
                </span>
                @else
                <a href="{{ $url }}"
                    style="width:30px; height:30px; border-radius:6px; background:#fff; color:#555; display:flex; align-items:center; justify-content:center; font-size:12px; text-decoration:none; border:1px solid #e0e0e0; transition:all 0.2s;"
                    onmouseover="this.style.background='#1a73e8'; this.style.color='#fff'; this.style.borderColor='#1a73e8'"
                    onmouseout="this.style.background='#fff'; this.style.color='#555'; this.style.borderColor='#e0e0e0'">
                    {{ $page }}
                </a>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next --}}
    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}"
        style="width:30px; height:30px; border-radius:6px; background:#fff; color:#1a2e5a; display:flex; align-items:center; justify-content:center; font-size:12px; text-decoration:none; border:1px solid #e0e0e0; transition:all 0.2s;"
        onmouseover="this.style.background='#1a2e5a'; this.style.color='#fff'"
        onmouseout="this.style.background='#fff'; this.style.color='#1a2e5a'">
        <i class="fa fa-angle-right"></i>
    </a>
    @else
    <span style="width:30px; height:30px; border-radius:6px; background:#f5f5f5; color:#ccc; display:flex; align-items:center; justify-content:center; font-size:12px; cursor:not-allowed;">
        <i class="fa fa-angle-right"></i>
    </span>
    @endif

</div>
@endif