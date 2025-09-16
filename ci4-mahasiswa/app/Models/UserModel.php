<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields = ['username', 'password', 'fullname', 'email', 'role'];

    protected $useTimestamps = true; // otomatis isi created_at & updated_at
}
