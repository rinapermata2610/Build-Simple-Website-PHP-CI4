<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Mahasiswa extends Controller
{
    public function index()
    {
        $data['mahasiswa'] = [
            ['nim' => '241511061', 'nama' => 'Rina Permata Dewi', 'prodi' => 'Teknik Informatika D3'],
            ['nim' => '241511062', 'nama' => 'Aji Santoso', 'prodi' => 'Teknik Informatika D4'],
            ['nim' => '241511063', 'nama' => 'Fariz Hidayat', 'prodi' => 'Teknik Informatika D4'],
        ];

        return view('mahasiswa_view', $data);
    }
}
