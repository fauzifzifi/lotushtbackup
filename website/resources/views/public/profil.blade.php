@extends('layouts.public')

@section('judul', 'Profil - SMP Negeri 1 Loceret')

@section('konten')

<main class="wrap">

  <div class="hal-kepala pita">
    <div class="hal-kepala-isi">
      <div>
        <h1>Profil SMP Negeri 1 Loceret</h1>
        <p>Mengenal lebih dekat identitas, sejarah, visi, misi, dan struktur tata kelola kepemimpinan sekolah berintegritas di Kabupaten Nganjuk.</p>
      </div>

      <div class="status-kartu">
        <span class="status-ikon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m5 12 5 5 9-10"/></svg>
        </span>
        <div>
          <small>Status Akreditasi</small>
          <strong>Terakreditasi B</strong>
        </div>
      </div>
    </div>
  </div>

  <section id="visi-misi" class="profil-bagian">

    <div class="judul-tengah">
      <h2>Visi &amp; Misi SMP Negeri 1 Loceret</h2>
      <p>Prinsip dasar pengabdian tenaga pendidik dalam membentuk insan unggul, berbudi pekerti luhur, dan adaptif.</p>
    </div>

    {{-- Banner visi beranimasi (CSS: public/css/visi-banner.css) --}}
@include('partials.public.visi-banner')

    <div class="misi-kepala">
      <h3>Misi SMP Negeri 1 Loceret</h3>
    </div>

    <div class="misi-grid">

      <article class="misi-kartu">
        <span class="misi-no">01</span>
        <p>Mengembangkan karakter murid yang beriman, bertakwa kepada Tuhan Yang Maha Esa, dan berakhlak mulia melalui pembiasaan harian, teladan positif guru, penanaman nilai-nilai kejujuran, disiplin, dan tanggungjawab melalui pembiasaan harian, dan penguatan budaya sekolah dengan mengintegrasikan pendidikan karakter dalam setiap mata pelajaran dan kegiatan ekstrakurikuler.</p>
      </article>

      <article class="misi-kartu">
        <span class="misi-no">02</span>
        <p>Mendorong prestasi akademik dan non-akademik dengan menerapkan praktik pedagogis inovatif berbasis pembelajaran mendalam (deep learning), mengimplementasikan 7 kebiasaan Anak Indonesia Hebat, dan mengembangkan kompetensi guru dan tenaga kependidikan secara berkelanjutan.</p>
      </article>

      <article class="misi-kartu">
        <span class="misi-no">03</span>
        <p>Membangun wawasan global murid melalui pemanfaatan teknologi digital secara bijak, literasi informasi, dan kolaborasi lintas budaya dalam pembelajaran.</p>
      </article>

      <article class="misi-kartu">
        <span class="misi-no">04</span>
        <p>Menanamkan kepedulian terhadap lingkungan melalui pembiasaan perilaku ramah lingkungan, kegiatan edukasi dan kampanye tentang pentingnya menjaga kelestarian, kebersihan dan keindahan lingkungan dan kemitraan dengan komunitas peduli lingkungan.</p>
      </article>

      <article class="misi-kartu">
        <span class="misi-no">05</span>
        <p>Menciptakan lingkungan belajar yang inklusif, aman, dan inspiratif yang mendorong partisipasi aktif, menghargai keberagaman, dan memfasilitasi tumbuhnya Profil Dimensi Lulusan.</p>
      </article>

      <article class="misi-kartu">
        <span class="misi-no">06</span>
        <p>Mengoptimalkan pemanfaatan teknologi digital untuk mendukung pembelajaran personal, akses sumber belajar global, dan inovasi dalam proses pembelajaran.</p>
      </article>

      <article class="misi-kartu">
        <span class="misi-no">07</span>
        <p>Membangun kemitraan strategis dengan lembaga pendidikan, dan masyarakat untuk memperluas kesempatan belajar dan mengembangkan potensi murid secara holistik.</p>
      </article>

      <article class="misi-kartu">
        <span class="misi-no">08</span>
        <p>Menyiapkan murid menjadi generasi penerus bangsa yang unggul, kompetitif, dan mampu menghadapi tantangan global.</p>
      </article>

    </div>
  </section>

  <section id="identitas" class="profil-bagian pita">

    <div class="judul-tengah">
      <h2>Identitas Resmi &amp; Filosofi Lambang</h2>
      <p>Makna mendalam yang tersemat dalam lambang kebanggaan almamater.</p>
    </div>

    <div class="id-kartu">
      <h3>Tabel Identitas Resmi Sekolah</h3>

      <dl class="id-tabel">
        <div class="id-baris">
          <dt>Nama Resmi Sekolah</dt>
          <dd>SMP Negeri 1 Loceret</dd>
        </div>
        <div class="id-baris">
          <dt>Nomor Pokok Sekolah Nasional (NPSN)</dt>
          <dd>20538363</dd>
        </div>
        <div class="id-baris">
          <dt>Status Kelembagaan</dt>
          <dd>Negeri</dd>
        </div>
        <div class="id-baris">
          <dt>Bentuk Pendidikan</dt>
          <dd>Sekolah Menengah Pertama (SMP)</dd>
        </div>
        <div class="id-baris">
          <dt>Status Akreditasi</dt>
          <dd><span class="id-badge">B (Baik)</span></dd>
        </div>
        <div class="id-baris">
          <dt>Alamat Lengkap</dt>
          <dd>Jl. Raya Kediri - Nganjuk No.303, Loceret, Godean, Kec. Loceret, Kabupaten Nganjuk, Jawa Timur</dd>
        </div>
        <div class="id-baris">
          <dt>Kode Pos</dt>
          <dd>64471</dd>
        </div>
      </dl>
    </div>

    <div class="filosofi-kartu">
      @if (file_exists(public_path('images/filosofi.png')))
        <img src="{{ asset('images/filosofi.png') }}" alt="Filosofi lambang SMP Negeri 1 Loceret">
      @endif
    </div>

  </section>

  <section id="sejarah" class="profil-bagian">

    <div class="judul-tengah">
      <h2>Sejarah SMP Negeri 1 Loceret</h2>
      <p>Perjalanan dedikasi SMP Negeri 1 Loceret dalam mencerdaskan generasi penerus bangsa dari masa ke masa.</p>
    </div>

    <div class="sejarah-isi">
      <p>Berdiri pada tahun 1978 di Kecamatan Loceret, Kabupaten Nganjuk, SMP Negeri 1 Loceret lahir dari urgensi masyarakat terhadap akses pendidikan menengah yang bermutu. Sejak awal pendiriannya, institusi ini memegang komitmen kuat dalam menyelenggarakan pendidikan unggul yang mengintegrasikan kecerdasan akademik dengan penguatan karakter moral dan nilai-nilai kebudayaan.</p>

      <p>Didukung oleh tenaga pendidik profesional serta pemutakhiran fasilitas secara berkelanjutan, sekolah ini secara konsisten melahirkan lulusan berdaya saing tinggi dalam ranah akademik maupun nonakademik. Selain itu, SMP Negeri 1 Loceret menempatkan diri sebagai lembaga yang berperan aktif dalam pelestarian kearifan lokal sekaligus berkontribusi nyata pada dinamika sosial kemasyarakatan.</p>

      <p>Menghadapi tuntutan zaman yang dinamis, institusi ini terus melakukan inovasi pendidikan. Langkah strategis tersebut diwujudkan melalui optimalisasi teknologi informasi di lingkungan sekolah guna menciptakan ekosistem pembelajaran yang adaptif, interaktif, dan efektif.</p>
    </div>

  </section>

</main>

@endsection