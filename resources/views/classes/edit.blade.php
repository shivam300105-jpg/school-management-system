<!DOCTYPE html>
<html>
<head>
    <title>Edit Class</title>
</head>
<body>

<h2>Edit Class</h2>

<form action="/classes/{{ $class->id }}" method="POST">

    @csrf
    @method('PUT')

    <label>Class Name:</label>

    <input
        type="text"
        name="name"
        value="{{ $class->name }}"
    >

    <button type="submit">
        Update Class
    </button>

</form>

</body>
</html>