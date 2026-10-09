<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>@yield('judul', 'Dashboard') | Admin SMP Negeri 1 Loceret</title>
<link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="admin-body">

<div class="admin-shell">
  @include('partials.admin.sidebar')
  <div class="admin-overlay" id="adminOverlay"></div>

  <div class="admin-main">
    @include('partials.admin.topbar')

    <main class="admin-content">
      @include('partials.admin.notifikasi')
      @yield('konten')
    </main>
  </div>
</div>

<script>
  const body = document.body;
  const userBtn = document.getElementById('userBtn');
  const userMenu = document.getElementById('userMenu');

  function tutupDropdown() {
    userMenu.classList.remove('is-open');
    userBtn.setAttribute('aria-expanded', 'false');
  }

  // Sidebar (mobile)
  document.getElementById('menuToggle').addEventListener('click', () => body.classList.toggle('sidebar-open'));
  document.getElementById('adminOverlay').addEventListener('click', () => body.classList.remove('sidebar-open'));

  // Dropdown pengguna
  userBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    const buka = userMenu.classList.toggle('is-open');
    userBtn.setAttribute('aria-expanded', buka);
  });
  document.addEventListener('click', (e) => {
    if (!userMenu.contains(e.target)) tutupDropdown();
  });
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      tutupDropdown();
      body.classList.remove('sidebar-open');
    }
  });
</script>
@stack('scripts')
</body>
</html>