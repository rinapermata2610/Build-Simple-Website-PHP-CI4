<?php namespace App\Controllers\Student;

use App\Controllers\BaseController;
use App\Models\CourseModel;
use App\Models\EnrollmentModel;
use Dompdf\Dompdf;

class Courses extends BaseController
{
    protected $courseModel;
    protected $enrollModel;

    public function __construct()
    {
        $this->courseModel = new CourseModel();
        $this->enrollModel = new EnrollmentModel();
    }

    /**
     * Menampilkan daftar semua course + status enroll
     */
    public function index()
    {
        $userId = session()->get('user_id');

        // Ambil semua course
        $courses = $this->courseModel->findAll();

        // Ambil semua course yg sudah di-enroll student ini
        $enrolled = $this->enrollModel->where('user_id', $userId)->findAll();
        $enrolledIds = array_column($enrolled, 'course_id');

        return view('student/courses/index', [
            'title'       => 'Daftar Courses',
            'courses'     => $courses,
            'enrolledIds' => $enrolledIds
        ]);
    }

    /**
     * Enroll single course (dipakai untuk tombol Enroll)
     */
    public function enroll($courseId)
    {
        return $this->processEnroll([$courseId]);
    }

    /**
     * Enroll multiple course sekaligus (dipakai untuk Bulk Enroll)
     */
    public function enrollBulk()
    {
        $courseIds = $this->request->getPost('courses');
        if (empty($courseIds)) {
            return $this->respondEnrollError('Pilih minimal satu course untuk di-enroll.', 400);
        }

        return $this->processEnroll($courseIds);
    }

    /**
     * Logic utama untuk proses enroll (single/bulk)
     */
    private function processEnroll(array $courseIds)
    {
        $userId = session()->get('user_id');

        $inserted = [];
        foreach ($courseIds as $courseId) {
            // Cek duplikat enroll
            $exists = $this->enrollModel
                ->where('user_id', $userId)
                ->where('course_id', $courseId)
                ->first();

            if (!$exists) {
                $this->enrollModel->insert([
                    'user_id'   => $userId,
                    'course_id' => $courseId
                ]);
                $inserted[] = $courseId;
            }
        }

        if (empty($inserted)) {
            return $this->respondEnrollError('Semua course yang dipilih sudah di-enroll sebelumnya.', 400);
        }

        return $this->respondEnrollSuccess($inserted);
    }

    /**
     * Helper: response sukses (AJAX/Redirect)
     */
    private function respondEnrollSuccess(array $courseIds)
    {
        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'status'     => 'success',
                'courseIds'  => $courseIds,
                'message'    => 'Berhasil mendaftar course!'
            ]);
        }

        return redirect()->back()->with('success', 'Berhasil mendaftar course!');
    }

    /**
     * Helper: response error (AJAX/Redirect)
     */
    private function respondEnrollError(string $message, int $statusCode = 400)
    {
        if ($this->request->isAJAX()) {
            return $this->response
                ->setStatusCode($statusCode)
                ->setJSON(['status' => 'error', 'message' => $message]);
        }

        return redirect()->back()->with('error', $message);
    }

    public function history()
{
    $userId = session()->get('user_id');

    $enrolled = $this->enrollModel
        ->where('user_id', $userId)
        ->findAll();

    $courses = [];
    $totalSks = 0;

    foreach ($enrolled as $row) {
        $course = $this->courseModel->find($row['course_id']);
        if ($course) {
            $courses[] = $course;
            $totalSks += (int) ($course['credits'] ?? 0);
        }
    }

    return view('student/courses/history', [
        'title'    => 'Riwayat Course',
        'courses'  => $courses,
        'totalSks' => $totalSks
    ]);
}

public function historyPdf()
{
    $userId = session()->get('user_id');

    $enrolled = $this->enrollModel
        ->where('user_id', $userId)
        ->findAll();

    $courses = [];
    $totalSks = 0;

    foreach ($enrolled as $row) {
        $course = $this->courseModel->find($row['course_id']);
        if ($course) {
            $courses[] = $course;
            $totalSks += (int) ($course['credits'] ?? 0);
        }
    }

    // Gunakan Dompdf
    $dompdf = new \Dompdf\Dompdf();
    $html = view('student/courses/history_pdf', [
        'courses'  => $courses,
        'totalSks' => $totalSks
    ]);

    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream('riwayat_course.pdf', ["Attachment" => true]);
}

}