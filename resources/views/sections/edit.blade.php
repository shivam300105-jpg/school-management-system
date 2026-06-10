@extends('layouts.admin')

@section('content')

<h2>Edit Section</h2>

<form action="/sections/{{ $section->id }}" method="POST">

    @csrf
    @method('PUT')

    <label>Select Class</label>
    <br><br>

    <select name="class_id">

        @foreach($classes as $class)

            <option
                value="{{ $class->id }}"
                {{ $class->id == $section->class_id ? 'selected' : '' }}>

                {{ $class->name }}

            </option>

        @endforeach

    </select>

    <br><br>

    <label>Section Name</label>

    <br><br>

    <input
        type="text"
        name="name"
        value="{{ $section->name }}">

    <br><br>

    <button type="submit">
        Update Section
    </button>

</form>

@endsection