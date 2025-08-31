<?php
declare(strict_types=1);

/**
 * 2b — Menampilkan Tabel dengan Looping PHP
 * Kasus: Menampilkan daftar mahasiswa secara dinamis.
 */

// Data mahasiswa (array asosiatif)
$mahasiswa = [
    ["nama" => "Rina Permata Dewi", "nim" => "241511061", "kelas" => "2B/D3 TI"],
    ["nama" => "Fariz Ahmad",       "nim" => "241511062", "kelas" => "2B/D3 TI"],
    ["nama" => "Aji Saputra",       "nim" => "241511063", "kelas" => "2B/D3 TI"],
    ["nama" => "Dimas Putra",       "nim" => "241511064", "kelas" => "2B/D3 TI"],
];

echo "<h2>=== 2b — Tabel HTML dengan Looping PHP (Dinamis) ===</h2>";
echo "<table border='1' cellpadding='6' cellspacing='0'>";
echo "<tr><th>No</th><th>Nama</th><th>NIM</th><th>Kelas</th></tr>";

$no = 1;
foreach ($mahasiswa as $mhs) {
    echo "<tr>";
    echo "<td>$no</td>";
    echo "<td>{$mhs['nama']}</td>";
    echo "<td>{$mhs['nim']}</td>";
    echo "<td>{$mhs['kelas']}</td>";
    echo "</tr>";
    $no++;
}

echo "</table>";
