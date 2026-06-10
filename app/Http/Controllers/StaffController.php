<?php

namespace App\Http\Controllers;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function create()
{
    return view('staff.create');
}

public function index()
{
    $staff = \App\Models\Staff::all();

    return view('staff.index', compact('staff'));
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'designation' => 'required'
    ]);

    Staff::create([  //insert into staff table
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'designation' => $request->designation,
        'salary' => $request->salary
    ]);

    return redirect('/staff/create')
        ->with('success', 'Staff Added Successfully');
}

public function edit(Staff $staff)
{
    return view(
        'staff.edit',
        compact('staff')
    );
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'designation' => 'required'
    ]);

    $staff = Staff::findOrFail($id);

    $staff->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'designation' => $request->designation,
        'salary' => $request->salary
    ]);

    return redirect('/staff')
        ->with('success', 'Staff Updated Successfully');
}

public function destroy($id)
{
    $staff = Staff::findOrFail($id);

    $staff->delete();

    return redirect('/staff')
        ->with('success', 'Staff Deleted Successfully');
}
}
