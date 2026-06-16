<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Staff extends Model
{
    protected $fillable = [
    'user_id',
    'name',
    'email',
    'phone',
    'designation',
    'salary'
];

public function user()
{
    return $this->belongsTo(User::class);
}
}
