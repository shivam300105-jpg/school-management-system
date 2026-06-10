@extends('layouts.admin')

@section('content')

<h2>All Sections</h2>

<a href="/sections/create">Add Section</a>
@if(session('success'))
    <p style="color:green;">
        {{ session('success') }}
    </p>
@endif

<hr>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Class</th>
        <th>Section</th>
        <th>Modification</th>
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

            <td>



    <form
        action="/sections/{{ $section->id }}"
        method="POST"
        style="display:inline;">

        @csrf
        @method('DELETE')

        <button type="submit">
            Delete
        </button>

    </form>

</td>

        </tr>

    @endforeach

</table>

@endsection