<header class="admin-topbar">
  <button type="button" class="menu-toggle" id="menuToggle" aria-label="Buka menu">
    <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
  </button>

  <div class="user-dropdown" id="userMenu">
    <button type="button" class="user-btn" id="userBtn" aria-label="Menu pengguna" aria-expanded="false">
      <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
    </button>

    <div class="user-panel">
      <div class="user-info">
        <strong>{{ auth()->user()->name }}</strong>
        <small>{{ auth()->user()->email }}</small>
      </div>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="user-logout">
          <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
          Keluar
        </button>
      </form>
    </div>
  </div>
</header>