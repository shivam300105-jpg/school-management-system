<?php

namespace App\Http\Controllers;

use App\Models\ParentDetail;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\SchoolClass;
use App\Models\Section;

class ParentDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $parents = ParentDetail::with('student')->get();

    return view(
        'parents.index',
        compact('parents')
    );
}
    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    $classes = SchoolClass::all();
    $sections = Section::all();
    $students = Student::all();

    return view(
        'parents.create',
        compact(
            'classes',
            'sections',
            'students'
        )
    );
}

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $request->validate([
        'student_id' => 'required',
        'father_name' => 'required',
        'phone' => 'required'
    ]);

    ParentDetail::create([
        'student_id' => $request->student_id,
        'father_name' => $request->father_name,
        'mother_name' => $request->mother_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address
    ]);

    return redirect('/parents/create')
        ->with('success', 'Parent Added Successfully');
}

    /**
     * Display the specified resource.
     */
    public function show(ParentDetail $parentDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
public function edit($id)
{
    $parent = ParentDetail::findOrFail($id);

    return view(
        'parents.edit',
        compact('parent')
    );
}

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)
{
    $request->validate([
        'father_name' => 'required',
        'phone' => 'required'
    ]);

    $parent = ParentDetail::findOrFail($id);

    $parent->update([
        'father_name' => $request->father_name,
        'mother_name' => $request->mother_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address
    ]);

    return redirect('/parents')
        ->with('success', 'Parent Updated Successfully');
}

    /**
     * Remove the specified resource from storage.
     */
public function destroy($id)
{
    $parent = ParentDetail::findOrFail($id);

    $parent->delete();

    return redirect('/parents')
        ->with('success', 'Parent Deleted Successfully');
}
}
