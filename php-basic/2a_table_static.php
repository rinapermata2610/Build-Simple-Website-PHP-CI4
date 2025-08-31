<?php
declare(strict_types=1);

/**
 * 2a — Menampilkan Tabel HTML dengan PHP
 * Kasus: Menampilkan daftar mahasiswa dengan tabel sederhana.
 */

// Data mahasiswa (statis, manual)
$nama1 = "Rina Permata Dewi";
$nim1  = "241511061";
$kelas1 = "2B/D3 TI";

$nama2 = "Fariz Ahmad";
$nim2  = "241511062";
$kelas2 = "2B/D3 TI";

$nama3 = "Aji Saputra";
$nim3  = "241511063";
$kelas3 = "2B/D3 TI";

// Tampilkan tabel
echo "<h2>=== 2a — Tabel HTML dengan PHP (Statis) ===</h2>";
echo "<table border='1' cellpadding='6' cellspacing='0'>";
echo "<tr><th>No</th><th>Nama</th><th>NIM</th><th>Kelas</th></tr>";
echo "<tr><td>1</td><td>$nama1</td><td>$nim1</td><td>$kelas1</td></tr>";
echo "<tr><td>2</td><td>$nama2</td><td>$nim2</td><td>$kelas2</td></tr>";
echo "<tr><td>3</td><td>$nama3</td><td>$nim3</td><td>$kelas3</td></tr>";
echo "</table>";
