@extends('layouts.public')

@section('judul', 'SMP Negeri 1 Loceret - Hubungi Kami')

@section('konten')

<main class="wrap">

  {{-- ========== KEPALA ========== --}}
  <div class="kontak-kepala">
    <h1>Hubungi SMP Negeri 1 Loceret</h1>
    <p>Kami siap melayani informasi seputar layanan pendidikan, administrasi sekolah, dan kemitraan demi masa depan putra-putri generasi bangsa.</p>
  </div>

  {{-- ========== FORMULIR + SISI KANAN ========== --}}
  <section id="formulir" class="profil-bagian rapat">
    <div class="kontak-grid">

      {{-- Formulir --}}
      <div class="form-kartu">

        <div class="form-intro">
          <span class="form-ikon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.4 2.6a2.1 2.1 0 0 1 3 3L12 15l-4 1 1-4Z"/></svg>
          </span>
          <div>
            <h2>Kirim Pesan / Pengaduan Layanan</h2>
            <p>Silakan isi formulir di bawah ini, tim humas dan tata usaha kami akan segera merespons permohonan informasi Anda melalui WhatsApp atau Email resmi.</p>
          </div>
        </div>

        @if (session('sukses'))
          <div class="alert-sukses">{{ session('sukses') }}</div>
        @endif

        <form method="POST" action="{{ route('kontak.kirim') }}" novalidate>
          @csrf

          <div class="baris-dua">
            <div class="kolom">
              <label for="nama">Nama Lengkap <b>*</b></label>
              <div class="isian {{ $errors->has('nama') ? 'salah' : '' }}">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                <input id="nama" type="text" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama lengkap Anda...">
              </div>
              @error('nama') <small class="galat">{{ $message }}</small> @enderror
            </div>

            <div class="kolom">
              <label for="email">Alamat Email <b>*</b></label>
              <div class="isian {{ $errors->has('email') ? 'salah' : '' }}">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/></svg>
                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="contoh@email.com">
              </div>
              @error('email') <small class="galat">{{ $message }}</small> @enderror
            </div>
          </div>

          <div class="kolom">
            <label for="telepon">Nomor WhatsApp / HP <b>*</b></label>
            <div class="isian {{ $errors->has('telepon') ? 'salah' : '' }}">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2z"/></svg>
              <input id="telepon" type="tel" name="telepon" value="{{ old('telepon') }}" placeholder="08xxxxxxxxxx">
            </div>
            @error('telepon') <small class="galat">{{ $message }}</small> @enderror
          </div>

          <div class="kolom">
            <label for="subjek">Subjek Pesan <b>*</b></label>
            <div class="isian {{ $errors->has('subjek') ? 'salah' : '' }}">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
              <input id="subjek" type="text" name="subjek" value="{{ old('subjek') }}" placeholder="Judul permohonan atau pertanyaan...">
            </div>
            @error('subjek') <small class="galat">{{ $message }}</small> @enderror
          </div>

          <div class="kolom">
            <label for="pesan">Isi Pesan <b>*</b></label>
            <div class="isian area {{ $errors->has('pesan') ? 'salah' : '' }}">
              <textarea id="pesan" name="pesan" rows="5" placeholder="Tuliskan rincian pesan atau pertanyaan Anda di sini secara jelas...">{{ old('pesan') }}</textarea>
            </div>
            @error('pesan') <small class="galat">{{ $message }}</small> @enderror
          </div>

          <button type="submit" class="btn btn-navy kirim">Kirim Pesan Sekarang
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/></svg>
          </button>
        </form>
      </div>

      {{-- Sisi kanan --}}
      <div class="kontak-sisi">

        <div class="sisi-kartu">
          <div class="sisi-judul">
            <h3>
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
              Jam Pelayanan Tata Usaha
            </h3>
            <span class="wib">WIB</span>
          </div>

          @foreach ($jam as $j)
            <div class="jam-baris {{ $j['libur'] ? 'libur' : '' }}">
              <span class="jam-hari">
                @if ($j['libur'])
                  <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18M10 14l4 4M14 14l-4 4"/></svg>
                @else
                  <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                @endif
                {{ $j['hari'] }}
              </span>
              <strong>{{ $j['jam'] }}</strong>
            </div>
          @endforeach
        </div>

        <div class="sisi-kartu">
          <h3 class="medsos-judul">Saluran Media Sosial Resmi</h3>
          <p class="medsos-isi">Ikuti publikasi kegiatan, galeri prestasi siswa, dan video edukasi kami di platform berikut:</p>

          <div class="medsos-grid">
            @foreach ($medsos as $m)
              <a href="{{ $m['url'] }}" class="medsos-item">
                <span class="medsos-ikon {{ $m['kode'] }}">
                  @if ($m['kode'] === 'ig')
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor"/></svg>
                  @elseif ($m['kode'] === 'yt')
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M23.5 6.2a3 3 0 0 0-2.1-2.1C19.5 3.6 12 3.6 12 3.6s-7.5 0-9.4.5A3 3 0 0 0 .5 6.2C0 8.1 0 12 0 12s0 3.9.5 5.8a3 3 0 0 0 2.1 2.1c1.9.5 9.4.5 9.4.5s7.5 0 9.4-.5a3 3 0 0 0 2.1-2.1c.5-1.9.5-5.8.5-5.8s0-3.9-.5-5.8zM9.6 15.6V8.4l6.2 3.6-6.2 3.6z"/></svg>
                  @elseif ($m['kode'] === 'fb')
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.07C24 5.4 18.63 0 12 0S0 5.4 0 12.07C0 18.1 4.39 23.1 10.13 24v-8.44H7.08v-3.49h3.05V9.41c0-3.02 1.79-4.69 4.53-4.69 1.31 0 2.68.24 2.68.24v2.97h-1.51c-1.49 0-1.96.93-1.96 1.89v2.25h3.33l-.53 3.49h-2.8V24C19.61 23.1 24 18.1 24 12.07z"/></svg>
                  @else
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
                  @endif
                </span>
                <span>
                  <strong>{{ $m['nama'] }}</strong>
                  <small>{{ $m['akun'] }}</small>
                </span>
              </a>
            @endforeach
          </div>
        </div>

      </div>
    </div>
  </section>

  {{-- ========== LOKASI ========== --}}
  <section id="lokasi" class="profil-bagian">
    <div class="lokasi-kartu">

      <div class="bagian-kepala">
        <div>
          <h2>Lokasi SMP Negeri 1 Loceret</h2>
          <p>Terletak di lokasi strategis wilayah Loceret yang tenang, asri, dan sangat mendukung iklim akademis siswa.</p>
        </div>
        <a href="{{ $peta['arah'] }}" target="_blank" rel="noopener" class="btn btn-navy">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><polygon points="3 11 22 2 13 21 11 13 3 11"/></svg>
          Petunjuk Arah via Google Maps
        </a>
      </div>

      <div class="peta">
        <iframe src="{{ $peta['embed'] }}" title="Peta lokasi SMP Negeri 1 Loceret" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
        <span class="peta-badge">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 6v6M16 6v6M2 12h19.6M18 18h3s.5-1.7.8-2.8c.1-.4.2-.8.2-1.2 0-.4-.1-.8-.2-1.2l-1.4-5C20.1 6.8 19.1 6 18 6H4a2 2 0 0 0-2 2v10h3"/><circle cx="7" cy="18" r="2"/><path d="M9 18h5"/><circle cx="16" cy="18" r="2"/></svg>
          ± 10 Menit dari Alun-Alun Nganjuk
        </span>
      </div>

    </div>
  </section>

</main>

@endsection

@if ($errors->any() || session('sukses'))
  @push('scripts')
  <script>document.getElementById('formulir').scrollIntoView();</script>
  @endpush
@endif