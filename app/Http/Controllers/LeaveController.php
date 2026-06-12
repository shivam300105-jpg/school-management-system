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