@extends('layouts.public')

@section('judul', 'SMP Negeri 1 Loceret - Hasil Pencarian')

@section('konten')
<main class="wrap" style="padding:60px 0 80px; min-height:60vh;">
  <h1 style="color:#0f2a5f; margin-bottom:8px;">Hasil Pencarian</h1>

  @if ($q === '' || mb_strlen($q) < 2)
    <p>Ketik minimal 2 huruf pada kotak pencarian.</p>
  @else
    <p style="margin-bottom:24px;">Kata kunci: <strong>{{ $q }}</strong> ({{ count($hasil) }} hasil)</p>

    @forelse ($hasil as $h)
      <a href="{{ $h['url'] }}" style="display:block; background:#fff; border-radius:16px; padding:20px 24px; margin-bottom:14px; box-shadow:0 4px 16px rgba(15,42,95,.08); text-decoration:none;">
        <h3 style="color:#0f2a5f; margin:0 0 6px;">{{ $h['judul'] }}</h3>
        <p style="color:#555; margin:0;">{{ $h['isi'] }}</p>
      </a>
    @empty
      <p>Tidak ada hasil yang cocok. Coba kata kunci lain, misalnya "prestasi", "profil", atau "kontak".</p>
    @endforelse
  @endif
</main>
@endsection