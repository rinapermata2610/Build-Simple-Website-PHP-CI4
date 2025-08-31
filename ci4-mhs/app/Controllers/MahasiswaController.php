<?php
namespace App\Controllers;

use App\Models\MahasiswaModel;
use CodeIgniter\Controller;

class MahasiswaController extends Controller
{
    public function index()
    {
        $model = new MahasiswaModel();
        $data['mahasiswa'] = $model->findAll(); // SELECT * FROM mahasiswa

        return view('mahasiswa_list', $data);
    }
}
