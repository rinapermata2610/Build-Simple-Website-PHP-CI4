<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class User extends Controller
{
    public function detail($id)
    {
        return "Detail User dengan ID: " . $id;
    }
}
