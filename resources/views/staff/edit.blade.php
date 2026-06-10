@extends('layouts.admin')

@section('content')

<h2>Edit Staff</h2>

@if($errors->any())
    <ul style="color:red;">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="/staff/{{ $staff->id }}" method="POST">

    @csrf
    @method('PUT')

    <label>Name</label>
    <br><br>
    <input
        type="text"
        name="name"
        value="{{ $staff->name }}"
    >

    <br><br>

    <label>Email</label>
    <br><br>
    <input
        type="email"
        name="email"
        value="{{ $staff->email }}"
    >

    <br><br>

    <label>Phone</label>
    <br><br>
    <input
        type="text"
        name="phone"
        value="{{ $staff->phone }}"
    >

    <br><br>

    <label>Designation</label>
    <br><br>
    <input
        type="text"
        name="designation"
        value="{{ $staff->designation }}"
    >

    <br><br>

    <label>Salary</label>
    <br><br>
    <input
        type="text"
        name="salary"
        value="{{ $staff->salary }}"
    >

    <br><br>

    <button type="submit">
        Update Staff
    </button>

</form>

@endsection