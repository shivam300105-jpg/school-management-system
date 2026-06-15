<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Fee;
use App\Models\Leave;

class ReportController extends Controller
{
    public function students()
    {
        $students = Student::latest()->get();

        return view(
            'reports.students',
            compact('students')
        );
    }

    public function fees()
    {
        $fees = Fee::with('student')
            ->latest()
            ->get();

        return view(
            'reports.fees',
            compact('fees')
        );
    }

    public function leaves()
    {
        $leaves = Leave::with('user')
            ->latest()
            ->get();

        return view(
            'reports.leaves',
            compact('leaves')
        );
    }
}