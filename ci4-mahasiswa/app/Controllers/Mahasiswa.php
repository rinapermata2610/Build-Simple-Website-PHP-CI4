<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Mahasiswa extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new MahasiswaModel();
        helper(['form','url']);
    }

    // Middleware sederhana untuk cek login
    protected function guard()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        return null;
    }

    // Halaman utama daftar mahasiswa
    public function index()
    {
        if ($this->guard()) return $this->guard();

        $data = [
            'title' => 'Daftar Mahasiswa',
            'mahasiswa' => $this->model->findAll()
        ];
        return view('mahasiswa/index', $data);
    }

    // Halaman detail
    public function show($id = null)
    {
        $mhs = $this->model->find($id);
        if (!$mhs) {
            throw PageNotFoundException::forPageNotFound("Mahasiswa dengan ID $id tidak ditemukan");
        }
        return view('mahasiswa/show', [
            'title' => 'Detail Mahasiswa',
            'mahasiswa' => $mhs
        ]);
    }

    // Form create (halaman baru)
    public function create()
    {
        if ($this->guard()) return $this->guard();
        return view('mahasiswa/create', ['title' => 'Tambah Mahasiswa']);
    }

    // Proses simpan
    public function store()
    {
        if ($this->guard()) return $this->guard();

        $rules = [
            'nim'  => 'required|alpha_numeric|min_length[4]|is_unique[mahasiswa.nim]',
            'nama' => 'required|min_length[3]',
            'umur' => 'required|integer|greater_than[15]|less_than[100]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->model->save([
            'nim'  => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'umur' => $this->request->getPost('umur')
        ]);

        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to('/mahasiswa');
    }

    // Form edit
    public function edit($id = null)
    {
        if ($this->guard()) return $this->guard();

        $mhs = $this->model->find($id);
        if (!$mhs) throw PageNotFoundException::forPageNotFound("Mahasiswa dengan ID $id tidak ditemukan");

        return view('mahasiswa/edit', [
            'title'=>'Edit Mahasiswa',
            'mahasiswa'=>$mhs
        ]);
    }

    // Proses update
    public function update($id = null)
    {
        if ($this->guard()) return $this->guard();

        $mhs = $this->model->find($id);
        if (!$mhs) throw PageNotFoundException::forPageNotFound("Mahasiswa dengan ID $id tidak ditemukan");

        $nim = $this->request->getPost('nim');
        // cek unik NIM (selain id sekarang)
        $exists = $this->model->where('nim', $nim)->first();
        if ($exists && $exists['id'] != $id) {
            return redirect()->back()
                ->withInput()
                ->with('errors', ['nim' => 'NIM sudah dipakai oleh mahasiswa lain']);
        }

        $rules = [
            'nim'  => 'required|alpha_numeric|min_length[4]',
            'nama' => 'required|min_length[3]',
            'umur' => 'required|integer|greater_than[15]|less_than[100]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->model->update($id, [
            'nim'  => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'umur' => $this->request->getPost('umur')
        ]);

        session()->setFlashdata('success', 'Data berhasil diperbarui');
        return redirect()->to('/mahasiswa');
    }

    // Hapus
    public function delete($id = null)
    {
        if ($this->guard()) return $this->guard();

        $this->model->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/mahasiswa');
    }
}
