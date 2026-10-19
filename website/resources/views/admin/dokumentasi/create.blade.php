@extends('layouts.admin')

@section('judul', 'Tambah Dokumentasi')

@section('konten')
<div class="dok-kepala">
  <span class="judul-ikon">
    <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M16 5h6"/><path d="M19 2v6"/><path d="M21 11.5V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7.5"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/><circle cx="9" cy="9" r="2"/></svg>
  </span>
  <div class="dok-kepala-teks">
    <h1 class="halaman-judul">Tambah Dokumentasi Baru</h1>
    <p class="halaman-sub">Unggah foto dan lengkapi rincian kegiatan sekolah untuk arsip resmi dan publikasi website.</p>
  </div>
  <a href="{{ route('admin.dokumentasi.index') }}" class="btn-kembali">
    <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>
    Kembali ke Daftar
  </a>
</div>

@include('admin.dokumentasi._form', [
    'dokumentasi' => null,
    'action'      => route('admin.dokumentasi.store'),
    'method'      => null,
    'teksSimpan'  => 'Simpan Dokumentasi',
])
@endsection