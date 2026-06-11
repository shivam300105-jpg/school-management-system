@extends('layouts.admin')

@section('content')

<h2>Add Parent</h2>

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

<form action="/parents" method="POST">
    @csrf

    <p>Select Class</p>

    <select name="class_id" id="class_id">
        <option value="">
            Select Class
        </option>

        @foreach($classes as $class)
            <option value="{{ $class->id }}">
                {{ $class->name }}
            </option>
        @endforeach
    </select>

    <br><br>

    <p>Select Section</p>

    <select name="section_id" id="section_id">

        <option value="">
            First Select Class
        </option>

    </select>

    <br><br>

    <p>Select Student</p>

<select name="student_id" id="student_id">

    <option value="">
        First Select Section
    </option>

</select>

<br><br>

    <p>Father Name</p>
    <input type="text" name="father_name">

    <br><br>

    <p>Mother Name</p>
    <input type="text" name="mother_name">

    <br><br>

    <p>Email</p>
    <input type="email" name="email">

    <br><br>

    <p>Phone</p>
    <input type="text" name="phone">

    <br><br>

    <p>Address</p>
    <textarea name="address"></textarea>

    <br><br>

    <button type="submit">
        Save Parent
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

document.getElementById('section_id')
.addEventListener('change', function () {

    let sectionId = this.value;

    let studentDropdown =
        document.getElementById('student_id');

    studentDropdown.innerHTML =
        '<option value="">Select Student</option>';

    const students = @json($students);

    students.forEach(function(student) {

        if (student.section_id == sectionId) {

            studentDropdown.innerHTML +=
            `<option value="${student.id}">
                ${student.name}
            </option>`;
        }

    });

});

</script>

@endsection