<?php namespace App\Controllers\Student;

use App\Controllers\BaseController;
use App\Models\CourseModel;
use App\Models\EnrollmentModel;

class Courses extends BaseController
{
    public function index()
    {
        $courseModel = new CourseModel();
        $enrollModel = new EnrollmentModel();

        $userId = session()->get('user_id');
        $courses = $courseModel->findAll();

        // ambil semua enrollment student ini
        $enrolled = $enrollModel->where('user_id', $userId)->findAll();
        $enrolledIds = array_column($enrolled, 'course_id');

        return view('student/courses/index', [
            'title' => 'Daftar Courses',
            'courses' => $courses,
            'enrolledIds' => $enrolledIds
        ]);
    }

    public function enroll($courseId)
    {
        $userId = session()->get('user_id');
        $enrollModel = new EnrollmentModel();

        // cek apakah sudah pernah enroll
        $existing = $enrollModel
            ->where('user_id', $userId)
            ->where('course_id', $courseId)
            ->first();

        if ($existing) {
            return redirect()->back()->with('error', 'Anda sudah mendaftar course ini.');
        }

        $enrollModel->save([
            'user_id' => $userId,
            'course_id' => $courseId
        ]);

        return redirect()->back()->with('success', 'Berhasil mendaftar course!');
    }
}
