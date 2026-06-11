<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>

    <style>

        body{
            font-family:Arial,sans-serif;
            margin:40px;
        }

        .box{
            max-width:600px;
            margin:auto;
            text-align:center;
        }

        button{
            padding:10px 20px;
            cursor:pointer;
        }

    </style>

</head>
<body>

<div class="box">

    <h1>User Dashboard</h1>

    <h3>Welcome, {{ Auth::user()->name }}</h3>

    <p>You are logged in as a User.</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit">
            Logout
        </button>
    </form>

</div>

</body>
</html>