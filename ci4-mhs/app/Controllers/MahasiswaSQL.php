<?php
namespace App\Controllers;

use App\Models\MahasiswaModel;

class MahasiswaSQL extends BaseController
{
    public function index()
    {
        $model = new MahasiswaModel();
        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $data['mahasiswa'] = $model->search($keyword)->findAll();
        } else {
            $data['mahasiswa'] = $model->findAll();
        }

        return view('mahasiswa/list', $data);
    }

    public function create()
    {
        return view('mahasiswa/create');
    }

    public function store()
    {
        $model = new MahasiswaModel();
        $model->save([
            'nim'   => $this->request->getPost('nim'),
            'nama'  => $this->request->getPost('nama'),
            'prodi' => $this->request->getPost('prodi'),
        ]);

        return redirect()->to('/mahasiswa-sql');
    }

    public function edit($id)
    {
        $model = new MahasiswaModel();
        $data['mhs'] = $model->find($id);
        return view('mahasiswa/edit', $data);
    }

    public function update($id)
    {
        $model = new MahasiswaModel();
        $model->update($id, [
            'nim'   => $this->request->getPost('nim'),
            'nama'  => $this->request->getPost('nama'),
            'prodi' => $this->request->getPost('prodi'),
        ]);

        return redirect()->to('/mahasiswa-sql');
    }

    public function delete($id)
    {
        $model = new MahasiswaModel();
        $model->delete($id);
        return redirect()->to('/mahasiswa-sql');
    }
}