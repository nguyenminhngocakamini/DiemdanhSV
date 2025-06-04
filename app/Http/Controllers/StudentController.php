<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('dashboard.students.index', compact('students'));
    }

    public function create()
    {
        return view('dashboard.students.create');
    }

    public function store(Request $request)
    {
        Student::create($request->all());
        return redirect()->route('dashboard.students.index');
    }

    public function edit(Student $student)
    {
        return view('dashboard.students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $student->update($request->all());
        return redirect()->route('dashboard.students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('dashboard.students.index');
    }
}
?>