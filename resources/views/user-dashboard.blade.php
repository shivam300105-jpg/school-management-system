<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User Dashboard
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

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

                <a href="/my-fees"
                    class="bg-green-500 text-white p-6 rounded-lg shadow block">

                    <h3 class="text-xl font-bold">
                        My Fees
                    </h3>

                    <p class="mt-2">
                        Check fee records and payment status.
                    </p>

                </a>

                <a href="/leaves/create"
                   class="bg-purple-500 text-white p-6 rounded-lg shadow block">

                    <h3 class="text-xl font-bold">
                        Apply Leave
                    </h3>

                    <p class="mt-2">
                        Submit a leave request.
                    </p>

                </a>

                <a href="/my-leaves"
                   class="bg-orange-500 text-white p-6 rounded-lg shadow block">

                    <h3 class="text-xl font-bold">
                        Leave History
                    </h3>

                    <p class="mt-2">
                        View your previous leave requests.
                    </p>

                </a>

            </div>

        </div>
    </div>

</x-app-layout>