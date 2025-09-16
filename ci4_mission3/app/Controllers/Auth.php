<?php namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        helper(['form']);

        if ($this->request->getMethod() === 'post') {
            $email    = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $userModel = new UserModel();
            $user = $userModel->where('email', $email)->first();

            if ($user && password_verify($password, $user['password'])) {
                // Set session
                session()->set([
                    'isLoggedIn' => true,
                    'user_id'    => $user['id'],
                    'name'       => $user['name'],
                    'role'       => $user['role']
                ]);

                // ✅ Redirect sesuai role
                if ($user['role'] === 'admin') {
                    return redirect()->to('/admin/dashboard');
                }
                return redirect()->to('/student/dashboard');
            }

            // Jika login gagal
            session()->setFlashdata('error', 'Email atau password salah');
            return redirect()->back()->withInput();
        }

        // Tampilkan form login
        return view('auth/login');
    }

    public function register()
    {
        helper(['form']);

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'name'     => 'required|min_length[3]',
                'email'    => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[6]'
            ];

            if (!$this->validate($rules)) {
                return view('auth/register', [
                    'validation' => $this->validator
                ]);
            }

            $userModel = new UserModel();
            $userModel->save([
                'name'     => $this->request->getPost('name'),
                'email'    => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'), // hashed di model
                'role'     => 'student'
            ]);

            session()->setFlashdata('success', 'Registrasi berhasil. Silakan login.');
            return redirect()->to('/login');
        }

        // Tampilkan form register
        return view('auth/register');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
