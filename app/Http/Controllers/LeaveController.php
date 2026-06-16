<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::latest()->get();

        return view(
            'leaves.index',
            compact('leaves')
        );
    }

    public function create()
    {
        return view('leaves.create');
    }

    public function store(Request $request)
    {
        $pendingLeave = Leave::where(
    'user_id',
    auth()->id()
)->where(
    'status',
    'Pending'
)->exists();

if ($pendingLeave) {

return redirect()
    ->back()
    ->with(
        'error',
        'You already have a pending leave request. New leave can be applied only after admin approval or rejection.'
    );
}

        $request->validate([
            'leave_type' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'reason' => 'required'
        ]);

        Leave::create([
            'user_id' => auth()->id(),
            'leave_type' => $request->leave_type,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'reason' => $request->reason,
            'status' => 'Pending'
        ]);

        return redirect('/leaves/create')
            ->with('success', 'Leave Applied Successfully');
    }

    public function myLeaves()
{
    $leaves = Leave::where(
        'user_id',
        auth()->id()
    )->latest()->get();

    return view(
        'leaves.my-leaves',
        compact('leaves')
    );
}
public function approve($id)
{
    $leave = Leave::findOrFail($id);

    $leave->update([
        'status' => 'Approved'
    ]);

    return back()
        ->with('success',
            'Leave Approved');
}

public function reject($id)
{
    $leave = Leave::findOrFail($id);

    $leave->update([
        'status' => 'Rejected'
    ]);

    return back()
        ->with('success',
            'Leave Rejected');
}
    public function show(Leave $leave)
    {
        //
    }

    public function edit(Leave $leave)
    {
        //
    }

    public function update(Request $request, Leave $leave)
    {
        //
    }

    public function destroy(Leave $leave)
    {
        //
    }
}