<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Attendance extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'attendances';

    protected $fillable = [
        'student_id',
        'status', // "Có mặt" hoặc "Vắng"
        'date',   // Y-m-d
        'attendance_time'
    ];
}
