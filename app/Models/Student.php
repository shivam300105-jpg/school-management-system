<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id',
        'class_id',
        'section_id',
        'name',
        'email',
        'phone',
        'roll_no',
        'address'
    ];
    public function schoolClass()
{
    return $this->belongsTo(SchoolClass::class, 'class_id');
}

public function section()
{
    return $this->belongsTo(Section::class, 'section_id');
}

public function parentDetail()
{
    return $this->hasOne(ParentDetail::class);
}

public function fees()
{
    return $this->hasMany(Fee::class);
}

public function leaves()
{
    return $this->hasMany(Leave::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}
}