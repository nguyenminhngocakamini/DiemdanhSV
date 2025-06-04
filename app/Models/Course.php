<?php
namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Course extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'courses';
    protected $fillable = [
        'course_code',
        'name',
        'lecturer',
        'date',
        'start_period',
        'end_period',
        'room',
        'semester'
    ];
    
}
