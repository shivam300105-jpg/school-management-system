@extends('layouts.admin')

@section('content')

<h2>All Students</h2>

@if(session('success'))
    <p style="color:green;">
        {{ session('success') }}
    </p>
@endif

<a href="/students/create">
    Add Student
</a>

<hr>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Class</th>
        <th>Section</th>
        <th>Name</th>
        <th>Roll No</th>
        <th>Phone</th>
        <th>Modification</th>
        <th>Action</th>

    </tr>

    @foreach($students as $student)

    <tr>

        <td>{{ $student->id }}</td>

        <td>
            {{ $student->schoolClass->name }}
        </td>

        <td>
            {{ $student->section->name }}
        </td>

        <td>
            {{ $student->name }}
        </td>

        <td>
            {{ $student->roll_no }}
        </td>

        <td>
            {{ $student->phone }}
        </td>
        <td>

    <a href="{{ route('students.edit', $student->id) }}">
        Edit
    </a>
</td>
<td>
    <form
        action="/students/{{ $student->id }}"
        method="POST"
        style="display:inline;"
    >

        @csrf
        @method('DELETE')

        <button
    type="submit"
    onclick="return confirm('Are you sure?')"
>
    Delete
</button>

    </form>

</td>
    </tr>

    @endforeach

</table>

@endsection