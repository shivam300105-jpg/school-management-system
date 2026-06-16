<?php

namespace App\Http\Controllers;
use App\Models\Staff;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Leave;

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
        'designation' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6'
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'staff'
    ]);

    Staff::create([
        'user_id' => $user->id,
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

public function dashboard()
{
    $staff = Staff::where(
        'user_id',
        auth()->id()
    )->first();

    $totalLeaves = Leave::where(
        'user_id',
        auth()->id()
    )->count();

    $approvedLeaves = Leave::where(
        'user_id',
        auth()->id()
    )->where('status', 'approved')
     ->count();

    $pendingLeaves = Leave::where(
        'user_id',
        auth()->id()
    )->where('status', 'pending')
     ->count();

    $rejectedLeaves = Leave::where(
        'user_id',
        auth()->id()
    )->where('status', 'rejected')
     ->count();

    $recentLeaves = Leave::where(
        'user_id',
        auth()->id()
    )
    ->latest()
    ->take(5)
    ->get();

    return view(
        'staff.dashboard',
        compact(
            'staff',
            'totalLeaves',
            'approvedLeaves',
            'pendingLeaves',
            'rejectedLeaves',
            'recentLeaves'
        )
    );
}

public function profile()
{
    $staff = Staff::where(
        'user_id',
        auth()->id()
    )->first();

    return view(
        'staff.profile',
        compact('staff')
    );
}

}
