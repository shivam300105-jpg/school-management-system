<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
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
}