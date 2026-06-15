<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ParentDetail extends Model
{
protected $fillable = [
    'user_id',
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

public function user()
{
    return $this->belongsTo(User::class);
}

}