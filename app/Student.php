<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'email', 
        'name', 
        'phone', 
        'father_name',
        'mother_name',
        'last_login', 
        'date_of_join',
        'status',
        'dob'
    ];

    public function parent()
    {
        return $this->belongsTo('App\User')->select('id', 'email', 'name', 'father_name', 'mother_name', 'dob', 'phone', 'status', 'last_login');
    }
    public function classroom()
    {
        return $this->hasOne('App\Classroom', '');
    }
}
