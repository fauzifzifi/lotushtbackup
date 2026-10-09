@extends('layouts.auth')

@section('judul', 'Masuk')

@section('konten')
@php
    $gagalLogin = $errors->has('login');
    $emailError = $errors->has('email') || $gagalLogin;
    $passError  = $errors->has('password') || $gagalLogin;
    $dataKurang = ($errors->has('email') || $errors->has('password')) && ! $gagalLogin;
@endphp

<section class="login-card">
  <h1>Selamat Datang</h1>
  <p class="login-sub">Silakan masuk untuk mengakses Sistem Informasi Sekolah.</p>

  @if ($gagalLogin)
    <div class="alert-error" role="alert">
      <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3"/><path d="M12 9v4"/><path d="M12 17h.01"/></svg>
      <div>
        <strong>Kombinasi Akun Tidak Sesuai</strong>
        <p>Username/email atau kata sandi yang Anda masukkan tidak sesuai dengan data kami. Silakan periksa kembali ketikan huruf besar/kecil Anda.</p>
      </div>
    </div>
  @elseif ($dataKurang)
    <div class="alert-error" role="alert">
      <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
      <div>
        <strong>Data Belum Lengkap:</strong>
        <p>Perhatian: Harap lengkapi username/email dan password Anda sebelum menekan tombol Masuk.</p>
      </div>
    </div>
  @endif

  <form method="POST" action="{{ route('login.proses') }}" novalidate>
    @csrf

    {{-- USERNAME / EMAIL --}}
    <div class="field {{ $emailError ? 'is-error' : '' }}">
      <label for="email">Username / Email <span class="req">*</span></label>
      <div class="input-wrap">
        <svg class="ic ic-left" viewBox="0 0 24 24" aria-hidden="true"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        <input type="text" id="email" name="email" value="{{ old('email') }}"
               placeholder="Masukkan username atau email" autocomplete="username" autofocus>
        @if ($emailError)
          <svg class="ic ic-err" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
        @endif
      </div>
      @if ($errors->has('email'))
        <p class="field-msg">
          <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3"/><path d="M12 9v4"/><path d="M12 17h.01"/></svg>
          {{ $errors->first('email') }}
        </p>
      @endif
    </div>

    {{-- PASSWORD --}}
    <div class="field {{ $passError ? 'is-error' : '' }}">
      <label for="password">Password <span class="req">*</span></label>
      <div class="input-wrap">
        <svg class="ic ic-left" viewBox="0 0 24 24" aria-hidden="true"><rect width="18" height="11" x="3" y="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
        <input type="password" id="password" name="password"
               placeholder="Masukkan password" autocomplete="current-password">
        <button type="button" class="toggle-pass" id="togglePassword" aria-pressed="false">
          <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
          <span>Tampilkan</span>
        </button>
      </div>
      <div class="field-meta">
        @if ($gagalLogin)
          <p class="field-msg">Username atau password yang dimasukkan belum benar.</p>
        @elseif ($errors->has('password'))
          <p class="field-msg">
            <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3"/><path d="M12 9v4"/><path d="M12 17h.01"/></svg>
            {{ $errors->first('password') }}
          </p>
        @else
          <span></span>
        @endif
        <a href="#" class="link-lupa">Lupa password?</a>
      </div>
    </div>

    <label class="remember">
      <input type="checkbox" name="remember" value="1">
      <span>Ingat saya di perangkat ini</span>
    </label>

    <button type="submit" class="btn-masuk">
      MASUK
      <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" x2="3" y1="12" y2="12"/></svg>
    </button>
  </form>
</section>
@endsection

@push('scripts')
<script>
  const inputPass = document.getElementById('password');
  const tombol    = document.getElementById('togglePassword');

  tombol.addEventListener('click', () => {
    const tampil = inputPass.type === 'password';
    inputPass.type = tampil ? 'text' : 'password';
    tombol.querySelector('span').textContent = tampil ? 'Sembunyikan' : 'Tampilkan';
    tombol.setAttribute('aria-pressed', tampil);
  });

  // Hilangkan tampilan error: otomatis setelah 4 detik, atau saat mulai mengetik
  function bersihkanError() {
    const elemen = document.querySelectorAll('.alert-error, .field-msg, .ic-err');
    elemen.forEach(el => el.classList.add('memudar'));
    document.querySelectorAll('.field.is-error').forEach(el => el.classList.remove('is-error'));
    setTimeout(() => elemen.forEach(el => el.remove()), 400);
  }

  if (document.querySelector('.alert-error')) {
    setTimeout(bersihkanError, 4000);
  }

  document.querySelectorAll('#email, #password').forEach(input => {
    input.addEventListener('input', bersihkanError);
  });
</script>
@endpush