<?php namespace App\Models;

use CodeIgniter\Model;

class EnrollmentModel extends Model
{
    protected $table = 'enrollments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id','course_id','enrolled_at'];
    public $useTimestamps = false; // menggunakan enrolled_at manual / DB default
}
