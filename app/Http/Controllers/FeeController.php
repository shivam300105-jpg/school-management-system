<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\SchoolClass;
use App\Models\Section;


class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $fees = Fee::with('student')->latest()->get();

    return view('fees.index', compact('fees'));
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
        'fees.create',
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
        'student_id' => 'required|exists:students,id',
        'amount' => 'required|numeric',
        'status' => 'required',
        'payment_date' => 'nullable|date',
    ]);

    Fee::create($request->all());

    return redirect('/fees')
        ->with('success', 'Fee added successfully');
}

    /**
     * Display the specified resource.
     */
    public function show(Fee $fee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
public function edit($id)
{
    $fee = Fee::findOrFail($id);

    return view(
        'fees.edit',
        compact('fee')
    );
}
    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)
{
    $request->validate([
        'amount' => 'required|numeric',
        'status' => 'required',
        'payment_date' => 'nullable|date',
    ]);

    $fee = Fee::findOrFail($id);

    $fee->update([
        'amount' => $request->amount,
        'month' => $request->month,
        'status' => $request->status,
        'payment_date' => $request->payment_date,
    ]);

    return redirect('/fees')
        ->with('success', 'Fee Updated Successfully');
}

    /**
     * Remove the specified resource from storage.
     */
public function destroy($id)
{
    $fee = Fee::findOrFail($id);

    $fee->delete();

    return redirect('/fees')
        ->with('success', 'Fee Deleted Successfully');
}

public function myFees()
{
    $student = Student::where(
        'email',
        auth()->user()->email
    )->first();

    if (!$student) {
        return view('fees.my-fees', [
            'fees' => collect()
        ]);
    }

    $fees = Fee::where(
        'student_id',
        $student->id
    )->latest()->get();

    return view(
        'fees.my-fees',
        compact('fees')
    );
}
}
