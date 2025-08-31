<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class MahasiswaLoop extends Controller
{
    public function index()
    {
        $listMahasiswa = [
            ['nim' => '241511061', 'nama' => 'Rina Permata Dewi', 'prodi' => 'Teknik Informatika D3'],
            ['nim' => '241511062', 'nama' => 'Aji Santoso', 'prodi' => 'Teknik Informatika D4'],
            ['nim' => '241511063', 'nama' => 'Fariz Hidayat', 'prodi' => 'Teknik Informatika D4'],
        ];

        // Buat tabel dengan looping di Controller
        $table = "<h2 style='text-align:center;'>Data Mahasiswa (Looping Controller)</h2>";
        $table .= "<table border='1' cellpadding='8' cellspacing='0' style='margin:20px auto; border-collapse: collapse;'>";
        $table .= "<tr><th>NIM</th><th>Nama</th><th>Program Studi</th></tr>";

        foreach ($listMahasiswa as $m) {
            $table .= "<tr>
                        <td>{$m['nim']}</td>
                        <td>{$m['nama']}</td>
                        <td>{$m['prodi']}</td>
                       </tr>";
        }

        $table .= "</table>";

        return $table;
    }
}
