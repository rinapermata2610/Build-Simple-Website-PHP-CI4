<?php
namespace App\Controllers;

use App\Models\MahasiswaModel;
use CodeIgniter\Controller;

class Mahasiswa extends Controller
{
    protected $mhs;

    public function __construct()
    {
        $this->mhs = new MahasiswaModel();
    }

    public function index()
    {
        $data['title'] = 'Data Mahasiswa';
        $data['mahasiswa'] = $this->mhs->findAll();
        echo view('template_v2', ['content' => view('mahasiswa/index', $data)]);
    }

    public function create()
    {
        if ($this->request->getMethod() === 'post') {
            $this->mhs->insert([
                'nim' => $this->request->getPost('nim'),
                'nama' => $this->request->getPost('nama'),
                'umur' => $this->request->getPost('umur')
            ]);
            return redirect()->to('/mahasiswa')->with('success', 'Data berhasil ditambahkan.');
        }

        $data['title'] = 'Tambah Mahasiswa';
        echo view('template_v2', ['content' => view('mahasiswa/form', $data)]);
    }

    public function edit($id)
    {
        if ($this->request->getMethod() === 'post') {
            $this->mhs->update($id, [
                'nim' => $this->request->getPost('nim'),
                'nama' => $this->request->getPost('nama'),
                'umur' => $this->request->getPost('umur')
            ]);
            return redirect()->to('/mahasiswa')->with('success', 'Data berhasil diupdate.');
        }

        $data['title'] = 'Edit Mahasiswa';
        $data['mhs'] = $this->mhs->find($id);
        echo view('template_v2', ['content' => view('mahasiswa/form', $data)]);
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->mhs->find($id);
        echo view('template_v2', ['content' => view('mahasiswa/detail', $data)]);
    }

    public function delete($id)
    {
        $this->mhs->delete($id);
        return redirect()->to('/mahasiswa')->with('success', 'Data berhasil dihapus.');
    }
}
