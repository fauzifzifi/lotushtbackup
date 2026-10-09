<header class="nb" id="nbHeader">
  <div class="nb-bar">

    <a href="{{ route('beranda') }}" class="nb-brand">
      <img src="{{ asset('images/logo.png') }}" alt="Logo SMP Negeri 1 Loceret">
      <div>
        <div class="nb-nama">SMP NEGERI 1 LOCERET</div>
        <div class="nb-sub">Loceret, Nganjuk, Jawa Timur</div>
      </div>
    </a>

    <ul class="nb-menu">
      <li>
        <a href="{{ route('beranda') }}" class="nb-link {{ request()->routeIs('beranda') ? 'aktif' : '' }}">Beranda</a>
      </li>

      <li>
        <a href="{{ route('profil') }}" class="nb-link {{ request()->routeIs('profil') ? 'aktif' : '' }}">Profil
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
        </a>
        <ul class="nb-drop">
          <li><a href="{{ route('profil') }}#visi-misi">Visi &amp; Misi</a></li>
          <li><a href="{{ route('profil') }}#identitas">Identitas &amp; Lambang</a></li>
          <li><a href="{{ route('profil') }}#sejarah">Sejarah Sekolah</a></li>
        </ul>
      </li>

      <li>
        <a href="{{ route('akademik') }}" class="nb-link {{ request()->routeIs('akademik') ? 'aktif' : '' }}">Akademik
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
        </a>
        <ul class="nb-drop">
          <li><a href="{{ route('akademik') }}#guru">Data Guru &amp; Tenaga Pendidik</a></li>
          <li><a href="{{ route('akademik') }}#statistik">Statistik Data Siswa</a></li>
          <li><a href="{{ route('akademik') }}#prestasi">Direktori Prestasi</a></li>
        </ul>
      </li>

      <li>
        <a href="{{ route('galeri') }}" class="nb-link {{ request()->routeIs('galeri') ? 'aktif' : '' }}">Galeri
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
        </a>
        <ul class="nb-drop">
          <li><a href="{{ route('galeri') }}#foto">Foto Kegiatan</a></li>
          <li><a href="{{ route('galeri') }}#video">Video Terkini</a></li>
        </ul>
      </li>

      <li><a href="{{ route('kontak') }}" class="nb-link {{ request()->routeIs('kontak') ? 'aktif' : '' }}">Kontak</a></li>
    </ul>

    <div class="nb-aksi">

      {{-- Pencarian: melebar di tempat saat ikon diklik --}}
      <form action="{{ route('cari') }}" method="GET" role="search" class="nb-cari-form" id="nbCariForm">
        <input type="search" name="q" id="nbCariInput" placeholder="Cari di website..." minlength="2" autocomplete="off" aria-label="Kata kunci pencarian" tabindex="-1">
        <button type="button" class="nb-cari" id="nbCariBtn" aria-label="Cari" aria-expanded="false">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg>
        </button>
      </form>

      <a href="#" class="nb-user" aria-label="Masuk">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 4-6 8-6s8 2 8 6"/></svg>
      </a>
    </div>

  </div>
</header>

<script>
  (function () {
    var header = document.getElementById('nbHeader');
    var form   = document.getElementById('nbCariForm');
    var input  = document.getElementById('nbCariInput');
    var btn    = document.getElementById('nbCariBtn');

    function buka() {
      form.classList.add('buka');
      header.classList.add('cari-aktif');
      btn.setAttribute('aria-expanded', 'true');
      input.tabIndex = 0;
      setTimeout(function () { input.focus(); }, 150);
    }

    function tutup() {
      form.classList.remove('buka');
      header.classList.remove('cari-aktif');
      btn.setAttribute('aria-expanded', 'false');
      input.tabIndex = -1;
      input.blur();
    }

    btn.addEventListener('click', function () {
      if (!form.classList.contains('buka')) {
        buka();
      } else if (input.value.trim().length >= 2) {
        form.submit();
      } else {
        tutup();
      }
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') tutup();
    });

    document.addEventListener('click', function (e) {
      if (!form.contains(e.target)) tutup();
    });
  })();
</script>