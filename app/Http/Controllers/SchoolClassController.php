<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $classes = SchoolClass::all();

    return view('classes.index', compact('classes'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('classes.create');
}

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|max:255'
    ]);

    SchoolClass::create([
        'name' => $request->name
    ]);

    return redirect('/classes/create')
            ->with('success', 'Class Added Successfully');
}

    /**
     * Display the specified resource.
     */
    public function show(SchoolClass $schoolClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
public function edit($id)
{
    $class = SchoolClass::findOrFail($id); //like sql query to find class with id

    return view('classes.edit', compact('class'));
}

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|max:255'
    ]);

    $class = SchoolClass::findOrFail($id);

    $class->update([
        'name' => $request->name
    ]);

    return redirect('/classes')
            ->with('success', 'Class Updated Successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $class = SchoolClass::findOrFail($id); //databse query to find class with id

    $class->delete(); //database query to delete class with id

    return redirect('/classes')
            ->with('success', 'Class Deleted Successfully');
}
}
