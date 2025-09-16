<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data = [
            'title' => 'Kelola Mahasiswa',
            'users' => $userModel->where('role', 'student')->findAll()
        ];
        return view('admin/users/index', $data);
    }

    public function create()
    {
        return view('admin/users/create', ['title' => 'Tambah Mahasiswa']);
    }

    public function store()
    {
        $userModel = new UserModel();
        $userModel->save([
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'role'     => 'student'
        ]);

        return redirect()->to('/admin/users')->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if (!$user) {
            return redirect()->to('/admin/users')->with('error', 'Mahasiswa tidak ditemukan');
        }

        return view('admin/users/edit', [
            'title' => 'Edit Mahasiswa',
            'user'  => $user
        ]);
    }

    public function update($id)
    {
        $userModel = new UserModel();
        $userModel->update($id, [
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email')
        ]);

        return redirect()->to('/admin/users')->with('success', 'Mahasiswa berhasil diupdate');
    }

    public function delete($id)
    {
        $userModel = new UserModel();
        $userModel->delete($id);

        return redirect()->to('/admin/users')->with('success', 'Mahasiswa dihapus');
    }
}
