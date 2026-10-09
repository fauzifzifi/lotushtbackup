<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>@yield('judul', 'Masuk') | SMP Negeri 1 Loceret</title>
<link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body class="auth-body">

<header class="auth-header">
  <a href="{{ route('beranda') }}" class="auth-brand">
    <img src="{{ asset('images/logo.png') }}" alt="Logo SMP Negeri 1 Loceret">
    <span class="auth-brand-text">
      <strong>SMP NEGERI 1 LOCERET</strong>
      <small>Loceret, Nganjuk, Jawa Timur</small>
    </span>
  </a>

  <a href="{{ route('beranda') }}" class="auth-back">
    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5"/><path d="M12 19l-7-7 7-7"/></svg>
    Kembali ke Beranda
  </a>
</header>

<main class="auth-main">
  @yield('konten')
</main>

<footer class="auth-footer">
  <p>&copy; {{ date('Y') }} SMP Negeri 1 Loceret. All rights reserved.</p>
</footer>

@stack('scripts')
</body>
</html>