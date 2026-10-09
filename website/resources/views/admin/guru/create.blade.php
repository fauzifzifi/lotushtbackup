@extends('layouts.admin')

@section('judul', 'Tambah Data Guru')

@section('konten')
<div class="form-halaman">
  <div class="form-kepala">
    <div>
      <h1 class="halaman-judul">Tambah Data Guru</h1>
      <p class="halaman-sub">Lengkapi data pokok guru & GTK untuk publikasi SIMAS SMPN 1 Loceret.</p>
    </div>
    <a href="{{ route('admin.guru.index') }}" class="btn-kembali">
      <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>
      Kembali
    </a>
  </div>

  @include('admin.guru._form', [
      'guru'       => null,
      'action'     => route('admin.guru.store'),
      'method'     => null,
      'teksSimpan' => '+ Simpan Data Guru',
  ])
</div>
@endsection