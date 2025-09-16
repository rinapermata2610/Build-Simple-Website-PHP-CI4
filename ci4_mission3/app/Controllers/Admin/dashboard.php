<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\CourseModel;
use App\Models\EnrollmentModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $courseModel = new CourseModel();
        $enrollModel = new EnrollmentModel();

        $data = [
            'title' => 'Admin Dashboard',
            'userCount' => $userModel->countAll(),
            'courseCount' => $courseModel->countAll(),
            'enrollCount' => $enrollModel->countAll()
        ];

        return view('admin/dashboard', $data);
    }
}
