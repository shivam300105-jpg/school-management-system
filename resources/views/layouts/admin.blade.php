<!DOCTYPE html>
<html>
<head>
    <title>School Management System</title>

    <style>

        body{
            margin:0;
            font-family:Arial,sans-serif;
        }

        .navbar{
            background:#2c3e50;
            color:white;
            padding:15px;
        }

        .container{
            display:flex;
            min-height:100vh;
        }

        .sidebar{
            width:220px;
            background:#34495e;
            padding-top:20px;
        }

        .sidebar a{
            display:block;
            color:white;
            text-decoration:none;
            padding:12px 20px;
        }

        .sidebar a:hover{
            background:#2c3e50;
        }

        .content{
            flex:1;
            padding:20px;
        }

    </style>

</head>
<body>

<div class="navbar">
    <h2>School Management System</h2>
</div>

<div class="container">

    <div class="sidebar">

        <a href="/classes">Classes</a>

        <a href="/sections">Sections</a>

        <a href="/students">Students</a>

        <a href="/staff">Staff</a>

        <a href="#">Parents</a>

    </div>

    <div class="content">

        @yield('content')

    </div>

</div>

</body>
</html>