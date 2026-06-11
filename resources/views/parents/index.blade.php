@extends('layouts.admin')

@section('content')

<h2>Parents List</h2>

<a href="/parents/create">
    Add Parent
</a>

<br><br>

<table border="1" cellpadding="10">

<tr>
    <th>Student</th>
    <th>Class</th>
    <th>Section</th>
    <th>Father Name</th>
    <th>Mother Name</th>
    <th>Phone</th>
    <th>Modification</th>  
    <th>Action</th>
</tr>   

    @foreach($parents as $parent)

        <tr>

<td>
    {{ $parent->student->name ?? 'N/A' }}
</td>

<td>
    {{ $parent->student->schoolClass->name ?? 'N/A' }}
</td>

<td>
    {{ $parent->student->section->name ?? 'N/A' }}
</td>

<td>
    {{ $parent->father_name }}
</td>

<td>
    {{ $parent->mother_name }}
</td>

<td>
    {{ $parent->phone }}
</td>

<td>

    <a href="/parents/{{ $parent->id }}/edit">
        Edit
    </a>
</td>

<td>
    <form action="/parents/{{ $parent->id }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete this parent?')">
            Delete
        </button>
    </form>
</td>

</tr>

    @endforeach

</table>

@endsection