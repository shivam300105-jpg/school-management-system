@extends('layouts.admin')

@section('content')

<h2>All Staff</h2>

@if(session('success'))
    <p style="color:green;">
        {{ session('success') }}
    </p>
@endif

<a href="/staff/create">
    Add Staff
</a>

<hr>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Designation</th>
        <th>Salary</th>
        <th>Modification</th>
        <th>Action</th>
    </tr>

    @foreach($staff as $member)

    <tr>

        <td>{{ $member->id }}</td>

        <td>{{ $member->name }}</td>

        <td>{{ $member->email }}</td>

        <td>{{ $member->phone }}</td>

        <td>{{ $member->designation }}</td>

        <td>{{ $member->salary }}</td>
        <td>
            <a href="/staff/{{ $member->id }}/edit">
                Edit
            </a>
        </td>
        <td>
            <form action="/staff/{{ $member->id }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')">
                    Delete
                </button>
            </form>
        </td>
    </tr>

    @endforeach

</table>

@endsection