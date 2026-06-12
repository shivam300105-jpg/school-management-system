<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Staff;
use App\Models\Section;
use App\Models\SchoolClass;
use App\Models\ParentDetail;

class DashboardController extends Controller
{
public function index()
{
    $totalClasses = SchoolClass::count();
    $totalSections = Section::count();
    $totalStudents = Student::count();
    $totalStaff = Staff::count();
    $totalParents = ParentDetail::count();

    return view('admin.dashboard', compact(
        'totalClasses',
        'totalSections',
        'totalStudents',
        'totalStaff',
        'totalParents'
    ));
}
}