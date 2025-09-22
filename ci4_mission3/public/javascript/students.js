// ======================================
// STUDENTS.JS - ADMIN PAGE
// ======================================

document.querySelectorAll('.btn-delete-student').forEach(btn => {
  btn.addEventListener('click', function (e) {
    e.preventDefault();
    const nama = this.dataset.nama || 'Mahasiswa';
    if (confirm(`Yakin ingin menghapus data ${nama}?`)) {
      window.location.href = this.href;
    }
  });
});
