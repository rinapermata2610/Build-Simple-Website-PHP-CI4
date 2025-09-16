<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'fullname' => 'Administrator',
                'email'    => 'admin@polban.com',
                'role'     => 'admin',
            ],
            [
                'username' => 'rina',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'fullname' => 'Rina Permata Dewi',
                'email'    => 'rina@polban.com',
                'role'     => 'student',
            ]
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
