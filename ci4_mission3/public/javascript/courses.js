// ======================================================
// public/js/courses.js - BULK ENROLL + LIVE SKS + AJAX
// ======================================================

document.addEventListener('DOMContentLoaded', function () {
  // ambil elemen (reselect setelah DOM siap)
  const courseChecks = Array.from(document.querySelectorAll('.course-check'));
  const totalSksEl = document.getElementById('total-sks');
  const bulkForm = document.getElementById('bulkEnrollForm');

  // CSRF (ambil dari meta tags yang kita tambahkan di layout)
  const metaName = document.querySelector('meta[name="csrf-name"]');
  const metaToken = document.querySelector('meta[name="csrf-token"]');
  const csrfName = metaName ? metaName.getAttribute('content') : null;
  const csrfToken = metaToken ? metaToken.getAttribute('content') : null;

  // ---- helper: hitung total SKS (include checked locked ones) ----
  function updateTotalSks() {
    let total = 0;
    courseChecks.forEach(chk => {
      if (chk.checked) {
        const sks = parseInt(chk.dataset.sks || 0, 10);
        if (!isNaN(sks)) total += sks;
      }
    });
    if (totalSksEl) totalSksEl.textContent = total;
    // debug: uncomment untuk melihat detail di console
    // console.log('Total SKS terhitung:', total, courseChecks.map(c => ({id: c.value, checked: c.checked, sks: c.dataset.sks})));
  }

  // ---- lock behavior: mencegah user mengubah checkbox yang sudah di-enroll ----
  courseChecks.forEach(chk => {
    if (chk.dataset.locked === "true") {
      // pastikan checkbox tetap checked
      chk.checked = true;
      // cegah toggling dengan click
      chk.addEventListener('click', function (e) {
        e.preventDefault();
      });
      // tambahkan atribut ARIA untuk aksesibilitas
      chk.setAttribute('aria-disabled', 'true');
      chk.classList.add('locked');
    }
    // attach change listener untuk update total
    chk.addEventListener('change', updateTotalSks);
  });

  // hitung awal
  updateTotalSks();


  // =========================
  // SINGLE ENROLL (AJAX)
  // =========================
  document.querySelectorAll('.btn-enroll-single').forEach(btn => {
    btn.addEventListener('click', async function () {
      const courseId = this.dataset.courseId;
      const name = this.dataset.courseName;
      const sks = this.dataset.courseSks;

      if (!confirm(`Yakin ingin enroll course "${name}" (${sks} SKS)?`)) return;

      try {
        const res = await fetch(`/student/courses/enroll/${courseId}`, {
          method: 'POST',
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
            ...(csrfToken ? { 'X-CSRF-TOKEN': csrfToken } : {})
          }
        });

        const data = await res.json();

        if (data.status === 'success') {
          // update UI tanpa reload:
          // - ubah tombol jadi "Sudah Enroll"
          // - lock checkbox terkait & pastikan checked
          // - update total SKS
          alert(data.message || 'Berhasil enroll');

          // update DOM
          const chk = document.querySelector(`.course-check[value="${courseId}"]`);
          if (chk) {
            chk.checked = true;
            chk.dataset.locked = "true";
            chk.setAttribute('aria-disabled', 'true');
            chk.classList.add('locked');
            // prevent toggle
            chk.addEventListener('click', e => e.preventDefault());
          }

          // ubah tombol
          btn.classList.remove('btn-outline-primary');
          btn.classList.add('btn-success');
          btn.innerHTML = '<i class="bi bi-check2-circle me-1"></i> Sudah Enroll';
          btn.disabled = true;

          updateTotalSks();
        } else {
          alert(data.message || 'Gagal enroll course.');
        }
      } catch (err) {
        console.error(err);
        alert('Terjadi kesalahan server saat enroll.');
      }
    });
  });


  // =========================
  // BULK ENROLL (AJAX)
  // =========================
  if (bulkForm) {
    bulkForm.addEventListener('submit', async function (e) {
      e.preventDefault();

      // pilih course yang dicentang tetapi belum locked
      const selected = courseChecks
        .filter(chk => chk.checked && chk.dataset.locked !== "true")
        .map(chk => chk.value);

      if (selected.length === 0) {
        alert("Pilih minimal 1 course belum terdaftar sebelum enroll!");
        return;
      }

      if (!confirm(`Yakin ingin enroll ${selected.length} course?`)) return;

      try {
        const payload = { courses: selected };
        // sertakan token juga (jika ada) — beberapa pengaturan CI4 menerima header, beberapa memeriksa POST
        if (csrfName && csrfToken) payload[csrfName] = csrfToken;

        const res = await fetch('/student/courses/enroll-bulk', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            ...(csrfToken ? { 'X-CSRF-TOKEN': csrfToken } : {})
          },
          body: JSON.stringify(payload)
        });

        const data = await res.json();

        if (data.status === 'success') {
          alert(data.message || `Berhasil enroll ${data.courseIds ? data.courseIds.length : selected.length} course.`);
          // tandai course yang baru di-enroll menjadi locked & ubah tombol
          const newIds = data.courseIds || selected;
          newIds.forEach(id => {
            const chk = document.querySelector(`.course-check[value="${id}"]`);
            if (chk) {
              chk.checked = true;
              chk.dataset.locked = "true";
              chk.setAttribute('aria-disabled', 'true');
              chk.classList.add('locked');
              chk.addEventListener('click', e => e.preventDefault());
            }
            const btn = document.querySelector(`.btn-enroll-single[data-course-id="${id}"]`);
            if (btn) {
              btn.classList.remove('btn-outline-primary');
              btn.classList.add('btn-success');
              btn.innerHTML = '<i class="bi bi-check2-circle me-1"></i> Sudah Enroll';
              btn.disabled = true;
            }
          });

          updateTotalSks();
        } else {
          alert(data.message || 'Gagal enroll course.');
        }
      } catch (err) {
        console.error(err);
        alert('Terjadi kesalahan saat menghubungi server.');
      }
    });
  }

});