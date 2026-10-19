@extends('layouts.admin')

@section('judul', 'Dokumentasi Kegiatan')

@section('konten')
<div class="dok-kepala">
  <div class="dok-kepala-teks">
    <h1 class="halaman-judul">Dokumentasi Kegiatan Sekolah</h1>
    <p class="halaman-sub">Daftar sementara. Tampilan kartu sesuai desain dibuat di langkah berikutnya.</p>
  </div>
  <a href="{{ route('admin.dokumentasi.create') }}" class="btn btn-primer">+ Tambah Dokumentasi</a>
</div>

<section class="kartu" style="padding: 20px;">
  @forelse ($dokumentasi as $d)
    <div style="display:flex; align-items:center; gap:14px; padding:10px 0; border-bottom:1px solid var(--line);">
      <img src="{{ $d->foto_url }}" alt="" style="width:72px; height:54px; object-fit:cover; border-radius:8px;">
      <div>
        <strong>{{ $d->judul }}</strong><br>
        <small>{{ $d->tanggal_indo }} · {{ $d->badge }}</small>
      </div>
    </div>
  @empty
    <p class="kosong">Belum ada dokumentasi.</p>
  @endforelse
</section>
@endsection