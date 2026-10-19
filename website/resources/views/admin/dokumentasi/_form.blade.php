@php
    $fotoAwal = $dokumentasi?->foto_url;
@endphp

<div class="form-sempit">
<form method="POST" action="{{ $action }}" enctype="multipart/form-data" class="form-kartu" id="formDokumentasi" novalidate>
  @csrf
  @if (!empty($method))
    @method($method)
  @endif

  {{-- JUDUL --}}
  <div class="f-grup">
    <label for="judul" class="f-label">Judul Kegiatan <span class="req">*</span></label>
    <input type="text" id="judul" name="judul"
           class="f-input f-isi {{ $errors->has('judul') ? 'is-error' : '' }}"
           value="{{ old('judul', $dokumentasi?->judul) }}"
           placeholder="Contoh: Upacara Peringatan HUT Kemerdekaan RI Ke-81"
           maxlength="150" autocomplete="off">
    @error('judul')
      <p class="f-error">{{ $message }}</p>
    @enderror
  </div>

  {{-- TANGGAL & KATEGORI --}}
  <div class="f-baris">
    <div class="f-grup">
      <label for="tanggal" class="f-label">Tanggal Pelaksanaan <span class="req">*</span></label>
      <input type="date" id="tanggal" name="tanggal"
             class="f-input f-isi {{ $errors->has('tanggal') ? 'is-error' : '' }}"
             value="{{ old('tanggal', $dokumentasi?->tanggal?->format('Y-m-d')) }}"
             max="{{ now()->format('Y-m-d') }}">
      @error('tanggal')
        <p class="f-error">{{ $message }}</p>
      @enderror
    </div>

    <div class="f-grup">
      <label for="kategori" class="f-label">Kategori Kegiatan <span class="req">*</span></label>
      <select id="kategori" name="kategori" class="f-input f-isi {{ $errors->has('kategori') ? 'is-error' : '' }}">
        <option value="">-- Pilih Kategori --</option>
        @foreach ($kategori as $slug => $k)
          <option value="{{ $slug }}" @selected(old('kategori', $dokumentasi?->kategori) === $slug)>{{ $k['label'] }}</option>
        @endforeach
      </select>
      @error('kategori')
        <p class="f-error">{{ $message }}</p>
      @enderror
    </div>
  </div>

  {{-- FOTO --}}
  <div class="f-grup">
    <span class="f-label">Foto Dokumentasi @if (!$dokumentasi)<span class="req">*</span>@endif</span>

    <label for="foto" class="dropzone {{ $errors->has('foto') ? 'is-error' : '' }}" id="dropzone">
      <input type="file" id="foto" name="foto" accept="image/jpeg,image/png" class="sr-only">

      <div class="dz-kosong" id="dzKosong" @if ($fotoAwal) hidden @endif>
        <span class="dz-ikon">
          <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M16 5h6"/><path d="M19 2v6"/><path d="M21 11.5V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7.5"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/><circle cx="9" cy="9" r="2"/></svg>
        </span>
        <strong>Klik atau seret foto ke sini</strong>
        <small>Mendukung JPG, JPEG, PNG (Maks 5 MB)</small>
      </div>

      <div class="dz-pratinjau" id="dzPratinjau" @if (!$fotoAwal) hidden @endif>
        <img id="dzGambar" @if ($fotoAwal) src="{{ $fotoAwal }}" @endif alt="Pratinjau foto">
        <span class="dz-nama" id="dzNama">{{ $fotoAwal ? 'Foto saat ini' : '' }}</span>
        <small>Klik atau seret foto lain untuk mengganti</small>
      </div>
    </label>

    <p class="f-error" id="fotoPesan">{{ $errors->first('foto') }}</p>
  </div>

  {{-- DESKRIPSI --}}
  <div class="f-grup">
    <div class="f-label-baris">
      <label for="deskripsi" class="f-label">Deskripsi Singkat Kegiatan</label>
      <span class="f-hitung" id="deskripsiHitung">0 / 1.000 karakter</span>
    </div>
    <textarea id="deskripsi" name="deskripsi" rows="4" maxlength="1000"
              class="f-input f-isi f-area {{ $errors->has('deskripsi') ? 'is-error' : '' }}"
              placeholder="Tulis ringkasan kegiatan, tempat, dan peserta yang terlibat...">{{ old('deskripsi', $dokumentasi?->deskripsi) }}</textarea>
    @error('deskripsi')
      <p class="f-error">{{ $message }}</p>
    @enderror
  </div>

  <div class="f-aksi">
    <a href="{{ route('admin.dokumentasi.index') }}" class="btn-batal">Batal</a>
    <button type="submit" class="btn-simpan">
      <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M15.2 3a2 2 0 0 1 1.4.6l3.8 3.8a2 2 0 0 1 .6 1.4V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"/><path d="M17 21v-7a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v7"/><path d="M7 3v4a1 1 0 0 0 1 1h7"/></svg>
      <span class="btn-teks">{{ $teksSimpan }}</span>
    </button>
  </div>
</form>
</div>

@push('scripts')
<script>
  (function () {
    const MAKS = 5 * 1024 * 1024;

    const form      = document.getElementById('formDokumentasi');
    const input     = document.getElementById('foto');
    const zona      = document.getElementById('dropzone');
    const kosong    = document.getElementById('dzKosong');
    const pratinjau = document.getElementById('dzPratinjau');
    const gambar    = document.getElementById('dzGambar');
    const nama      = document.getElementById('dzNama');
    const pesan     = document.getElementById('fotoPesan');

    const srcAwal  = gambar.getAttribute('src') || '';
    const namaAwal = nama.textContent;
    let urlObjek = null;

    function kembaliAwal() {
      input.value = '';
      if (urlObjek) { URL.revokeObjectURL(urlObjek); urlObjek = null; }

      if (srcAwal) {
        gambar.src = srcAwal;
        nama.textContent = namaAwal;
        kosong.hidden = true;
        pratinjau.hidden = false;
      } else {
        gambar.removeAttribute('src');
        nama.textContent = '';
        kosong.hidden = false;
        pratinjau.hidden = true;
      }
    }

    function periksa(file) {
      if (!['image/jpeg', 'image/png'].includes(file.type)) return 'Format foto harus JPG, JPEG, atau PNG.';
      if (file.size > MAKS) return 'Ukuran foto maksimal 5 MB.';
      return '';
    }

    function tampilkan() {
      pesan.textContent = '';
      zona.classList.remove('is-error');

      const file = input.files[0];
      if (!file) { kembaliAwal(); return; }

      const salah = periksa(file);
      if (salah) {
        kembaliAwal();
        pesan.textContent = salah;
        zona.classList.add('is-error');
        return;
      }

      if (urlObjek) URL.revokeObjectURL(urlObjek);
      urlObjek = URL.createObjectURL(file);
      gambar.src = urlObjek;
      nama.textContent = file.name + ' (' + (file.size / 1024 / 1024).toFixed(2) + ' MB)';
      kosong.hidden = true;
      pratinjau.hidden = false;
    }

    input.addEventListener('change', tampilkan);

    // Seret & lepas
    ['dragenter', 'dragover'].forEach(function (ev) {
      zona.addEventListener(ev, function (e) { e.preventDefault(); zona.classList.add('is-drag'); });
    });
    ['dragleave', 'drop'].forEach(function (ev) {
      zona.addEventListener(ev, function (e) { e.preventDefault(); zona.classList.remove('is-drag'); });
    });
    zona.addEventListener('drop', function (e) {
      const files = e.dataTransfer.files;
      if (!files.length) return;

      // Ambil satu file saja, karena form ini hanya menerima satu foto
      const dt = new DataTransfer();
      dt.items.add(files[0]);
      input.files = dt.files;
      tampilkan();
    });

    // Penghitung karakter deskripsi
    const area   = document.getElementById('deskripsi');
    const hitung = document.getElementById('deskripsiHitung');
    function perbaruiHitung() {
      hitung.textContent = area.value.length.toLocaleString('id-ID') + ' / 1.000 karakter';
    }
    area.addEventListener('input', perbaruiHitung);
    perbaruiHitung();

    // Cegah klik ganda saat foto sedang diunggah
    form.addEventListener('submit', function () {
      const tombol = form.querySelector('.btn-simpan');
      tombol.disabled = true;
      tombol.querySelector('.btn-teks').textContent = 'Menyimpan...';
    });
  })();
</script>
@endpush