<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Profile extends BaseController
{
    public function passwordForm()
    {
        return view('profile/change_password', [
            'title' => 'Ganti Password'
        ]);
    }

    public function updatePassword()
    {
        $userModel = new UserModel();
        $session   = session();

        $userId = $session->get('user_id'); 

        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Sesi berakhir. Silakan login ulang.');
        }

        $user = $userModel->find($userId);

        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        if (! password_verify($this->request->getPost('current_password'), $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Password lama salah!');
        }

        $userModel->update($userId, [
            'password' => password_hash($this->request->getPost('new_password'), PASSWORD_DEFAULT)
        ]);

        return redirect()->back()->with('success', 'Password berhasil diubah!');
    }
}
