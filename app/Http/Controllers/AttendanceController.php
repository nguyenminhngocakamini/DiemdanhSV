<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::all();

    // Lấy danh sách course theo các mã môn trong attendance
        $courseCodes = $attendances->pluck('course_code')->unique()->toArray();
        $courses = Course::whereIn('code', $courseCodes)->get()->keyBy('code');
        $attendances = Attendance::select('course_code', 'date')
        ->groupBy('course_code', 'date')
        ->get();
        return view('dashboard.attendances.index', compact('attendances', 'courses'));
    }

    public function create()
    {
        $courses = Course::all();
        $students = Student::all();  // Thêm dòng này
        return view('dashboard.attendances.create', compact('courses', 'students'));
    }

    public function store(Request $request)
    {
        $courseCode = $request->input('course_code');
        $date = $request->input('date');
        $statuses = $request->input('status'); // array: [student_id => status]

        foreach ($statuses as $studentId => $status) {
            Attendance::updateOrCreate(
                [
                    'student_id' => $studentId,
                    'course_code' => $courseCode,
                    'date' => $date
                ],
                [
                    'attendance_time' => now()->format('H:i'),
                    'status' => $status
                ]
            );
        }

        return redirect()->route('dashboard.attendances.index')->with('success', 'Điểm danh thành công!');
    }

    public function edit(Attendance $attendance)
    {
        $courseCode = $attendance->course_code;
        $date = $attendance->date;

        $course = Course::where('course_code', $courseCode)->first();

        // Lấy tất cả attendance cùng môn và ngày
        $attendances = Attendance::where('course_code', $courseCode)
            ->where('date', $date)
            ->with('student')
            ->get();

        return view('dashboard.attendances.edit', compact('course', 'date', 'attendances'));
    }


    public function update(Request $request, Attendance $attendance)
    {
        $attendance->update($request->all());
        return redirect()->route('dashboard.attendances.index');
    }
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->route('dashboard.attendances.index');
    }

    public function updateBatch(Request $request)
    {
        $data = $request->attendances;
        foreach ($data as $attendanceId => $item) {
            Attendance::where('_id', $attendanceId)->update([
                'status' => $item['status'],
            ]);
        }

        return redirect()->route('dashboard.attendances.index')->with('success', 'Cập nhật điểm danh thành công!');
    }

    public function statisticsByCourse($courseCode)
    {
        // Lấy tất cả attendance của môn này
        $attendances = Attendance::where('course_code', $courseCode)->get();

        // Lấy danh sách student_id duy nhất
        $studentIds = $attendances->pluck('student_id')->unique();

        // Tạo mảng thống kê cho từng sinh viên
        $stats = [];

        foreach ($studentIds as $studentId) {
            $studentAttendances = $attendances->where('student_id', $studentId);

            $stats[$studentId] = [
                'present' => $studentAttendances->where('status', 'Có mặt')->count(),
                'absent' => $studentAttendances->where('status', 'Vắng mặt')->count(),
                'excused' => $studentAttendances->where('status', 'Có phép')->count(),
            ];
        }

        return view('dashboard.attendances.statistics', compact('courseCode', 'stats'));
    }
public function details($courseCode)
{
    $attendances = Attendance::where('course_code', $courseCode)
                        ->with('student')
                        ->get();

    $course = Course::where('course_code', $courseCode)->first();

    // Thống kê trạng thái điểm danh của toàn bộ môn
    $presentCount = $attendances->where('status', 'Có mặt')->count();
    $absentCount = $attendances->where('status', 'Vắng mặt')->count();
    $excusedCount = $attendances->where('status', 'Có phép')->count();

    // Thống kê theo từng sinh viên
    $studentStats = [];

    // Lấy danh sách student_id duy nhất
    $studentIds = $attendances->pluck('student_id')->unique();

    foreach ($studentIds as $studentId) {
        $studentAttendances = $attendances->where('student_id', $studentId);

        $studentStats[$studentId] = [
            'present' => $studentAttendances->where('status', 'Có mặt')->count(),
            'absent' => $studentAttendances->where('status', 'Vắng mặt')->count(),
            'excused' => $studentAttendances->where('status', 'Có phép')->count(),
            'student' => $studentAttendances->first()->student, // Lấy thông tin sinh viên
        ];
    }

    return view('dashboard.attendances.details', compact(
        'attendances',
        'presentCount',
        'absentCount',
        'excusedCount',
        'courseCode',
        'course',
        'studentStats'
    ));
}






}
