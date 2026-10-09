@extends('layouts.admin')

@section('judul', 'Dashboard')

@section('konten')
@php
    // Link otomatis hidup begitu route modulnya dibuat; sebelum itu jadi '#'
    $tautan = fn ($nama) => \Illuminate\Support\Facades\Route::has($nama) ? route($nama) : '#';

    $pintasan = [
        ['teks' => '+ Tambah Guru Baru',   'route' => 'admin.guru.create',        'gelap' => true,
         'ikon' => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" x2="19" y1="8" y2="14"/><line x1="22" x2="16" y1="11" y2="11"/>'],
        ['teks' => '+ Unggah Kegiatan',    'route' => 'admin.dokumentasi.create', 'gelap' => true,
         'ikon' => '<path d="M16 5h6"/><path d="M19 2v6"/><path d="M21 11.5V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7.5"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/><circle cx="9" cy="9" r="2"/>'],
        ['teks' => 'Edit Ekstrakurikuler', 'route' => 'admin.ekskul.index',       'gelap' => false,
         'ikon' => '<circle cx="12" cy="5" r="1"/><path d="m9 20 3-6 3 6"/><path d="m6 8 6 2 6-2"/><path d="M12 10v4"/>'],
    ];

    // Urutannya mengikuti urutan $statistik di controller
    $ikonStat = [
        '<path d="M16 2v2"/><path d="M7 22v-2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2"/><path d="M8 2v2"/><circle cx="12" cy="11" r="3"/><rect x="3" y="4" width="18" height="18" rx="2"/>',
        '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
        '<path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3z"/><circle cx="12" cy="13" r="3"/>',
        '<path d="M18 22H4a2 2 0 0 1-2-2V6"/><path d="m22 13-1.296-1.296a2.41 2.41 0 0 0-3.408 0L11 18"/><circle cx="12" cy="8" r="2"/><rect width="16" height="16" x="6" y="2" rx="2"/>',
    ];

    $maks = max(array_column($ekskul, 'jumlah'));
@endphp

{{-- Banner sambutan --}}
<section class="banner">
  <h1>Selamat Datang, Admin<br>SMP Negeri 1 Loceret</h1>
  <p>Ringkasan data operasional sekolah, aktivitas publikasi website, dan data kesiswaan terkini untuk mengoptimalkan mutu pendidikan berbasis digital.</p>
</section>

{{-- Pintasan --}}
<h2 class="sec-judul">
  <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"/></svg>
  Pintasan Tindakan Cepat
</h2>
<div class="pintasan">
  @foreach ($pintasan as $p)
    <a href="{{ $tautan($p['route']) }}" class="pintas">
      <span class="kotak-ikon {{ $p['gelap'] ? 'kotak-ikon--gelap' : '' }}">
        <svg class="ic" viewBox="0 0 24 24" aria-hidden="true">{!! $p['ikon'] !!}</svg>
      </span>
      {{ $p['teks'] }}
    </a>
  @endforeach
</div>

{{-- Kartu statistik --}}
<div class="stat-grid">
  @foreach ($statistik as $i => $s)
    <article class="stat">
      <div class="stat-isi">
        <div>
          <p class="stat-label">{{ $s['label'] }}</p>
          <p class="stat-angka">{{ $s['angka'] }} <small>{{ $s['satuan'] }}</small></p>
        </div>
        <span class="kotak-ikon {{ $i === 3 ? 'kotak-ikon' : '' }}">
          <svg class="ic" viewBox="0 0 24 24" aria-hidden="true">{!! $ikonStat[$i] !!}</svg>
        </span>
      </div>

      @isset($s['route'])
        <a href="{{ $tautan($s['route']) }}" class="stat-foot">
          {{ $s['teks'] }}
          <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
        </a>
      @else
        <div class="stat-foot"><span class="badge-tayang">{{ $s['badge'] }}</span></div>
      @endisset
    </article>
  @endforeach
</div>

{{-- Aktivitas + Top Ekskul --}}
<div class="panel-grid">
  <section class="panel">
    <div class="panel-kepala">
      <div>
        <h2 class="panel-judul">Aktivitas Dokumentasi & Kegiatan Terbaru</h2>
        <p class="panel-sub">Rekaman kegiatan kesiswaan dan kelembagaan SMPN 1 Loceret yang siap dipublikasikan.</p>
      </div>
      <a href="{{ $tautan('admin.dokumentasi.index') }}" class="panel-link">
        Lihat Semua Arsip
        <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
      </a>
    </div>

    <div class="aktif-daftar">
      @foreach ($kegiatan as $k)
        <article class="aktif-item">
          <div class="aktif-thumb" aria-hidden="true">
            <svg class="ic" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="3" rx="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
          </div>
          <div class="aktif-isi">
            <span class="tag">{{ $k['kategori'] }}</span>
            <h3>{{ $k['judul'] }}</h3>
            <p class="oleh">
              <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
              Oleh: {{ $k['penulis'] }}
            </p>
          </div>
          <span class="status {{ $k['terbit'] ? 'status-ok' : 'status-draf' }}">
            {{ $k['terbit'] ? 'Telah Publikasi' : 'Draf Siap Review' }}
          </span>
        </article>
      @endforeach
    </div>
  </section>

  <section class="panel">
    <div class="panel-kepala">
      <h2 class="panel-judul panel-judul--ikon">
        <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><line x1="12" x2="12" y1="20" y2="10"/><line x1="18" x2="18" y1="20" y2="4"/><line x1="6" x2="6" y1="20" y2="16"/></svg>
        Top Ekstrakurikuler
      </h2>
      <span class="badge-cabang">{{ count($ekskul) }} Cabang</span>
    </div>

    <ol class="top-daftar">
      @foreach ($ekskul as $i => $e)
        <li>
          <div class="top-baris">
            <span class="top-rank">{{ $i + 1 }}</span>
            <span class="top-nama">{{ $e['nama'] }}</span>
            <span class="top-jumlah"><strong>{{ $e['jumlah'] }}</strong> siswa</span>
          </div>
          <div class="bar"><span class="bar-isi bar-{{ min($i + 1, 3) }}" style="width: {{ round($e['jumlah'] / $maks * 100) }}%"></span></div>
        </li>
      @endforeach
    </ol>
  </section>
</div>
@endsection