<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Attendance extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'attendances';
    protected $fillable = [
        'student_id',
        'course_code',
        'date',
        'attendance_time',
        'status'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_code');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_code', 'course_code');
    }
}
