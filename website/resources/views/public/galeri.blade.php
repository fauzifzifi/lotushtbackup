@extends('layouts.public')

@section('judul', 'SMP Negeri 1 Loceret - Galeri Foto & Video')

@section('konten')

<main class="wrap">

  {{-- ========== FOTO ========== --}}
  <section id="foto" class="profil-bagian rapat">

    <div class="gal-filter tengah">
      <a href="{{ route('galeri') }}#foto" class="gal-tab {{ $aktif === '' ? 'aktif' : '' }}">Semua ({{ $totalFoto }})</a>
      @foreach ($kategori as $slug => $label)
        <a href="{{ route('galeri', ['kategori' => $slug]) }}#foto" class="gal-tab {{ $aktif === $slug ? 'aktif' : '' }}">{{ $label }}</a>
      @endforeach
    </div>

    <div class="gal-halaman">
      @forelse ($foto as $f)
        <figure class="gal-tile">
          <span class="gal-badge {{ $f['warna'] }}">{{ $f['badge'] }}</span>
          <figcaption class="gal-cap">
            <strong>{{ $f['judul'] }}</strong>
            <small>{{ $f['ket'] }}</small>
          </figcaption>
        </figure>
      @empty
        <p class="kosong">Belum ada foto pada kategori ini.</p>
      @endforelse
    </div>

  </section>

  {{-- ========== VIDEO ========== --}}
  <section id="video" class="profil-bagian">

    <div class="bagian-kepala garis">
      <div>
        <h2>Video Terkini SMP Negeri 1 Loceret</h2>
        <p>Tayangan profil, liputan acara, dan video inspiratif sekolah dalam format visual dinamis.</p>
      </div>
      <a href="#" class="link-kanal">Kunjungi Kanal Resmi YouTube SMPN 1 Loceret
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
      </a>
    </div>

    <div class="video-grid">

      <a href="{{ $videoUtama['url'] }}" class="video-kartu video-utama">
        <div class="video-thumb">
          <span class="video-durasi">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
            {{ $videoUtama['durasi'] }}
          </span>
          <span class="video-play">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
          </span>
        </div>
        <div class="video-isi">
          <span class="lencana {{ $videoUtama['warna'] }}">{{ $videoUtama['badge'] }}</span>
          <h3>{{ $videoUtama['judul'] }}</h3>
          <p>{{ $videoUtama['ket'] }}</p>
        </div>
      </a>

      <div class="video-sisi">
        @foreach ($videoLain as $v)
          <a href="{{ $v['url'] }}" class="video-kartu">
            <div class="video-thumb">
              <span class="video-durasi">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
                {{ $v['durasi'] }}
              </span>
              <span class="video-play">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
              </span>
            </div>
            <div class="video-isi">
              <span class="lencana {{ $v['warna'] }}">{{ $v['badge'] }}</span>
              <h3>{{ $v['judul'] }}</h3>
              <p>{{ $v['ket'] }}</p>
            </div>
          </a>
        @endforeach
      </div>

    </div>
  </section>

</main>

@endsection