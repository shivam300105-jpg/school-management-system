<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-7xl mx-auto p-6">

    <div class="bg-white shadow rounded-lg p-6 mb-6">

        <h1 class="text-3xl font-bold text-gray-800">
            User Dashboard
        </h1>

        <p class="mt-2 text-gray-600">
            Welcome,
            <strong>{{ Auth::user()->name }}</strong>
        </p>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

<a href="/user/profile"
   class="bg-blue-500 text-white p-6 rounded-lg shadow block">

    <h3 class="text-xl font-bold">
        My Profile
    </h3>

    <p class="mt-2">
        View your profile details.
    </p>

</a>

        <div class="bg-green-500 text-white p-6 rounded-lg shadow">
            <h3 class="text-xl font-bold">
                My Fees
            </h3>

            <p class="mt-2">
                Check fee records and payment status.
            </p>
        </div>

        <a href="/leave/create"
           class="bg-purple-500 text-white p-6 rounded-lg shadow block">

            <h3 class="text-xl font-bold">
                Apply Leave
            </h3>

            <p class="mt-2">
                Submit a leave request.
            </p>

        </a>

        <a href="/leave"
           class="bg-orange-500 text-white p-6 rounded-lg shadow block">

            <h3 class="text-xl font-bold">
                Leave History
            </h3>

            <p class="mt-2">
                View your previous leave requests.
            </p>

        </a>

    </div>

    <div class="mt-8">

        <form method="POST"
              action="{{ route('logout') }}">

            @csrf

            <button
                type="submit"
                class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg">

                Logout

            </button>

        </form>

    </div>

</div>

</body>
</html>