<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    
{
    $name = "Shivam";

    return view('students', [
        'name' => $name
    ]);
}
public function show(Request $request, $id)
{
    dd([
        'Route Parameter' => $id,
        'GET Parameter' => $request->class
    ]);
}

public function test(Request $request)
{
    return $request->name;
}

public function form()
{
    return view('student-form');
}

public function save(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email'
    ]);

    Student::create([
        'name' => $request->name,
        'email' => $request->email
    ]);

    return "Student Saved Successfully";
}

public function list()
{
    $students = Student::all();

    dd($students->toArray());
}

}
