<!DOCTYPE html>
<html>
<head>

    <title>My Profile</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-100">

<div class="max-w-4xl mx-auto mt-10">

    <div class="bg-white p-8 rounded-xl shadow">

        <h1 class="text-3xl font-bold mb-6">
            My Profile
        </h1>

        <div class="space-y-4">

            <div>
                <strong>Name:</strong>
                {{ Auth::user()->name }}
            </div>

            <div>
                <strong>Email:</strong>
                {{ Auth::user()->email }}
            </div>

            <div>
                <strong>Role:</strong>
                {{ Auth::user()->role }}
            </div>

        </div>

        <a
            href="/user-dashboard"
            class="inline-block mt-6 bg-blue-600 text-white px-4 py-2 rounded"
        >
            Back
        </a>

    </div>

</div>

</body>
</html>