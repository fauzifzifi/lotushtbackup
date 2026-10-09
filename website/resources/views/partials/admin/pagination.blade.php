@if ($paginator->hasPages())
<nav class="pager" aria-label="Navigasi halaman">
  @if ($paginator->onFirstPage())
    <span class="pager-btn is-disabled">
      <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><path d="m15 18-6-6 6-6"/></svg> Sebelumnya
    </span>
  @else
    <a href="{{ $paginator->previousPageUrl() }}" class="pager-btn" rel="prev">
      <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><path d="m15 18-6-6 6-6"/></svg> Sebelumnya
    </a>
  @endif

  @foreach ($elements as $element)
    @if (is_string($element))
      <span class="pager-titik">{{ $element }}</span>
    @endif

    @if (is_array($element))
      @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
          <span class="pager-num is-active" aria-current="page">{{ $page }}</span>
        @else
          <a href="{{ $url }}" class="pager-num">{{ $page }}</a>
        @endif
      @endforeach
    @endif
  @endforeach

  @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}" class="pager-btn" rel="next">
      Berikutnya <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg>
    </a>
  @else
    <span class="pager-btn is-disabled">
      Berikutnya <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg>
    </span>
  @endif
</nav>
@endif 