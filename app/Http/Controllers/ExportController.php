<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AttendanceExport;
class ExportController extends Controller
{


  
public function exportExcel(Request $request)
{
    return Excel::download(new AttendanceExport($request->date), 'attendance.xlsx');
}

}
