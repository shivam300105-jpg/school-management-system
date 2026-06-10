<!DOCTYPE html>
<html>
<head>
    <title>Add Class</title>
</head>
<body>

<h2>Add New Class</h2>

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

<form action="/classes" method="POST">
    @csrf

    <label>Class Name:</label>

    <input
        type="text"
        name="name"
        placeholder="Enter Class Name"
    >

    <button type="submit">
        Save Class
    </button>
</form>

</body>
</html>