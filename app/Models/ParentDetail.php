<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentDetail extends Model
{
protected $fillable = [
    'student_id',
    'father_name',
    'mother_name',
    'email',
    'phone',
    'address'
];

public function student()
{
    return $this->belongsTo(Student::class);
}
}