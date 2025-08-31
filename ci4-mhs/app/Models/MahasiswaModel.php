<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table      = 'mahasiswa';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nim', 'nama', 'prodi'];

    // Ambil semua data
    public function getAll()
    {
        return $this->findAll();
    }

    // Ambil detail 1 mahasiswa
    public function getById($id)
    {
        return $this->find($id);
    }
}
