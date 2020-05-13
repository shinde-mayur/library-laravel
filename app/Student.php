<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $fillable = [
        'stud_name',
        'stud_gender',
        'stud_class',
        'stud_contact',
        'stud_email',
        'stud_addr',
        'stud_city',
        'stud_pin',
    ];
}
