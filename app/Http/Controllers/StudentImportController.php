<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport; // Sửa namespace
use App\Models\Student;

class StudentImportController extends Controller
{
    public function showForm()
    {
        return view('students.import');
    }

    public function import(Request $request)
    {
        // Validate file Excel
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls'
        ]);

        try {
            // Import dữ liệu từ file Excel vào MongoDB
            Excel::import(new StudentsImport, $request->file('file'));

            return redirect()->route('students.import.form')
                ->with('success', '📥 Nhập sinh viên thành công!');
        } catch (\Exception $e) {
            return redirect()->route('students.import.form')
                ->with('error', '❌ Có lỗi xảy ra khi nhập file: ' . $e->getMessage());
        }
    }
}