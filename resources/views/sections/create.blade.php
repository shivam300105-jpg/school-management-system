@extends('layouts.admin')

@section('content')

<h2>Add Section</h2>

@if(session('success'))
    <p style="color:green;">
        {{ session('success') }}
    </p>
@endif

@if($errors->any())
    <ul style="color:red;">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="/sections" method="POST">

    @csrf

    <label>Select Class</label>
    <br><br>

    <select name="class_id">

        <option value="">Select Class</option>

        @foreach($classes as $class)
            <option value="{{ $class->id }}">
                {{ $class->name }}
            </option>
        @endforeach

    </select>

    <br><br>

    <label>Section Name</label>
    <br><br>

    <input type="text" name="name">

    <br><br>

    <button type="submit">
        Save Section
    </button>

</form>

@endsection