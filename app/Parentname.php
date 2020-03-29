<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parentname extends Model
{
    protected $table = 'parents';
    protected $fillable = [
        'name', 
        'password', 
        'phone', 
        'father_name',
        'mother_name',
        'last_login', 
        'status',
        'dob'
    ];
}
