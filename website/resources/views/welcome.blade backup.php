<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>SMP Negeri 1 Loceret</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
  :root{
    --navy:#152A4A; --navy-2:#1F3B63; --blue:#2E6FB8; --blue-light:#EAF2FB;
    --bg:#F6F9FD; --paper:#FFFFFF; --ink:#152233; --muted:#5B6B80; --line:#E2E9F2;
    --lime:#8FE24A; --limed:#4CAF20;
    padding-top: env(safe-area-inset-top,0px); padding-bottom: env(safe-area-inset-bottom,0px);
  }
  *{box-sizing:border-box}
  body{margin:0;background:var(--bg);color:var(--ink);font-family:'Plus Jakarta Sans',system-ui,sans-serif;line-height:1.5}
  img{max-width:100%}
  .wrap{max-width:1180px;margin:0 auto;padding:0 24px}
  a{color:inherit;text-decoration:none}
  .ph{background:linear-gradient(135deg,var(--navy) 0%,var(--blue) 100%);position:relative;overflow:hidden;display:flex;align-items:center;justify-content:center;color:#fff}
  .ph::after{content:'';position:absolute;inset:0;background:repeating-linear-gradient(45deg,rgba(255,255,255,.06) 0 12px,transparent 12px 24px)}
  .ph span{position:relative;z-index:1;font-size:13px;font-weight:600;letter-spacing:.02em;text-align:center;padding:0 10px}

  header{position:sticky;top:0;z-index:50;background:rgba(255,255,255,.92);backdrop-filter:blur(8px);border-bottom:1px solid var(--line)}
  .nav{display:flex;align-items:center;justify-content:space-between;padding:14px 24px;gap:20px}
  .brand{display:flex;align-items:center;gap:10px}
  .brand .mark{width:38px;height:38px;border-radius:10px;background:var(--navy);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:13px}
  .brand .name{font-weight:800;font-size:14px;line-height:1.2;color:var(--navy)}
  .brand .sub{font-size:11px;color:var(--muted)}
  .navlinks{display:flex;gap:28px;font-size:14px;font-weight:600;color:var(--navy-2)}
  .navlinks a.active{color:var(--blue)}
  .navactions{display:flex;align-items:center;gap:14px}
  .btn{display:inline-flex;align-items:center;gap:8px;padding:11px 20px;border-radius:10px;font-weight:700;font-size:14px;border:1px solid transparent;cursor:pointer}
  .btn-navy{background:var(--navy);color:#fff}
  .btn-outline{background:#fff;color:var(--navy-2);border-color:var(--line)}
  .btn-lime{background:var(--lime);color:#12300a}
  @media (max-width:900px){.navlinks{display:none}}

  .hero{padding:56px 0 40px}
  .hero-grid{display:grid;grid-template-columns:1.1fr 1fr;gap:48px;align-items:center}
  .eyebrow{display:inline-flex;align-items:center;gap:8px;background:var(--blue-light);color:var(--blue);font-weight:700;font-size:12px;padding:7px 14px;border-radius:999px;margin-bottom:18px}
  .eyebrow i{width:6px;height:6px;border-radius:50%;background:var(--blue)}
  h1.title{font-size:44px;line-height:1.08;font-weight:800;color:var(--navy);margin:0 0 16px}
  .badge-inline{display:inline-block;background:var(--navy);color:#fff;font-size:12px;font-weight:700;padding:5px 12px;border-radius:8px;vertical-align:middle;margin-left:8px}
  .lede{color:var(--muted);font-size:15.5px;max-width:46ch;margin-bottom:26px}
  .hero-ctas{display:flex;gap:14px;margin-bottom:22px;flex-wrap:wrap}
  .accreds{display:flex;gap:22px;font-size:13px;color:var(--muted);flex-wrap:wrap}
  .accreds span{display:inline-flex;align-items:center;gap:6px;font-weight:600;color:var(--navy-2)}
  .hero-photo{border-radius:20px;height:360px}
  @media (max-width:900px){.hero-grid{grid-template-columns:1fr}h1.title{font-size:34px}.hero-photo{height:260px}}

  .stats{background:var(--paper);border:1px solid var(--line);border-radius:18px;margin-top:10px;padding:26px 10px;display:grid;grid-template-columns:repeat(4,1fr);gap:12px;box-shadow:0 12px 30px -20px rgba(21,42,74,.25)}
  .stat{display:flex;align-items:center;gap:12px;justify-content:center;text-align:left;padding:0 10px;border-right:1px solid var(--line)}
  .stat:last-child{border-right:none}
  .stat .ico{width:42px;height:42px;border-radius:10px;background:var(--blue-light);color:var(--blue);display:flex;align-items:center;justify-content:center;flex-shrink:0}
  .stat .num{font-size:22px;font-weight:800;color:var(--navy)}
  .stat .lbl{font-size:11.5px;color:var(--muted)}
  @media (max-width:800px){.stats{grid-template-columns:1fr 1fr}.stat{border-right:none;border-bottom:1px solid var(--line);padding-bottom:14px}}

  section{padding:64px 0}
  .sec-head h2{font-size:30px;font-weight:800;color:var(--navy);margin:0 0 10px;max-width:16ch}
  .sec-head p{color:var(--muted);max-width:56ch;font-size:14.5px}

  .feat-grid{display:grid;grid-template-columns:1fr 1fr;gap:52px;align-items:start}
  .checklist{list-style:none;padding:0;margin:22px 0}
  .checklist li{display:flex;gap:10px;align-items:flex-start;margin-bottom:12px;font-size:14.5px;color:var(--navy-2);font-weight:600}
  .checklist li .c{width:20px;height:20px;border-radius:50%;background:var(--blue-light);color:var(--blue);flex-shrink:0;display:flex;align-items:center;justify-content:center;font-size:12px;margin-top:1px}
  .link-more{color:var(--blue);font-weight:700;font-size:14px}
  .cards2{display:grid;grid-template-columns:1fr 1fr;gap:16px}
  .card{background:var(--paper);border:1px solid var(--line);border-radius:16px;padding:22px}
  .card .ico2{width:38px;height:38px;border-radius:9px;background:var(--blue-light);color:var(--blue);display:flex;align-items:center;justify-content:center;margin-bottom:14px}
  .card h3{font-size:16px;font-weight:800;color:var(--navy);margin:0 0 8px}
  .card p{font-size:13px;color:var(--muted);margin:0 0 14px}
  .card .go{font-size:13px;font-weight:700;color:var(--blue)}
  @media (max-width:900px){.feat-grid,.cards2{grid-template-columns:1fr}}

  .about{background:var(--navy);border-radius:24px;padding:0;overflow:hidden}
  .about-grid{display:grid;grid-template-columns:1fr 1.05fr;align-items:center}
  .about-photo{height:340px;border-radius:0}
  .about-copy{padding:40px 44px;color:#fff}
  .about-copy h2{font-size:26px;font-weight:800;margin:0 0 14px}
  .about-copy p{color:#B9C6DA;font-size:14.5px;margin-bottom:22px}
  @media (max-width:900px){.about-grid{grid-template-columns:1fr}.about-photo{height:220px}}

  .ach-head{display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:28px;flex-wrap:wrap;gap:12px}
  .ach-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px}
  .ach{background:var(--paper);border:1px solid var(--line);border-radius:16px;overflow:hidden}
  .ach .ph{height:170px}
  .ach-body{padding:18px}
  .tag{font-size:10.5px;font-weight:700;color:var(--blue);background:var(--blue-light);padding:4px 9px;border-radius:6px}
  .ach-body h3{font-size:15px;font-weight:800;color:var(--navy);margin:12px 0 6px}
  .ach-body p{font-size:12.5px;color:var(--muted);margin:0}
  @media (max-width:900px){.ach-grid{grid-template-columns:1fr}}

  .gal-tabs{display:flex;gap:8px;margin:18px 0 24px;flex-wrap:wrap}
  .gal-tabs .t{font-size:13px;font-weight:700;padding:8px 16px;border-radius:999px;background:var(--paper);border:1px solid var(--line);color:var(--navy-2)}
  .gal-tabs .t.on{background:var(--navy);color:#fff;border-color:var(--navy)}
  .gal-grid{display:grid;grid-template-columns:1.4fr 1fr;gap:16px}
  .gal-left .ph{height:410px;border-radius:16px}
  .gal-left .cap{margin-top:10px}
  .gal-right{display:grid;grid-template-rows:1fr 1fr;gap:16px}
  .gal-right .ph{height:197px;border-radius:16px}
  .gal-bottom{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-top:16px}
  .gal-bottom .ph{height:150px;border-radius:16px}
  .cap{font-size:13.5px;font-weight:700;color:var(--navy)}
  .cap-sub{font-size:12px;color:var(--muted)}
  @media (max-width:900px){.gal-grid{grid-template-columns:1fr}.gal-bottom{grid-template-columns:1fr}}

  .cta{background:var(--navy);border-radius:24px;padding:56px 48px;color:#fff;position:relative;overflow:hidden}
  .cta h2{font-size:28px;font-weight:800;max-width:18ch;margin:0 0 16px}
  .cta p{color:#B9C6DA;max-width:60ch;font-size:14.5px;margin-bottom:26px}

  footer{background:var(--navy);color:#B9C6DA;padding:48px 0 22px;font-size:13.5px}
  .foot-grid{display:grid;grid-template-columns:1.6fr 1fr 1fr 1.2fr;gap:32px;padding-bottom:32px;border-bottom:1px solid rgba(255,255,255,.12)}
  .foot-grid h4{color:#fff;font-size:13px;margin:0 0 14px}
  .foot-grid ul{list-style:none;padding:0;margin:0}
  .foot-grid li{margin-bottom:10px}
  .foot-bottom{display:flex;justify-content:space-between;padding-top:20px;flex-wrap:wrap;gap:10px;font-size:12.5px}
  @media (max-width:900px){.foot-grid{grid-template-columns:1fr 1fr}}
</style>
</head>
<body>

<header>
  <div class="nav wrap">
    <div class="brand">
      <div class="mark">SPN</div>
      <div>
        <div class="name">SMP NEGERI 1 LOCERET</div>
        <div class="sub">Loceret, Nganjuk, Jawa Timur</div>
      </div>
    </div>
    <nav class="navlinks">
      <a href="#" class="active">Beranda</a>
      <a href="#">Profil</a>
      <a href="#">Akademik</a>
      <a href="#">Galeri</a>
      <a href="#">Kontak</a>
    </nav>
    <div class="navactions">
      <span aria-hidden="true">🔍</span>
      <a href="#" class="btn btn-navy">Hubungi Kami</a>
    </div>
  </div>
</header>

<main class="wrap">

  <section class="hero" style="padding-bottom:0">
    <div class="hero-grid">
      <div>
        <span class="eyebrow"><i></i>SELAMAT DATANG DI PORTAL RESMI</span>
        <h1 class="title">SMP NEGERI 1<br>LOCERET<span class="badge-inline">KAB. NGANJUK</span></h1>
        <p class="lede">Mewujudkan Generasi Berkarakter, Berprestasi, dan Berwawasan Masa Depan melalui ekosistem pendidikan berkarakter Pancasila yang adaptif dan inklusif.</p>
        <div class="hero-ctas">
          <a href="#" class="btn btn-navy">Jelajahi Profil →</a>
          <a href="#" class="btn btn-outline">🏆 Lihat Prestasi</a>
        </div>
        <div class="accreds">
          <span>✅ Terakreditasi B (Baik)</span>
          <span># NPSN: 20538363</span>
        </div>
      </div>
      <div class="ph hero-photo"><span>Foto siswa &amp; gedung sekolah</span></div>
    </div>
  </section>

  <section style="padding:28px 0 0">
    <div class="stats">
      <div class="stat"><div class="ico">👥</div><div><div class="num">17+</div><div class="lbl">Pendidik &amp; Tenaga<br>Tersertifikasi &amp; Dedikatif</div></div></div>
      <div class="stat"><div class="ico">🎓</div><div><div class="num">299+</div><div class="lbl">Peserta Didik Aktif<br>Kelas VII, VIII, &amp; IX</div></div></div>
      <div class="stat"><div class="ico">🏅</div><div><div class="num">45+</div><div class="lbl">Prestasi Kejuaraan<br>Kabupaten s/d Nasional</div></div></div>
      <div class="stat"><div class="ico">🏫</div><div><div class="num">1979</div><div class="lbl">Tahun Berdiri<br>45+ Tahun Mengabdi</div></div></div>
    </div>
  </section>

  <section>
    <div class="feat-grid">
      <div>
        <h2 style="font-size:28px;font-weight:800;color:var(--navy);max-width:14ch;margin:0 0 14px">Membangun Generasi Unggul untuk Masa Depan Gemilang</h2>
        <p style="color:var(--muted);font-size:14.5px">Kami berkomitmen memberikan pendidikan terbaik secara komprehensif melalui pembelajaran berbasis teknologi, penanaman adab luhur, dan sarana pengembangan minat bakat peserta didik.</p>
        <ul class="checklist">
          <li><span class="c">✓</span>Penerapan Kurikulum Merdeka yang Adaptif</li>
          <li><span class="c">✓</span>Ekosistem Sekolah Ramah Anak &amp; Anti-Perundungan</li>
          <li><span class="c">✓</span>Program Digitalisasi Kelas &amp; Literasi Perpustakaan</li>
        </ul>
        <a href="#" class="link-more">Pelajari Profil &amp; Sejarah Selengkapnya →</a>
      </div>
      <div class="cards2">
        <div class="card"><div class="ico2">📘</div><h3>Pendidikan Berkualitas</h3><p>Integrasi materi kurikulum nasional yang diperkuat proyek Profil Pelajar Pancasila, pemikiran kritis, dan akhlak mulia.</p><span class="go">Kurikulum Terpadu ›</span></div>
        <div class="card"><div class="ico2">🎯</div><h3>Guru Profesional</h3><p>Tenaga pendidik berdedikasi tinggi, mayoritas tersertifikasi pendidik profesional, inovatif dalam media digital dan peduli siswa.</p><span class="go">Dewan Guru Unggul ›</span></div>
        <div class="card"><div class="ico2">🏢</div><h3>Lingkungan Nyaman</h3><p>Ruang kelas representatif ber-LCD, laboratorium IPA &amp; Komputer mutakhir, perpustakaan digital, sarana olahraga, dan taman asri.</p><span class="go">Fasilitas Lengkap ›</span></div>
        <div class="card"><div class="ico2">🎨</div><h3>Bakat &amp; Ekstrakurikuler</h3><p>Wadah pembinaan bakat beragam dari Pramuka inti, marching band, futsal, voli, paduan suara, robotik, hingga KIR sains.</p><span class="go">18+ Pilihan Ekskul ›</span></div>
      </div>
    </div>
  </section>

  <section>
    <div class="about">
      <div class="about-grid">
        <div class="ph about-photo"><span>Foto gedung sekolah</span></div>
        <div class="about-copy">
          <h2>SMP Negeri 1 Loceret: Wahana Cendekia Berpijak pada Karakter</h2>
          <p>SMP Negeri 1 Loceret merupakan satuan pendidikan formal tingkat menengah pertama terkemuka di wilayah selatan Kabupaten Nganjuk. Kami berkomitmen menyelenggarakan pembelajaran berpusat pada murid, mengembangkan rasa ingin tahu ilmiah, memperkuat kearifan lokal Jawa Timur, dan menempa kepribadian mandiri yang tangguh menghadapi era globalisasi.</p>
          <a href="#" class="btn btn-navy">Selengkapnya Tentang Sekolah</a>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="ach-head">
      <div>
        <h2 style="font-size:26px;font-weight:800;color:var(--navy);margin:0 0 8px">Prestasi Terbaru Generasi Emas Loceret</h2>
        <p style="color:var(--muted);font-size:14.5px;max-width:50ch">Apresiasi nyata atas kerja keras, bimbingan para guru pembina, dan semangat pantang menyerah anak-anak didik kami.</p>
      </div>
      <a href="#" class="link-more">Lihat Semua Rekam Prestasi ›</a>
    </div>
    <div class="ach-grid">
      <div class="ach">
        <div class="ph"><span>Olimpiade Sains (OSN)</span></div>
        <div class="ach-body"><span class="tag">TINGKAT PROVINSI JAWA TIMUR</span><h3>Juara 1 Olimpiade Sains Matematika &amp; IPA Terpadu</h3><p>Diraih oleh ananda tim KIR SMPN 1 Loceret setelah melalui babak seleksi ketat teori dan eksperimen...</p></div>
      </div>
      <div class="ach">
        <div class="ph"><span>Olahraga &amp; O2SN</span></div>
        <div class="ach-body"><span class="tag">TINGKAT KABUPATEN NGANJUK</span><h3>Juara Umum Turnamen Bola Voli Putra &amp; Putri</h3><p>Regu putra dan putri SMPN 1 Loceret berhasil memboyong piala bergilir setelah melewati laga...</p></div>
      </div>
      <div class="ach">
        <div class="ph"><span>Festival Seni (FLS2N)</span></div>
        <div class="ach-body"><span class="tag">TINGKAT KARESIDENAN KEDIRI</span><h3>Pemenang Terbaik Tari Kreasi Tradisional</h3><p>Penampilan sanggar seni SMPN 1 Loceret mengangkat nilai kearifan sejarah lokal Nganjuk...</p></div>
      </div>
    </div>
  </section>

  <section>
    <h2 style="font-size:26px;font-weight:800;color:var(--navy);margin:0 0 8px">Galeri Dinamika Sekolah</h2>
    <p style="color:var(--muted);font-size:14.5px;max-width:60ch">Dokumentasi ragam aktivitas belajar mengajar, kedisiplinan upacara, kepramukaan, dan kecerian civitas akademika.</p>
    <div class="gal-tabs">
      <span class="t on">Semua</span><span class="t">Pembelajaran</span><span class="t">Ekstrakurikuler</span><span class="t">Upacara Bendera</span>
    </div>
    <div class="gal-grid">
      <div class="gal-left">
        <div class="ph"><span>Praktik Laboratorium IPA</span></div>
        <div class="cap" style="margin-top:12px">Pembelajaran Berbasis Riset &amp; Eksperimen Mandiri</div>
        <div class="cap-sub">Eksplorasi mikrobiologi siswa kelas VIII di laboratorium multimedia modern.</div>
      </div>
      <div class="gal-right">
        <div class="ph"><span>Upacara Hari Pramuka</span></div>
        <div class="ph"><span>Harmoni Gita Spensalo — Marching Band</span></div>
      </div>
    </div>
    <div class="gal-bottom">
      <div class="ph"><span>Gerakan Literasi 15 Menit</span></div>
      <div class="ph"><span>Aksi Kebun Sekolah &amp; Kompos</span></div>
      <div class="ph"><span>Asesmen Interaktif Berbasis Digital</span></div>
    </div>
  </section>

  <section>
    <div class="cta">
      <h2>Kenali Lebih Dekat SMP Negeri 1 Loceret</h2>
      <p>Temukan informasi lengkap mengenai kurikulum pembelajaran, fasilitas sekolah, prestasi peserta didik, serta alur pendaftaran siswa baru (PPDB). Pintu kami senantiasa terbuka untuk menyambut calon pemimpin masa depan bangsa.</p>
      <a href="#" class="btn btn-lime">📞 Hubungi Kami Sekarang</a>
    </div>
  </section>

</main>

<footer>
  <div class="wrap">
    <div class="foot-grid">
      <div>
        <div class="brand" style="margin-bottom:12px">
          <div class="mark">SPN</div>
          <div style="color:#fff;font-weight:800;font-size:14px">SMP NEGERI 1 LOCERET</div>
        </div>
        <p style="max-width:32ch">Lembaga pendidikan formal tingkat menengah pertama yang berorientasi pada integritas moral, prestasi akademik bermutu, kedisiplinan berkarakter Pancasila, serta kesiapan kompetensi digital abad 21.</p>
      </div>
      <div>
        <h4>NAVIGASI CEPAT</h4>
        <ul><li>Beranda</li><li>Profil Sekolah</li><li>Akademik</li><li>Hubungi Kami</li></ul>
      </div>
      <div>
        <h4>LAYANAN &amp; INFO</h4>
        <ul><li>Pengumuman Resmi</li><li>Portal Siswa</li><li>Fasilitas Sekolah</li></ul>
      </div>
      <div>
        <h4>KONTAK RESMI</h4>
        <ul><li>Kabupaten Nganjuk, Jawa Timur</li><li>+62 857 3222 2727</li><li>Senin – Jumat: 07:00 – 15:30 WIB</li></ul>
      </div>
    </div>
    <div class="foot-bottom">
      <span>© 2026 SMP Negeri 1 Loceret. All Rights Reserved.</span>
      <span>Kebijakan Privasi &nbsp; Syarat &amp; Ketentuan &nbsp; Peta Situs</span>
    </div>
  </div>
</footer>

</body>
</html>