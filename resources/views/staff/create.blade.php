@extends('layouts.admin')

@section('content')

<h2>Add Staff</h2>

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

<form action="/staff" method="POST">

    @csrf

    <label>Name</label>
    <br><br>
    <input type="text" name="name">
    <br><br>

    <label>Email</label>
    <br><br>
    <input type="email" name="email">
    <br><br>

    <label>Phone</label>
    <br><br>
    <input type="text" name="phone">
    <br><br>

    <label>Designation</label>
    <br><br>
    <input type="text" name="designation">
    <br><br>

    <label>Salary</label>
    <br><br>
    <input type="text" name="salary">
    <br><br>

    <button type="submit">
        Save Staff
    </button>

</form>

@endsection