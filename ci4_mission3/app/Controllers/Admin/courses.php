<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CourseModel;

class Courses extends BaseController
{
    public function index()
    {
        $courseModel = new CourseModel();
        $data = [
            'title' => 'Kelola Courses',
            'courses' => $courseModel->findAll()
        ];
        return view('admin/courses/index', $data);
    }

    public function create()
    {
        return view('admin/courses/create', ['title'=>'Tambah Course']);
    }

    public function store()
    {
        $model = new CourseModel();
        $model->insert($this->request->getPost());
        return redirect()->to('/admin/courses')->with('success','Course berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $model = new CourseModel();
        return view('admin/courses/edit', [
            'title'=>'Edit Course',
            'course'=>$model->find($id)
        ]);
    }

    public function update($id)
    {
        $model = new CourseModel();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/admin/courses')->with('success','Course berhasil diperbarui.');
    }

    public function delete($id)
    {
        $model = new CourseModel();
        $model->delete($id);
        return redirect()->to('/admin/courses')->with('success','Course dihapus.');
    }
}
