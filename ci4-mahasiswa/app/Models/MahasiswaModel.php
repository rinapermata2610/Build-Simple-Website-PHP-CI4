<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mahasiswa';      // nama tabel di database
    protected $primaryKey = 'id';        // kolom primary key
    protected $allowedFields = ['nim', 'nama', 'umur'];
    protected $useTimestamps = true;     // supaya created_at & updated_at terisi otomatis
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
