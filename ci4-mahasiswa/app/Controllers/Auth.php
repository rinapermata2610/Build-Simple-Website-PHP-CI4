<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        return view('auth/login'); // file login.php di folder app/Views/auth/
    }

    public function login()
    {
        $session = session();
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session->set([
                'id'    => $user['id'],
                'username' => $user['username'],
                'role'  => $user['role'], // pastikan ada kolom role di tabel
                'logged_in' => true
            ]);
            return redirect()->to('/dashboard'); // arahkan sesuai kebutuhanmu
        } else {
            $session->setFlashdata('error', 'Username atau Password salah!');
            return redirect()->to('/auth');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth');
    }
}
