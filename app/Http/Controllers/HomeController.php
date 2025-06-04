<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }


    protected $allowedGroups = ['attendances', 'courses','students']; // Ví dụ các group hợp lệ
    protected $allowedPages = ['index','create','edit']; // Ví dụ các page hợp lệ

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
        $view = "dashboard.{$group}.{$page}";

        if (view()->exists($view)) {
            return view($view);
        }

        abort(404, "Trang {$group}/{$page} không tồn tại");
    }
}
