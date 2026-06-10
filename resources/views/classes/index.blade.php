@extends('layouts.admin')

@section('content')

<h2>All Classes</h2>

@if(session('success'))
    <p style="color:green;">
        {{ session('success') }}
    </p>
@endif

<a href="/classes/create">Add New Class</a>

<hr>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Class Name</th>
        <th>Modification</th>
        <th>Action</th>
    </tr>

    @foreach($classes as $class)
        <tr>
            <td>{{ $class->id }}</td>
            <td>{{ $class->name }}</td>

            <td>
                <a href="/classes/{{ $class->id }}/edit">
                    Edit
                </a>
            </td>

            <td>
                <form action="/classes/{{ $class->id }}" method="POST" style="display:inline;">
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