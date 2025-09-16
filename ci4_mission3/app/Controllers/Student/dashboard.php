<?php namespace App\Controllers\Student;

use App\Controllers\BaseController;
use App\Models\EnrollmentModel;
use App\Models\CourseModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $userId = session()->get('user_id');
        $enrollModel = new EnrollmentModel();
        $courseModel = new CourseModel();

        $myEnrollments = $enrollModel->where('user_id', $userId)->findAll();
        $courseCount = count($myEnrollments);

        $data = [
            'title' => 'Student Dashboard',
            'courseCount' => $courseCount,
            'totalCourses' => $courseModel->countAll()
        ];

        return view('student/dashboard', $data);
    }
}
