<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name', 
        'status',
        'classroom_id',
        'teacher_id'
    ];

    public function classroom()
    {
        return $this->belongsTo('App\Classroom')->select('id', 'name', 'section');
    }

    public function teacher()
    {
        return $this->belongsTo('App\User');
    }
}
