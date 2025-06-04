<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    // Hiển thị danh sách
    public function index()
    {
        $courses = Course::all();
        return view('admin.home', compact('courses'));
    }

    // Hiển thị form tạo mới
    public function create()
    {
        return view('admin.courses.create');
    }

    // Lưu môn học mới
    public function store(Request $request)
    {
        Course::create($request->only([
            'code', 'name', 'teacher', 'date', 'period', 'room', 'semester'
        ]));

        return redirect()->route('courses.index')
            ->with('success', 'Thêm môn học thành công!')
            ->with('activeTab', 'courseManagement');
    }

    // Hiển thị form chỉnh sửa
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.courses.edit', compact('course'));
    }

    // Cập nhật môn học
    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->update($request->only([
            'code', 'name', 'teacher', 'date', 'period', 'room', 'semester'
        ]));

        return redirect()->route('courses.index')->with('success', 'Cập nhật thành công!');
    }

    // Xóa môn học
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Xóa môn học thành công!');
    }
}
