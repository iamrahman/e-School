<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = [
        'name',
        'section',
        'room_no',
        'status',
    ];

    public function course()
    {
        return $this->hasMany('App\Course');
    }
}
