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
        foreach ($request->attendances as $studentId => $status) {
            Attendance::create([
                'student_id' => $studentId,
                'status' => $status,
                'date' => now()->format('Y-m-d'),
                'attendance_time' => now(),
            ]);
        }

        return redirect()->back()->with('success', 'Đã lưu điểm danh thành công!');
    }

}
