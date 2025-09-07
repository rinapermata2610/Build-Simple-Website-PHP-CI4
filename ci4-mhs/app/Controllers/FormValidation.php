<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class FormValidation extends Controller
{
    public function index()
    {
        return view('form_validation');
    }

    public function submit()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'nim'   => 'required|numeric|min_length[5]|max_length[10]',
            'nama'  => 'required|min_length[3]',
            'umur'  => 'required|integer|greater_than[0]|less_than[100]',
        ];

        if (!$this->validate($rules)) {
            return view('form_validation', [
                'validation' => $this->validator
            ]);
        } else {
            return "<h3>Data berhasil divalidasi!</h3>";
        }
    }
}
