# README – Praktikum Proyek 3 (PHP & CodeIgniter 4)

## Identitas

* Nama  : Rina Permata Dewi
* NIM   : 241511061
* Kelas : 2B/D3 Teknik Informatika
* Mata Kuliah : Proyek 3 – Build Simple Website (PHP & CodeIgniter 4)

---

## Deskripsi

Project ini berisi implementasi praktikum 1–5 menggunakan PHP dasar dan CodeIgniter 4 dengan pendekatan Model-View-Controller (MVC). 

---

## Cara Menjalankan

1. Aktifkan **Apache** dan **MySQL** di XAMPP.
2. Buka terminal, masuk ke folder project:

   ```bash
   cd ci4-mhs
   php spark serve
   ```
3. Akses melalui browser: `http://localhost:8080/`

---

## Praktikum

* **Praktikum 1 – PHP Basics**
  Materi: Sequential, Selection (`if`, `else`, `switch`), Looping.

* **Praktikum 2 – HTML & PHP**
  Materi: Tabel HTML statis dan tabel dengan looping PHP.

* **Praktikum 3 – Setup CodeIgniter 4**
  Materi: Instalasi CI4 dengan Composer, konfigurasi routes, baseURL, dan database.

* **Praktikum 4 – Controller di CI4**
  Materi: Membuat controller untuk menampilkan teks dan tabel.

* **Praktikum 5 – MVC + CRUD Mahasiswa**
  Materi: Implementasi CRUD (Create, Read, Update, Delete, Search) mahasiswa.

---

## Database

Nama database: `ci4_mhs`
Tabel: `mahasiswa`

```sql
CREATE TABLE mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(20),
    nama VARCHAR(100),
    prodi VARCHAR(50)
);
```

---

## Catatan

* Semua praktikum dapat diuji langsung melalui endpoint masing-masing.
* Jika port 8080 tidak tersedia, jalankan dengan:

  ```bash
  php spark serve --port=8081
  ```

## 📷 Preview / Output

### Halaman CRUD Mahasiswa
![CRUD Mahasiswa](assets/CRUD-Mahasiswa.png)