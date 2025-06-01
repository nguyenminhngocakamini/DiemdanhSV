<?php
namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
 public function index()
    {
        $students = Student::all();
        $stats = [];

        foreach ($students as $student) {
            $total = Attendance::where('student_id', $student->_id)->count();
            $present = Attendance::where('student_id', $student->_id)->where('status', 'Có mặt')->count();
            $absent = $total - $present;

            $stats[] = [
                'name' => $student->full_name,
                'total' => $total,
                'present' => $present,
                'absent' => $absent,
            ];
        }

        return view('statistics.index', compact('stats'));
    }
}
