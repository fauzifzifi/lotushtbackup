@extends('layouts.public')

@section('judul', 'SMP Negeri 1 Loceret')

@section('konten')

<section class="hero-foto"> 
    <div class="wrap"> 
      <div class="hero-teks">
        
          <div class="hero-salam">Selamat Datang di Website</div>
          <h1>SMP NEGERI 1 LOCERET</h1>
          <p class="hero-lede">Mewujudkan Generasi Berkarakter, Berprestasi, dan Berwawasan Masa Depan melalui ekosistem pendidikan berkarakter Pancasila yang adaptif dan inklusif.</p>

          <div class="hero-ctas">
            <a href="{{ route('profil') }}" class="btn btn-biru">Jelajahi Profil
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </a>
            <a href="{{ route('akademik') }}#prestasi" class="btn btn-garis">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6M18 9h1.5a2.5 2.5 0 0 0 0-5H18M4 22h16M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22M18 2H6v7a6 6 0 0 0 12 0V2Z"/></svg>
              Lihat Prestasi
            </a>
          </div>

          <div class="hero-chips">
            <span class="hero-chip">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="m8.5 12.5 2.5 2.5 4.5-5"/></svg>
              Terakreditasi B (Baik)
            </span>
            <span class="hero-chip">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 9h16M4 15h16M10 3 8 21M16 3l-2 18"/></svg>
              NPSN: 20538363
            </span>
          </div>

        </div>
    </div>
  </section>

<main class="wrap">
  <section>
    <div class="feat-grid">

      <div>
        <h2 class="gen-judul">Membangun Generasi Unggul untuk Masa Depan Gemilang</h2>
        <p class="gen-isi">Kami berkomitmen memberikan pendidikan terbaik secara komprehensif melalui pembelajaran berbasis teknologi, penanaman adab luhur, dan sarana pengembangan minat bakat peserta didik.</p>

        <ul class="gen-cek">
          <li>
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="m8.5 12.5 2.5 2.5 4.5-5"/></svg>
            Penerapan Kurikulum Merdeka yang Adaptif
          </li>
          <li>
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="m8.5 12.5 2.5 2.5 4.5-5"/></svg>
            Ekosistem Sekolah Ramah Anak &amp; Anti-Perundungan
          </li>
          <li>
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="m8.5 12.5 2.5 2.5 4.5-5"/></svg>
            Program Digitalisasi Kelas &amp; Literasi Perpustakaan
          </li>
        </ul>

        <a href="{{ route('profil') }}" class="gen-link">Pelajari Profil &amp; Sejarah Selengkapnya
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </a>
      </div>

      <div class="gen-kartu-grid">

        <div class="gen-kartu">
          <span class="gen-nomor">01</span>
          <div class="gen-ikon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
          </div>
          <h3>Pendidikan Berkualitas</h3>
          <p>Integrasi materi kurikulum nasional yang diperkuat proyek Profil Pelajar Pancasila, pemikiran kritis, dan akhlak mulia.</p>
          <a href="{{ route('akademik') }}" class="gen-go">Kurikulum Terpadu
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m9 6 6 6-6 6"/></svg>
          </a>
        </div>

        <div class="gen-kartu">
          <span class="gen-nomor">02</span>
          <div class="gen-ikon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="m16 11 2 2 4-4"/></svg>
          </div>
          <h3>Guru Profesional</h3>
          <p>Tenaga pendidik berdedikasi tinggi, mayoritas tersertifikasi pendidik profesional, inovatif dalam media digital dan peduli siswa.</p>
          <a href="{{ route('profil') }}" class="gen-go biru">Dewan Guru Unggul
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m9 6 6 6-6 6"/></svg>
          </a>
        </div>

        <div class="gen-kartu">
          <span class="gen-nomor">03</span>
          <div class="gen-ikon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4M10 10h4M10 14h4M10 18h4"/></svg>
          </div>
          <h3>Lingkungan Nyaman</h3>
          <p>Ruang kelas representatif ber-LCD, laboratorium IPA &amp; Komputer mutakhir, perpustakaan digital, sarana olahraga, dan taman asri.</p>
          <a href="{{ route('profil') }}" class="gen-go biru">Fasilitas Lengkap
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m9 6 6 6-6 6"/></svg>
          </a>
        </div>

        <div class="gen-kartu">
          <span class="gen-nomor">04</span>
          <div class="gen-ikon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>
          </div>
          <h3>Bakat &amp; Ekstrakurikuler</h3>
          <p>Wadah pembinaan bakat beragam dari Pramuka inti, marching band, futsal, voli, paduan suara, robotik, hingga KIR sains.</p>
          <a href="{{ route('akademik') }}" class="gen-go biru">18+ Pilihan Ekskul
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m9 6 6 6-6 6"/></svg>
          </a>
        </div>

      </div>
    </div>

  </section>

  <section class="wahana pita">
    <div class="wahana-grid">

      <div class="ph wahana-foto">
         <img src="{{ asset('images/beranda/gapuro.jpeg') }}" alt="SMP Negeri 1 Loceret">
      </div>

      <div class="wahana-isi">
        <h2>SMP Negeri 1 Loceret: Wahana Cendekia Berpijak pada Karakter</h2>
        <p>SMP Negeri 1 Loceret merupakan satuan pendidikan formal tingkat menengah pertama terkemuka di wilayah selatan Kabupaten Nganjuk. Kami berkomitmen menyelenggarakan pembelajaran berpusat pada murid, mengembangkan rasa ingin tahu ilmiah, memperkuat kearifan lokal Jawa Timur, dan menempa kepribadian mandiri yang tangguh menghadapi era globalisasi.</p>
        <a href="{{ route('profil') }}" class="btn btn-navy">Selengkapnya Tentang Sekolah</a>
      </div>

    </div>

  </section>

  <section>
    <div class="pres-head">
      <div>
        <h2>Prestasi Terbaru Generasi Emas Loceret</h2>
        <p>Apresiasi nyata atas kerja keras, bimbingan para guru pembina, dan semangat pantang menyerah anak-anak didik kami.</p>
      </div>
      <a href="{{ route('akademik') }}#prestasi" class="pres-semua">Lihat Semua Rekam Prestasi
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
      </a>
    </div>

    <div class="pres-grid">

      <article class="pres-kartu">
        <div class="pres-foto">
        <img src="{{ asset('images/beranda/osn.jpg') }}" alt="Olimpiade Sains">
        <span class="pres-badge">Olimpiade Sains (OSN)</span></div>
        <div class="pres-isi">
          <span class="pres-tingkat">Tingkat Provinsi Jawa Timur</span>
          <h3>Juara 1 Olimpiade Sains Matematika &amp; IPA Terpadu</h3>
          <p>Diraih oleh ananda tim KIR SMPN 1 Loceret setelah melalui babak seleksi ketat teori dan eksperimen...</p>
        </div>
      </article>

      <article class="pres-kartu">
        <div class="pres-foto">
        <img src="{{ asset('images/beranda/olga.jpg') }}" alt="Olimpiade Olahraga">  
        <span class="pres-badge">Olahraga &amp; O2SN</span></div>
        <div class="pres-isi">
          <span class="pres-tingkat">Tingkat Kabupaten Nganjuk</span>
          <h3>Juara Umum Turnamen Bola Voli Putra &amp; Putri</h3>
          <p>Regu putra dan putri SMPN 1 Loceret berhasil memboyong piala bergilir setelah melewati laga...</p>
        </div>
      </article>

      <article class="pres-kartu">
        <div class="pres-foto">
        <img src="{{ asset('images/beranda/loka.jpg') }}" alt="Tari Kreasi Tradisional">  
        <span class="pres-badge">Festival Seni (FLS2N)</span></div>
        <div class="pres-isi">
          <span class="pres-tingkat">Tingkat Karesidenan Kediri</span>
          <h3>Pemenang Terbaik Tari Kreasi Tradisional</h3>
          <p>Penampilan sanggar seni SMPN 1 Loceret mengangkat nilai kearifan sejarah lokal Nganjuk...</p>
        </div>
      </article>

    </div>

  </section>

  <section>
    <div class="gal-head">
      <div>
        <h2>Galeri Dinamika Sekolah</h2>
        <p>Dokumentasi ragam aktivitas belajar mengajar, kedisiplinan upacara, kepramukaan, dan kecerian civitas akademika.</p>
      </div>
      <div class="gal-filter">
        <button type="button" class="gal-tab aktif">Semua</button>
        <button type="button" class="gal-tab">Pembelajaran</button>
        <button type="button" class="gal-tab">Ekstrakurikuler</button>
        <button type="button" class="gal-tab">Upacara Bendera</button>
      </div>
    </div>

    <div class="gal-utama">

      <figure class="gal-tile besar">
        <span class="gal-badge">Praktik Laboratorium IPA</span>
        <figcaption class="gal-cap">
          <strong>Pembelajaran Berbasis Riset &amp; Eksperimen Mandiri</strong>
          <small>Eksplorasi mikrobiologi siswa kelas VIII di laboratorium multimedia modern.</small>
        </figcaption>
      </figure>

      <div class="gal-samping">
        <figure class="gal-tile">
          <span class="gal-badge">Praktik Laboratorium IPA</span>
          <figcaption class="gal-cap"><strong>Upacara Hari Pramuka &amp; Disiplin Baris-Berbaris</strong></figcaption>
        </figure>
        <figure class="gal-tile">
          <span class="gal-badge">Praktik Laboratorium IPA</span>
          <figcaption class="gal-cap"><strong>Harmoni Gita Spensalo: Latihan Marching Band</strong></figcaption>
        </figure>
      </div>

    </div>

    <div class="gal-baris">
      <figure class="gal-tile">
        <span class="gal-badge">Praktik Laboratorium IPA</span>
        <figcaption class="gal-cap"><strong>Gerakan Literasi 15 Menit di Pojok Baca</strong></figcaption>
      </figure>
      <figure class="gal-tile">
        <span class="gal-badge">Praktik Laboratorium IPA</span>
        <figcaption class="gal-cap"><strong>Aksi Nyata Kebun Sekolah &amp; Pengolahan Kompos</strong></figcaption>
      </figure>
      <figure class="gal-tile">
        <span class="gal-badge">Praktik Laboratorium IPA</span>
        <figcaption class="gal-cap"><strong>Asesmen Pembelajaran Interaktif Berbasis Digital</strong></figcaption>
      </figure>
    </div>

    <div class="gal-lengkap">
      {{-- Jika nama route galeri Anda berbeda, ganti 'galeri' di bawah ini (cek: php artisan route:list) --}}
      <a href="{{ Route::has('galeri') ? route('galeri') : '#' }}" class="gal-album">Jelajahi Album Dokumentasi Lengkap
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.1-3.1a2 2 0 0 0-2.8 0L6 21"/></svg>
      </a>
    </div>
  </section>

  <section>
    <div class="ajak">
      <img src="{{ asset('images/logo.png') }}" alt="" class="ajak-logo" aria-hidden="true">

      <div class="ajak-isi">
        <h2>Kenali Lebih Dekat SMP Negeri 1 Loceret</h2>
        <p>Temukan informasi lengkap mengenai kurikulum pembelajaran, fasilitas sekolah, prestasi peserta didik. Pintu kami senantiasa terbuka untuk menyambut calon pemimpin masa depan bangsa.</p>
        <a href="{{ route('kontak') }}" class="btn btn-lime">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2z"/></svg>
          Hubungi Kami Sekarang
        </a>
      </div>
    </div>
  </section>

</main>

@endsection