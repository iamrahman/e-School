<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classstudent extends Model
{
    protected $fillable = [
        'classroom_id', 
        'student_id',
    ];

    public function classroom()
    {
        return $this->hasMany('App\Classroom');
    }
    public function student()
    {
        return $this->hasOne('App\Student');
    }
}
