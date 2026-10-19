@extends('layouts.public')

@section('judul', 'SMP Negeri 1 Loceret - Layanan & Informasi Akademik')

@section('konten')

<main class="wrap">

  {{-- ========== KEPALA HALAMAN ========== --}}
  <div class="hal-kepala pita" style="--pita:#F3F4FE">
    <div class="hal-kepala-isi">
      <div>
        <span class="eyebrow"><i></i>Informasi &amp; Pangkalan Data Resmi Sekolah</span>
        <h1>Layanan &amp; Informasi Akademik</h1>
        <p>Data pendidik, statistik perkembangan peserta didik, serta etalase prestasi kebanggaan SMP Negeri 1 Loceret secara transparan dan akuntabel.</p>
      </div>

      <div class="stat-ganda">
        <div class="stat-item">
          <span class="stat-ikon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 2v2M7 22v-2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2M8 2v2"/><circle cx="12" cy="11" r="3"/><rect x="3" y="4" width="18" height="18" rx="2"/></svg>
          </span>
          <div>
            <small>Pendidik</small>
            <strong>{{ $ringkasan['guru'] }} Guru</strong>
          </div>
        </div>
        <span class="stat-pisah"></span>
        <div class="stat-item">
          <span class="stat-ikon hijau">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>
          </span>
          <div>
            <small>Prestasi</small>
            <strong>{{ $ringkasan['juara'] }} Juara</strong>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- ========== 1. DATA GURU & TENAGA PENDIDIK ========== --}}
  <section id="guru" class="profil-bagian pita">

    <div class="bagian-kepala">
      <h2>Data Guru &amp; Tenaga Pendidik</h2>

      <form class="cari-form" method="GET" action="{{ route('akademik') }}#guru">
        <label class="cari-kotak">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg>
          <input type="search" name="q" value="{{ $q }}" placeholder="Cari nama atau mapel...">
        </label>

        <select name="mapel" class="cari-pilih" aria-label="Filter mata pelajaran">
          <option value="">Semua Mata Pelajaran</option>
          @foreach ($daftarMapel as $m)
            <option value="{{ $m }}" {{ $mapel === $m ? 'selected' : '' }}>{{ $m }}</option>
          @endforeach
        </select>
      </form>
    </div>

  <div id="guruHasil">
    <div class="guru-grid">
      @forelse ($guru as $g)
        <article class="guru-kartu">
          <div class="guru-foto">
            @if ($g->foto_url)
              <img src="{{ $g->foto_url }}" alt="Foto {{ $g->nama }}" loading="lazy">
            @else
              <span aria-hidden="true">{{ mb_strtoupper(mb_substr($g->nama, 0, 1)) }}</span>
            @endif
          </div>
          <div>
            <span class="guru-mapel">{{ $g->mapel }}</span>
            <h3 class="guru-nama">{{ $g->nama }}</h3>
          </div>
        </article>
      @empty
        <p class="kosong">Tidak ada tenaga pendidik yang cocok dengan pencarianmu.</p>
      @endforelse
    </div>

    @if ($guru->total() > 0)
      <div class="halaman">
        <small>Menampilkan {{ $guru->count() }} dari {{ $guru->total() }} Tenaga Pendidik Terdaftar</small>

        <nav class="halaman-nav" aria-label="Halaman data guru">
          <a href="{{ $guru->previousPageUrl() ?? '#' }}" class="hal-btn {{ $guru->onFirstPage() ? 'mati' : '' }}">← Sebelumnya</a>

          @for ($i = 1; $i <= $guru->lastPage(); $i++)
            <a href="{{ $guru->url($i) }}" class="hal-btn nomor {{ $i === $guru->currentPage() ? 'aktif' : '' }}">{{ $i }}</a>
          @endfor

          <a href="{{ $guru->nextPageUrl() ?? '#' }}" class="hal-btn {{ $guru->hasMorePages() ? '' : 'mati' }}">Selanjutnya →</a>
        </nav>
      </div>
    @endif
  </div>

  </section>

  {{-- ========== 2. REKAPITULASI EKSTRAKURIKULER ========== --}}
  <section id="statistik" class="profil-bagian">

    <div class="ek-kartu">

      <div class="ek-kepala">
        <h2>Rekapitulasi Partisipasi Ekstrakurikuler</h2>
        <div class="ek-chips">
          <div class="ek-chip">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            <div>
              <small>Total Partisipan</small>
              <strong>{{ $totalPartisipan }} Siswa</strong>
            </div>
          </div>
          <div class="ek-chip hijau">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8.3 10a.7.7 0 0 1-.626-1.079L11.4 3a.7.7 0 0 1 1.198-.043L16.3 8.9a.7.7 0 0 1-.572 1.1Z"/><rect x="3" y="14" width="7" height="7" rx="1"/><circle cx="17.5" cy="17.5" r="3.5"/></svg>
            <div>
              <small>Cabang Aktif</small>
              <strong>{{ count($ekskul) }} Bidang</strong>
            </div>
          </div>
        </div>
      </div>

      <div class="ek-bungkus">
        <table class="ek-tabel">
          <thead>
            <tr>
              <th class="kol-no">No</th>
              <th>Nama Ekstrakurikuler</th>
              <th class="kol-jml">Jumlah</th>
              <th class="kol-bar">Proporsi &amp; Persentase</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($ekskul as $e)
              @php $persen = $totalPartisipan > 0 ? $e['jumlah'] / $totalPartisipan * 100 : 0; @endphp
              <tr>
                <td class="kol-no">{{ $loop->iteration }}</td>
                <td class="ek-nama {{ $e['jumlah'] >= 50 ? 'tebal' : '' }}">{{ $e['nama'] }}</td>
                <td class="ek-jml">{{ $e['jumlah'] }}</td>
                <td>
                  <div class="ek-bar">
                    <span class="ek-trek"><span class="ek-isi {{ $e['jumlah'] >= 50 ? 'tinggi' : '' }}" style="width: {{ number_format($persen, 2, '.', '') }}%"></span></span>
                    <span class="ek-persen">{{ number_format($persen, 2, ',', '.') }}%</span>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr class="ek-total">
              <td colspan="2">TOTAL PESERTA TERDATA</td>
              <td class="ek-jml">{{ $totalPartisipan }}</td>
              <td>
                <div class="ek-bar">
                  <span class="ek-trek"><span class="ek-isi penuh" style="width: 100%"></span></span>
                  <span class="ek-persen">100%</span>
                </div>
              </td>
            </tr>
          </tfoot>
        </table>
      </div>

    </div>
  </section>

  {{-- ========== 3. DIREKTORI PRESTASI SISWA ========== --}}
  <section id="prestasi" class="profil-bagian pita">

    <div class="bagian-kepala">
      <div>
        <h2>Direktori Prestasi Siswa</h2>
        <p>Rekam jejak capaian gemilang peserta didik SMP Negeri 1 Loceret pada ajang kompetisi sains, keolahragaan, kesenian, dan teknologi.</p>
      </div>
    </div>

    <div class="gal-filter">
      <a href="{{ route('akademik') }}#prestasi" class="gal-tab {{ $bidangAktif === '' ? 'aktif' : '' }}">Semua Bidang</a>
      @foreach ($daftarBidang as $b)
        <a href="{{ route('akademik', ['bidang' => $b]) }}#prestasi" class="gal-tab {{ $bidangAktif === $b ? 'aktif' : '' }}">{{ $b }}</a>
      @endforeach
    </div>

    <div class="pr-grid">
      @forelse ($prestasi as $p)
        <article class="pr-kartu">
          <div class="pr-foto"><span class="pr-badge {{ $p['warna'] }}">{{ $p['badge'] }}</span></div>
          <div class="pr-isi">
            <div class="pr-tgl">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
              {{ $p['tanggal'] }}
            </div>
            <h3>{{ $p['judul'] }}</h3>
          </div>
        </article>
      @empty
        <p class="kosong">Belum ada prestasi pada bidang ini.</p>
      @endforelse
    </div>

  </section>

</main>

@endsection

@push('scripts')
<script>
  (function () {
    const form  = document.querySelector('#guru .cari-form');
    const hasil = document.getElementById('guruHasil');
    if (!form || !hasil) return;

    const input = form.querySelector('input[name="q"]');
    const pilih = form.querySelector('select[name="mapel"]');
    let timer, kontrolTerakhir;

    // Susun alamat pencarian dari isi form, tanpa kolom yang kosong
    function urlPencarian() {
      const p = new URLSearchParams(new FormData(form));
      for (const [k, v] of [...p]) if (v === '') p.delete(k);
      const qs = p.toString();
      return form.action.split('#')[0] + (qs ? '?' + qs : '');
    }

    async function muat(url) {
      if (kontrolTerakhir) kontrolTerakhir.abort();   // batalkan permintaan lama
      const saya = new AbortController();
      kontrolTerakhir = saya;
      hasil.classList.add('memuat');

      try {
        const res = await fetch(url, { signal: saya.signal });
        if (!res.ok) throw new Error('Status ' + res.status);

        const html = await res.text();
        const baru = new DOMParser().parseFromString(html, 'text/html').getElementById('guruHasil');
        if (!baru) throw new Error('Bagian hasil tidak ditemukan');

        hasil.innerHTML = baru.innerHTML;
        history.replaceState(null, '', url + '#guru');  // alamat di browser ikut berubah
      } catch (e) {
        if (e.name === 'AbortError') return;            // normal: kalah oleh ketikan berikutnya
        window.location.href = url + '#guru';           // cadangan: muat halaman seperti biasa
      } finally {
        if (kontrolTerakhir === saya) hasil.classList.remove('memuat');
      }
    }

    // Ketik: tunggu 0,3 detik setelah berhenti mengetik
    input.addEventListener('input', () => {
      clearTimeout(timer);
      timer = setTimeout(() => muat(urlPencarian()), 300);
    });

    // Ganti mata pelajaran: langsung cari
    pilih.addEventListener('change', () => muat(urlPencarian()));

    // Tekan Enter: cari sekarang juga, tanpa memuat ulang halaman
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      clearTimeout(timer);
      muat(urlPencarian());
    });

    // Klik nomor halaman: pindah tanpa memuat ulang
    hasil.addEventListener('click', (e) => {
      const a = e.target.closest('.halaman-nav a');
      if (!a || a.classList.contains('mati') || a.getAttribute('href') === '#') return;
      e.preventDefault();
      muat(a.href.split('#')[0]);
      document.getElementById('guru').scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
  })();
</script>
@endpush