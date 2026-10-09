@php
    $menu = [
        ['label' => 'Dashboard',              'route' => 'admin.dashboard',  'pola' => 'admin.dashboard',
         'ikon' => '<rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/>'],
        ['label' => 'Dokumentasi Kegiatan',   'route' => 'admin.dokumentasi.index', 'pola' => 'admin.dokumentasi.*',
         'ikon' => '<path d="M12.5 22H18a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v9.5"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M13.378 15.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"/>'],
        ['label' => 'Data Guru',              'route' => 'admin.guru.index', 'pola' => 'admin.guru.*',
         'ikon' => '<path d="M16 2v2"/><path d="M7 22v-2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2"/><path d="M8 2v2"/><circle cx="12" cy="11" r="3"/><rect x="3" y="4" width="18" height="18" rx="2"/>'],
        ['label' => 'Data Ekstrakurikuler',   'route' => 'admin.ekskul.index', 'pola' => 'admin.ekskul.*',
         'ikon' => '<path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"/><path d="M22 10v6"/><path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"/>'],
        ['label' => 'Berita & Pengumuman',    'route' => 'admin.berita.index', 'pola' => 'admin.berita.*',
         'ikon' => '<path d="m3 11 18-5v12L3 14v-3z"/><path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"/>'],
        ['label' => 'Galeri',                 'route' => 'admin.galeri.index', 'pola' => 'admin.galeri.*',
         'ikon' => '<path d="M18 22H4a2 2 0 0 1-2-2V6"/><path d="m22 13-1.296-1.296a2.41 2.41 0 0 0-3.408 0L11 18"/><circle cx="12" cy="8" r="2"/><rect width="16" height="16" x="6" y="2" rx="2"/>'],
    ];
@endphp

<aside class="admin-sidebar" id="adminSidebar">
  <a href="{{ route('admin.dashboard') }}" class="side-brand">
    <img src="{{ asset('images/logo.png') }}" alt="Logo SMP Negeri 1 Loceret">
    <span>
      <strong>SMP NEGERI 1 LOCERET</strong>
      <small>Loceret, Nganjuk, Jawa Timur</small>
    </span>
  </a>

  <p class="side-label">Menu Navigasi</p>

  <nav class="side-nav">
    @foreach ($menu as $m)
      @php
          $aktif = request()->routeIs($m['pola']);
          $href  = \Illuminate\Support\Facades\Route::has($m['route']) ? route($m['route']) : '#';
      @endphp
      <a href="{{ $href }}" class="side-link {{ $aktif ? 'is-active' : '' }}" @if ($aktif) aria-current="page" @endif>
        <svg class="ic" viewBox="0 0 24 24" aria-hidden="true">{!! $m['ikon'] !!}</svg>
        <span>{{ $m['label'] }}</span>
      </a>
    @endforeach
  </nav>
</aside>