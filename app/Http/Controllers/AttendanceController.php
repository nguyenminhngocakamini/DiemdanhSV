<?php
namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('attendance.index', compact('students'));
    }

    public function store(Request $request)
    {
        foreach ($request->input('attendances') as $studentId => $status) {
            Attendance::create([
                'student_id' => $studentId,
                'date' => date('Y-m-d'),
                'status' => $status
            ]);
        }

        return redirect()->route('attendance.index')->with('success', 'Điểm danh thành công!');
    }
}
