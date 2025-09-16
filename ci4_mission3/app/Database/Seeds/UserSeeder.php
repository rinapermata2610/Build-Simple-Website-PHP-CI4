<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
              'name' => 'Admin',
              'email' => 'admin@example.com',
              'password' => password_hash('admin123', PASSWORD_DEFAULT),
              'role' => 'admin'
            ],
            [
              'name' => 'Student',
              'email' => 'student@example.com',
              'password' => password_hash('student123', PASSWORD_DEFAULT),
              'role' => 'student'
            ],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
