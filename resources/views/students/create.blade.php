@extends('layouts.admin')

@section('content')

<h2>Add Student</h2>

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

<form action="/students" method="POST">

    @csrf

    <label>Select Class</label>
    <br><br>

<select name="class_id" id="class_id">

    <option value="">Select Class</option>

    @foreach($classes as $class)

        <option value="{{ $class->id }}">
            {{ $class->name }}
        </option>

    @endforeach

</select>

    <br><br>

    <label>Select Section</label>
    <br><br>

<select name="section_id" id="section_id">

    <option value="">
        First Select Class
    </option>

</select>

    <br><br>

    <label>Student Name</label>
    <br><br>

    <input type="text" name="name">

    <br><br>

    <label>Roll Number</label>
    <br><br>

    <input type="text" name="roll_no">

    <br><br>

    <label>Phone</label>
    <br><br>

    <input type="text" name="phone">

    <br><br>

    <label>Email</label>
    <br><br>

    <input type="email" name="email">

    <br><br>

    <label>Address</label>
    <br><br>

    <textarea name="address"></textarea>

    <br><br>

    <button type="submit">
        Save Student
    </button>

</form>

<script>

const sections = @json(\App\Models\Section::all());

document.getElementById('class_id')
.addEventListener('change', function () {

    let classId = this.value;

    let sectionDropdown =
        document.getElementById('section_id');

    sectionDropdown.innerHTML =
        '<option value="">Select Section</option>';

    sections.forEach(function(section) {

        if (section.class_id == classId) {

            sectionDropdown.innerHTML +=
            `<option value="${section.id}">
                ${section.name}
            </option>`;
        }

    });

});

</script>

@endsection