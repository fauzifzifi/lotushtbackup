@php
    $fotoAwal = $guru?->foto_url;
@endphp

<form method="POST" action="{{ $action }}" enctype="multipart/form-data" class="form-kartu" novalidate>
  @csrf
  @if (!empty($method))
    @method($method)
  @endif

  {{-- FOTO --}}
  <div class="f-grup">
    <span class="f-label">Foto Profil Guru <small>(Opsional)</small></span>
    <div class="unggah {{ $errors->has('foto') ? 'is-error' : '' }}">
      <div class="unggah-kotak" id="fotoKotak">
        @if ($fotoAwal)
          <img src="{{ $fotoAwal }}" alt="Foto saat ini">
        @else
          <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3z"/><circle cx="12" cy="13" r="3"/></svg>
          <span>3 × 4</span>
        @endif
      </div>
      <div class="unggah-info">
        <strong>Unggah Pasfoto Formal</strong>
        <p>Format JPG atau PNG, ukuran maksimal 2 MB dengan pencahayaan jelas.</p>
        <label for="foto" class="btn-pilih">
          <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
          Pilih Foto Guru
        </label>
        <input type="file" id="foto" name="foto" accept="image/jpeg,image/png" class="sr-only">
        <span class="unggah-nama" id="fotoNama"></span>
      </div>
    </div>
    <p class="f-error" id="fotoPesan">{{ $errors->first('foto') }}</p>
  </div>

  {{-- NAMA --}}
  <div class="f-grup">
    <label for="nama" class="f-label">Nama Lengkap & Gelar <span class="req">*</span></label>
    <input type="text" id="nama" name="nama"
           class="f-input {{ $errors->has('nama') ? 'is-error' : '' }}"
           value="{{ old('nama', $guru?->nama) }}"
           placeholder="misal: Dra. Hj. Sri Wahyuni, M.Pd."
           maxlength="150" autocomplete="off">
    @error('nama')
      <p class="f-error">{{ $message }}</p>
    @else
      <p class="f-bantu">Tulis nama lengkap beserta gelar akademik untuk buku profil dan sistem sekolah.</p>
    @enderror
  </div>

  {{-- MAPEL --}}
  <div class="f-grup">
    <label for="mapel" class="f-label">Mata Pelajaran <span class="req">*</span></label>
    <select id="mapel" name="mapel" class="f-input {{ $errors->has('mapel') ? 'is-error' : '' }}">
      <option value="">-- Pilih Mata Pelajaran --</option>
      @foreach ($daftarMapel as $m)
        <option value="{{ $m }}" @selected(old('mapel', $guru?->mapel) === $m)>{{ $m }}</option>
      @endforeach
    </select>
    @error('mapel')
      <p class="f-error">{{ $message }}</p>
    @enderror
  </div>

  <div class="f-aksi">
    <a href="{{ route('admin.guru.index') }}" class="btn-batal">Batal</a>
    <button type="submit" class="btn-simpan">
      <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" x2="19" y1="8" y2="14"/><line x1="22" x2="16" y1="11" y2="11"/></svg>
      {{ $teksSimpan }}
    </button>
  </div>
</form>

@push('scripts')
<script>
  (function () {
    const input = document.getElementById('foto');
    const kotak = document.getElementById('fotoKotak');
    const nama  = document.getElementById('fotoNama');
    const pesan = document.getElementById('fotoPesan');
    const awal  = kotak.innerHTML;
    const MAKS  = 2 * 1024 * 1024;

    function tolak(teks) {
      input.value = '';
      kotak.innerHTML = awal;
      nama.textContent = '';
      pesan.textContent = teks;
    }

    input.addEventListener('change', () => {
      pesan.textContent = '';
      const f = input.files[0];
      if (!f) { kotak.innerHTML = awal; nama.textContent = ''; return; }

      if (!['image/jpeg', 'image/png'].includes(f.type)) return tolak('Format foto harus JPG atau PNG.');
      if (f.size > MAKS) return tolak('Ukuran foto maksimal 2 MB.');

      const img = document.createElement('img');
      img.src = URL.createObjectURL(f);
      img.alt = 'Pratinjau foto';
      kotak.innerHTML = '';
      kotak.appendChild(img);
      nama.textContent = f.name;
    });
  })();
</script>
@endpush