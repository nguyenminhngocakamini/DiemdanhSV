<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\Attendance;
class AdminController extends Controller
{
    public function index()
    {
         $students = Student::all();
         $courses = Course::all();
         $attendances = Attendance::all();
        return view('admin.home',compact('students', 'courses', 'attendances'));
    }


    protected $allowedGroups = ['thoikhoabieu', 'diemdanh']; // Ví dụ các group hợp lệ
    protected $allowedPages = ['index']; // Ví dụ các page hợp lệ

    public function pages($group, $page)
    {
        // Kiểm tra group có hợp lệ không
        if (!in_array($group, $this->allowedGroups)) {
            abort(404, "Group '{$group}' không tồn tại");
        }

        // Kiểm tra page có hợp lệ không
        if (!in_array($page, $this->allowedPages)) {
            abort(404, "Page '{$page}' không tồn tại");
        }

        // Đường dẫn view
        $view = "trangchu.{$group}.{$page}";

        if (view()->exists($view)) {
            return view($view);
        }

        abort(404, "Trang {$group}/{$page} không tồn tại");
    }
}
