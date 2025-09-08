<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new MahasiswaModel();
        $data['title'] = 'Home - Data Mahasiswa';
        $data['mahasiswa'] = $model->findAll();
        return view('home', $data);
    }
}
