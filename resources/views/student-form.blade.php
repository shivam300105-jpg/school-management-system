<h1>Student Registration Form</h1>

<form method="POST" action="/student-save">

    @csrf

    <label>Student Name</label>
    <br>
    <input type="text" name="name">

    <br><br>

    <label>Email</label>
    <br>
    <input type="email" name="email">

    <br><br>

    <button type="submit">
        Submit
    </button>

</form>