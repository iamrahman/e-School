<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examresult extends Model
{
    protected $fillable = [
        'course_id', 
        'exam_id',
        'student_id',
        'marks'
    ];
}
