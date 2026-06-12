<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = [
        'user_id',
        'leave_type',
        'from_date',
        'to_date',
        'reason',
        'status'
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