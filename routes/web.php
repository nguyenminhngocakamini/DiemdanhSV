<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index']);
Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::resource('students', StudentController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('attendances', AttendanceController::class);
    Route::post('attendances/update-batch', [AttendanceController::class, 'updateBatch'])
        ->name('attendances.updateBatch');
});
Route::get('/attendances/{courseCode}/details', [AttendanceController::class, 'details'])->name('attendances.details');

Route::get('/{group}/{page}', [HomeController::class, 'pages'])
    ->where(['group' => '[a-zA-Z0-9_-]+', 'page' => '[a-zA-Z0-9_-]+'])
    ->name('dashboard.pages');