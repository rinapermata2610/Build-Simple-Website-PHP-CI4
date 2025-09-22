// ======================================
// MAIN.JS - GLOBAL SCRIPT UNTUK SEMUA PAGE
// ======================================

// Highlight menu aktif sesuai URL
document.querySelectorAll('.nav-link').forEach(link => {
  if (link.href === window.location.href) {
    link.classList.add('active');
  }
});

// Generic Form Validation (Bootstrap-like)
document.querySelectorAll('form.needs-validation').forEach(form => {
  form.addEventListener('submit', function (e) {
    let valid = true;

    form.querySelectorAll('input[required], textarea[required]').forEach(input => {
      const errorEl = input.nextElementSibling;
      if (input.value.trim() === '') {
        valid = false;
        input.classList.add('is-invalid');
        if (errorEl) {
          errorEl.classList.remove('d-none');
          errorEl.textContent = 'Field ini wajib diisi';
        }
      } else {
        input.classList.remove('is-invalid');
        if (errorEl) errorEl.classList.add('d-none');
      }
    });

    if (!valid) e.preventDefault();
  });
});

// Konfirmasi Hapus (Admin)
document.querySelectorAll('.btn-delete').forEach(btn => {
  btn.addEventListener('click', function (e) {
    e.preventDefault();
    const nama = this.dataset.nama || 'item';
    const sks = this.dataset.sks || '-';
    if (confirm(`Yakin ingin menghapus?\n\nNama: ${nama}\nSKS: ${sks}`)) {
      window.location.href = this.href;
    }
  });
});

// Contoh Async
setTimeout(() => {
  console.log("✅ Async: Pesan ini muncul setelah 2 detik.");
}, 2000);
