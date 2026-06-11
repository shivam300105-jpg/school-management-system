@extends('layouts.admin')

@section('content')

<h2>Edit Parent</h2>

@if($errors->any())
    <ul style="color:red;">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="/parents/{{ $parent->id }}" method="POST">

    @csrf
    @method('PUT')

    <p>Father Name</p>
    <input
        type="text"
        name="father_name"
        value="{{ $parent->father_name }}"
    >

    <br><br>

    <p>Mother Name</p>
    <input
        type="text"
        name="mother_name"
        value="{{ $parent->mother_name }}"
    >

    <br><br>

    <p>Email</p>
    <input
        type="email"
        name="email"
        value="{{ $parent->email }}"
    >

    <br><br>

    <p>Phone</p>
    <input
        type="text"
        name="phone"
        value="{{ $parent->phone }}"
    >

    <br><br>

    <p>Address</p>

    <textarea name="address">{{ $parent->address }}</textarea>

    <br><br>

    <button type="submit">
        Update Parent
    </button>

</form>

@endsection