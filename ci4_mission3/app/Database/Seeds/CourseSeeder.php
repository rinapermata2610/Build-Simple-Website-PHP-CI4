<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run()
    {
        $data = [
          ['code'=>'IF101','name'=>'Proyek 3','description'=>'Pengantar pemrograman','credits'=>3],
          ['code'=>'IF102','name'=>'Basis Data','description'=>'Konsep dan implementasi DB','credits'=>3],
          ['code'=>'IF201','name'=>'Komputer Grafik','description'=>'Algoritma fundamental','credits'=>4],
        ];
        $this->db->table('courses')->insertBatch($data);
    }
}
