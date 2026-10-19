@extends('layouts.admin')

@section('judul', 'Data Guru')

@section('konten')
@php
    $tautan = fn ($nama, $param = []) => \Illuminate\Support\Facades\Route::has($nama) ? route($nama, $param) : '#';
    $adaFilter = $q !== '' || $mapel !== '';
@endphp

{{-- Kepala halaman --}}
<section class="kartu kepala-halaman">
  <div>
    <h1 class="halaman-judul">Data Guru & Tenaga Pendidik</h1>
    <p class="halaman-sub">Kelola informasi guru dan tenaga pendidik SMP Negeri 1 Loceret secara ringkas, terstruktur, dan terpadu.</p>
  </div>
  <div class="kepala-aksi">
    <button type="button" class="btn btn-garis" disabled title="Segera hadir">
      <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
      Unduh Data (Excel/PDF)
    </button>
    <a href="{{ $tautan('admin.guru.create') }}" class="btn btn-primer">
      <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
      + Tambah Guru
    </a>
  </div>
</section>

{{-- Pencarian & filter --}}
<form method="GET" action="{{ route('admin.guru.index') }}" class="kartu toolbar" id="formCariGuru">
  <label class="cari">
    <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
    <input type="search" name="q" value="{{ $q }}" placeholder="Cari nama guru atau mata pelajaran..." aria-label="Cari guru">
  </label>

  <div class="filter">
    <span class="filter-label">
      <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 6h18"/><path d="M7 12h10"/><path d="M10 18h4"/></svg>
      Filter:
    </span>
    <select name="mapel" aria-label="Filter mata pelajaran">
      <option value="">Semua Mapel</option>
      @foreach ($daftarMapel as $m)
        <option value="{{ $m }}" @selected($m === $mapel)>{{ $m }}</option>
      @endforeach
    </select>
    <a href="{{ route('admin.guru.index') }}" class="reset" id="resetGuru" aria-label="Atur ulang pencarian" title="Atur ulang">
      <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/></svg>
    </a>
  </div>
</form>

{{-- Tabel --}}
<section class="kartu tabel-kartu" id="hasilGuru">
  <div class="tabel-scroll">
    <table class="tabel">
      <thead>
        <tr>
          <th class="kol-no">No.</th>
          <th>Guru & Tenaga Pendidik</th>
          <th>Mata Pelajaran</th>
          <th class="kol-aksi">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($guru as $g)
          <tr>
            <td class="kol-no">{{ str_pad($guru->firstItem() + $loop->index, 2, '0', STR_PAD_LEFT) }}</td>
            <td>
              <div class="guru-sel">
                @if ($g->foto_url)
                  <img class="avatar" src="{{ $g->foto_url }}" alt="Foto {{ $g->nama }}" loading="lazy">
                @else
                  <span class="avatar avatar--inisial" aria-hidden="true">{{ mb_strtoupper(mb_substr($g->nama, 0, 1)) }}</span>
                @endif
                <strong>{{ $g->nama }}</strong>
              </div>
            </td>
            <td><span class="pil">{{ $g->mapel }}</span></td>
            <td class="kol-aksi">
              <div class="aksi">
                <button type="button" class="aksi-link aksi-lihat"
                        data-nama="{{ $g->nama }}"
                        data-mapel="{{ $g->mapel }}"
                        data-foto="{{ $g->foto_url }}"
                        data-tanggal="{{ $g->created_at?->locale('id')->translatedFormat('d F Y') }}"
                        data-edit="{{ route('admin.guru.edit', $g) }}">
                  <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                  Lihat
                </button>
                <a href="{{ $tautan('admin.guru.edit', $g) }}" class="aksi-link">
                  <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/></svg>
                  Edit
                </a>
                <button type="button" class="aksi-hapus" data-url="{{ route('admin.guru.destroy', $g) }}" data-nama="{{ $g->nama }}" aria-label="Hapus {{ $g->nama }}" title="Hapus">
                  <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                </button>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="4" class="kosong">
              {{ $adaFilter ? 'Tidak ada guru yang cocok dengan pencarian atau filter Anda.' : 'Belum ada data guru. Klik "Tambah Guru" untuk menambahkan.' }}
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="tabel-foot">
    <p>
      @if ($guru->total() > 0)
        Menampilkan <strong>{{ $guru->firstItem() }}–{{ $guru->lastItem() }}</strong> dari <strong>{{ $guru->total() }}</strong> guru dan tenaga kependidikan
      @else
        Tidak ada data untuk ditampilkan
      @endif
    </p>
    {{ $guru->links('partials.admin.pagination') }}
  </div>
</section>

{{-- Popup konfirmasi hapus --}}
<div class="modal" id="modalHapus">
  <div class="modal-latar" data-tutup></div>
  <div class="modal-kotak" role="dialog" aria-modal="true" aria-labelledby="modalJudul">
    <span class="modal-ikon">
      <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
    </span>
    <h2 id="modalJudul">Hapus Data Guru?</h2>
    <p>Data <strong id="modalNama"></strong> beserta fotonya akan dihapus permanen dan tidak bisa dikembalikan.</p>
    <form method="POST" id="formHapus">
      @csrf
      @method('DELETE')
      <div class="modal-aksi">
        <button type="button" class="btn-batal" id="modalBatal" data-tutup>Batal</button>
        <button type="submit" class="btn-hapus">Ya, Hapus</button>
      </div>
    </form>
  </div>
</div>

{{-- Popup detail guru --}}
<div class="modal" id="modalLihat">
  <div class="modal-latar" data-tutup></div>
  <div class="modal-kotak modal-detail" role="dialog" aria-modal="true" aria-labelledby="lihatNama">
    <button type="button" class="modal-x" aria-label="Tutup" data-tutup>&times;</button>
    <div class="detail-foto" id="lihatFoto"></div>
    <h2 id="lihatNama"></h2>
    <span class="pil" id="lihatMapel"></span>
    <dl class="detail-meta">
      <div>
        <dt>Ditambahkan</dt>
        <dd id="lihatTanggal"></dd>
      </div>
    </dl>
  </div>
</div>
@endsection

@push('scripts')
<script>
  (function () {
    const body = document.body;

    // ============ POPUP (delegasi klik: tetap jalan setelah tabel diganti) ============
    const modalHapus = document.getElementById('modalHapus');
    const formHapus  = document.getElementById('formHapus');
    const namaHapus  = document.getElementById('modalNama');

    const modalLihat   = document.getElementById('modalLihat');
    const lihatFoto    = document.getElementById('lihatFoto');
    const lihatNama    = document.getElementById('lihatNama');
    const lihatMapel   = document.getElementById('lihatMapel');
    const lihatTanggal = document.getElementById('lihatTanggal');
    const lihatEdit    = document.getElementById('lihatEdit');

    function bukaModal(el) {
      el.classList.add('is-open');
      body.classList.add('modal-terbuka');
    }
    function tutupSemua() {
      document.querySelectorAll('.modal.is-open').forEach(m => m.classList.remove('is-open'));
      body.classList.remove('modal-terbuka');
    }

    document.addEventListener('click', (e) => {
      const hapus = e.target.closest('.aksi-hapus');
      if (hapus) {
        formHapus.action = hapus.dataset.url;
        namaHapus.textContent = hapus.dataset.nama;
        bukaModal(modalHapus);
        document.getElementById('modalBatal').focus();
        return;
      }

      const lihat = e.target.closest('.aksi-lihat');
      if (lihat) {
        const d = lihat.dataset;

        lihatFoto.innerHTML = '';
        if (d.foto) {
          const img = document.createElement('img');
          img.src = d.foto;
          img.alt = 'Foto ' + d.nama;
          lihatFoto.appendChild(img);
        } else {
          lihatFoto.textContent = d.nama.trim().charAt(0).toUpperCase();
        }

        lihatNama.textContent    = d.nama;
        lihatMapel.textContent   = d.mapel;
        lihatTanggal.textContent = d.tanggal || '-';
        lihatEdit.href           = d.edit;

        bukaModal(modalLihat);
        lihatEdit.focus();
        return;
      }

      if (e.target.closest('[data-tutup]')) tutupSemua();
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') tutupSemua();
    });

    // ============ PENCARIAN LANGSUNG ============
    const form  = document.getElementById('formCariGuru');
    const hasil = document.getElementById('hasilGuru');
    const input = form.querySelector('input[name="q"]');
    const pilih = form.querySelector('select[name="mapel"]');
    const reset = document.getElementById('resetGuru');
    let timer, kontrolTerakhir;

    function urlPencarian() {
      const p = new URLSearchParams(new FormData(form));
      for (const [k, v] of [...p]) if (v === '') p.delete(k);
      const qs = p.toString();
      return form.action + (qs ? '?' + qs : '');
    }

    async function muat(url) {
      if (kontrolTerakhir) kontrolTerakhir.abort();
      const saya = new AbortController();
      kontrolTerakhir = saya;
      hasil.classList.add('memuat');

      try {
        const res = await fetch(url, { signal: saya.signal });
        if (!res.ok) throw new Error('Status ' + res.status);

        const html = await res.text();
        const baru = new DOMParser().parseFromString(html, 'text/html').getElementById('hasilGuru');
        if (!baru) throw new Error('Bagian hasil tidak ditemukan');

        hasil.innerHTML = baru.innerHTML;
        history.replaceState(null, '', url);
      } catch (e) {
        if (e.name === 'AbortError') return;
        window.location.href = url;   // cadangan: muat halaman seperti biasa
      } finally {
        if (kontrolTerakhir === saya) hasil.classList.remove('memuat');
      }
    }

    input.addEventListener('input', () => {
      clearTimeout(timer);
      timer = setTimeout(() => muat(urlPencarian()), 300);
    });

    pilih.addEventListener('change', () => muat(urlPencarian()));

    form.addEventListener('submit', (e) => {
      e.preventDefault();
      clearTimeout(timer);
      muat(urlPencarian());
    });

    reset.addEventListener('click', (e) => {
      e.preventDefault();
      clearTimeout(timer);
      input.value = '';
      pilih.value = '';
      muat(urlPencarian());
    });

    hasil.addEventListener('click', (e) => {
      const a = e.target.closest('.pager a');
      if (!a) return;
      e.preventDefault();
      muat(a.href);
    });
  })();
</script>
@endpush