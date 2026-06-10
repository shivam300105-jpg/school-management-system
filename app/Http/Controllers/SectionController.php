<?php



namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $sections = Section::with('schoolClass')->get();

    return view('sections.index', compact('sections'));
}

    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    $classes = SchoolClass::all();

    return view('sections.create', compact('classes'));
}

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $request->validate([
        'class_id' => 'required',
        'name' => 'required|max:255'
    ]);

    Section::create([
        'class_id' => $request->class_id,
        'name' => $request->name
    ]);

    return redirect('/sections/create')
        ->with('success', 'Section Added Successfully');
}

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit($id)
{
    $section = Section::findOrFail($id);

    $classes = SchoolClass::all();

    return view('sections.edit', compact('section', 'classes'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'class_id' => 'required',
        'name' => 'required|max:255'
    ]);

    $section = Section::findOrFail($id);

    $section->update([
        'class_id' => $request->class_id,
        'name' => $request->name
    ]);

    return redirect('/sections')
        ->with('success', 'Section Updated Successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $section = Section::findOrFail($id);

    $section->delete();

    return redirect('/sections')
        ->with('success', 'Section Deleted Successfully');
}
}
