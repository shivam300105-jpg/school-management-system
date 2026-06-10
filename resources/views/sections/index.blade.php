@extends('layouts.admin')

@section('content')

<h2>All Sections</h2>

<a href="/sections/create">Add Section</a>

<hr>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Class</th>
        <th>Section</th>
        <th>Action</th>
    </tr>

    @foreach($sections as $section)

        <tr>

            <td>{{ $section->id }}</td>

            <td>
                {{ $section->schoolClass->name }}
            </td>

            <td>
                {{ $section->name }}
            </td>

            <td>
                <a href="/sections/{{ $section->id }}/edit">
            Edit
                </a>
            </td>
        </tr>

    @endforeach

</table>

@endsection