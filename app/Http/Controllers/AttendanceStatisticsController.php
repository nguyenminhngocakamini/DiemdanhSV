<?php
namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceStatisticsController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->input('date'); // ngày lọc

        $query = Attendance::query();
        if ($date) {
            $query->whereDate('date', $date);
        }

        $attendances = $query->get()->groupBy('student_id');

        $students = Student::all()->map(function ($student) use ($attendances) {
            $records = $attendances[$student->_id] ?? collect();
            $present = $records->where('status', 'Có mặt')->count();
            $absent = $records->where('status', 'Vắng')->count();
            return [
                'id' => $student->_id,
                'name' => $student->full_name,
                'class' => $student->class_id,
                'present' => $present,
                'absent' => $absent,
                'total' => $records->count(),
            ];
        });

        return view('attendance.statistics', compact('students', 'date'));
    }

    
    

}
