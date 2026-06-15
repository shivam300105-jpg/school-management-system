<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolClass;
use App\Models\Section;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;

class StudentController extends Controller
{
public function index()
{
    $students = Student::with([
        'schoolClass',
        'section'
    ])->get();

    return view(
        'students.index',
        compact('students')
    );
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

public function create()
{
    $classes = SchoolClass::all();

    $sections = Section::all();

return view('students.create', compact('classes'));}

public function store(Request $request)
{
$request->validate([
    'class_id' => 'required',
    'section_id' => 'required',
    'name' => 'required',
    'roll_no' => 'required',
    'email' => 'required|email|unique:users,email',
    'password' => 'required|min:6'
]);

$user = User::create([
    'name' => $request->name,
    'email' => $request->email,
    'password' => Hash::make($request->password),
    'role' => 'student'
]);

Student::create([
    'user_id' => $user->id,
    'class_id' => $request->class_id,
    'section_id' => $request->section_id,
    'name' => $request->name,
    'email' => $request->email,
    'phone' => $request->phone,
    'roll_no' => $request->roll_no,
    'address' => $request->address
]);

    return redirect('/students/create')
        ->with('success', 'Student Added Successfully');
}

public function edit(Student $student)
{
    $classes = SchoolClass::all();

    $sections = Section::where(
        'class_id',
        $student->class_id
    )->get();

    return view(
        'students.edit',
        compact(
            'student',
            'classes',
            'sections'
        )
    );
}

public function update(Request $request, $id)
{
    $request->validate([
        'class_id' => 'required',
        'section_id' => 'required',
        'name' => 'required',
        'roll_no' => 'required'
    ]);

    $student = Student::findOrFail($id);

    $student->update([
        'class_id' => $request->class_id,
        'section_id' => $request->section_id,
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'roll_no' => $request->roll_no,
        'address' => $request->address
    ]);

    return redirect('/students')
        ->with('success', 'Student Updated Successfully');
}

public function destroy($id)
{
    $student = Student::findOrFail($id);

    $student->delete();

    return redirect('/students')
        ->with('success', 'Student Deleted Successfully');
}

}
