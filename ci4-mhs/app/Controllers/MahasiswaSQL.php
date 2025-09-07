<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class MahasiswaSQL extends Controller
{
    public function index()
    {
        // pastikan user sudah login
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        // ambil data dari session
        $data = [
            'username' => session()->get('username')
        ];

        return view('mahasiswa_sql/index', $data);
    }
}
