@extends('layouts.admin')

@section('content')

<h2>All Students</h2>

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

    </tr>

    @endforeach

</table>

@endsection