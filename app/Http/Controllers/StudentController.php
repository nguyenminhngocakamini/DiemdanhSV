<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
class StudentController extends Controller
{


    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }
    public function store(Request $request)
    {
        Student::create($request->only([
            'student_code', 'full_name', 'class_id', 'gender', 'dob'
        ]));

        return redirect()->route('students.index')->with('success', 'Thêm sinh viên thành công!');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->only([
            'student_code', 'full_name', 'class_id', 'gender', 'dob'
        ]));

        return redirect()->route('students.index')->with('success', 'Cập nhật thành công!');
    }
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Xóa sinh viên thành công!');
    }



}
