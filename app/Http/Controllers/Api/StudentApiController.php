<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;

class StudentApiController extends Controller
{
    public function index()
    {
        return Student::all();
    }
}