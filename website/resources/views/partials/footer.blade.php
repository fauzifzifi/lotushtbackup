<footer class="ft">
  <div class="wrap">

    <div class="ft-grid">

      {{-- Kolom 1: identitas --}}
      <div>
        <div class="ft-brand">
          <img src="{{ asset('images/logo.png') }}" alt="Logo SMP Negeri 1 Loceret">
          <div>
            <div class="ft-nama">SMP NEGERI 1 LOCERET</div>
            <div class="ft-wilayah">Kabupaten Nganjuk, Jawa Timur</div>
          </div>
        </div>
        <p class="ft-desc">Lembaga pendidikan formal tingkat menengah pertama yang berorientasi pada integritas moral, prestasi akademis bermutu, kedisiplinan berkarakter Pancasila, serta kesiapan kompetensi digital abad 21.</p>

        <div class="ft-sosmed">
          <a href="https://youtube.com/@smpnegeri1loceret515?si=Eq_scAcqKn7ybEv_" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M23.5 6.2a3 3 0 0 0-2.1-2.1C19.5 3.6 12 3.6 12 3.6s-7.5 0-9.4.5A3 3 0 0 0 .5 6.2C0 8.1 0 12 0 12s0 3.9.5 5.8a3 3 0 0 0 2.1 2.1c1.9.5 9.4.5 9.4.5s7.5 0 9.4-.5a3 3 0 0 0 2.1-2.1c.5-1.9.5-5.8.5-5.8s0-3.9-.5-5.8zM9.6 15.6V8.4l6.2 3.6-6.2 3.6z"/></svg>
          </a>
          <a href="https://www.instagram.com/smpn1loceret?stkn=Mjl0aGN5eWY1eHM0" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor"/></svg>
          </a>
          <a href="https://www.facebook.com/profile.php?id=100064035042701" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.07C24 5.4 18.63 0 12 0S0 5.4 0 12.07C0 18.1 4.39 23.1 10.13 24v-8.44H7.08v-3.49h3.05V9.41c0-3.02 1.79-4.69 4.53-4.69 1.31 0 2.68.24 2.68.24v2.97h-1.51c-1.49 0-1.96.93-1.96 1.89v2.25h3.33l-.53 3.49h-2.8V24C19.61 23.1 24 18.1 24 12.07z"/></svg>
          </a>
          <a href="https://www.tiktok.com/@smpnegeri1.loceret?_r=1&_t=ZS-9ANSqflgrW0" target="_blank" rel="noopener noreferrer" aria-label="TikTok">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
          </a>
        </div>
      </div>

      {{-- Kolom 2: navigasi --}}
      <div>
        <h4>Navigasi Cepat</h4>
        <ul>
          <li><a href="{{ route('beranda') }}">Beranda</a></li>
          <li><a href="{{ route('profil') }}">Profil Sekolah</a></li>
          <li><a href="{{ route('akademik') }}">Akademik</a></li>
          <li><a href="{{ route('galeri') }}">Galeri &amp; Aktivitas</a></li>
          <li><a href="{{ route('kontak') }}">Hubungi Kami</a></li>
        </ul>
      </div>

      {{-- Kolom 3: layanan --}}
      <div>
        <h4>Layanan &amp; Info</h4>
        <ul>
          <li><a href="#">Pengumuman Resmi</a></li>
          <li><a href="#">Portal Siswa</a></li>
          <li><a href="#">Prestasi Siswa</a></li>
          <li><a href="#">Fasilitas Sekolah</a></li>
        </ul>
      </div>

      {{-- Kolom 4: kontak --}}
      <div>
        <h4>Kontak Resmi</h4>
        <ul class="ft-kontak">
          <li>
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21s-7-6.2-7-11a7 7 0 1 1 14 0c0 4.8-7 11-7 11z"/><circle cx="12" cy="10" r="2.5"/></svg>
            <span>Jl. Raya Kediri - Nganjuk No.303, Loceret, Godean, Kec. Loceret, Kab. Nganjuk, Jawa Timur 64471</span>
          </li>
          <li>
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2z"/></svg>
            <span>+62 857 3222 2727<br>+62 822 3367 1706</span>
          </li>
          <li>
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/></svg>
            <span>
              <a href="mailto:smpn1loceret84@gmail.com">smpn1loceret84@gmail.com</a><br>
              <a href="mailto:kurikulum.lotus@gmail.com">kurikulum.lotus@gmail.com</a>
            </span>
          </li>
          <li>
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
            <span>Senin - Jumat: 07:00 - 15:30 WIB</span>
          </li>
        </ul>
      </div>

    </div>

    {{-- Bar bawah --}}
    <div class="ft-bawah">
      <span>© {{ date('Y') }} SMP Negeri 1 Loceret. All Rights Reserved.</span>
      <nav>
        <a href="#">Kebijakan Privasi</a>
        <a href="#">Syarat &amp; Ketentuan</a>
        <a href="#">Peta Situs</a>
      </nav>
    </div>

  </div>
</footer>