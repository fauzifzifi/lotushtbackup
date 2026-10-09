@if (session('sukses'))
  <div class="toast toast-ok" id="toast" role="status">
    <svg class="ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
    <span>{{ session('sukses') }}</span>
    <button type="button" class="toast-tutup" id="toastTutup" aria-label="Tutup">&times;</button>
  </div>
  <script>
    (function () {
      const toast = document.getElementById('toast');
      function tutup() {
        toast.classList.add('toast-hilang');
        setTimeout(() => toast.remove(), 400);
      }
      document.getElementById('toastTutup').addEventListener('click', tutup);
      setTimeout(tutup, 4000);
    })();
  </script>
@endif